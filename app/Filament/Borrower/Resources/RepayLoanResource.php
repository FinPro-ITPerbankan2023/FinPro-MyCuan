<?php

namespace App\Filament\Borrower\Resources;

use App\Filament\Borrower\Resources\RepayLoanResource\Pages;
use App\Filament\Borrower\Resources\RepayLoanResource\RelationManagers;
use App\Models\BankDetail;
use App\Models\Business;
use App\Models\Loans;
use App\Models\RepayLoan;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserIdentity;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\IconPosition;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class RepayLoanResource extends Resource
{
    protected static ?string $model = Loans::class;
    protected static ?string $pluralLabel = 'Pembayaran Pinjaman';

    protected static ?string $navigationIcon = 'heroicon-o-bolt';
    protected static ?string $navigationGroup = 'Peminjaman';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
            ]);

    }

    public static function table(Table $table): Table
    {
        $user = Auth::user();
        $userId = $user->id;
        $record = Loans::where('user_id', $userId)->get();
        return $table
            ->modifyQueryUsing(function (Builder $query) use ($userId) {
                $query->where('user_id', $userId);
            })

            ->columns([
                TextColumn::make('loan_status')
                    ->badge()
                    ->color(fn ($record): string => match (true) {
                        $record->repaid_amount === 0 => 'danger',
                        $record->repaid_amount < $record->amount => 'warning',
                        $record->repaid_amount >= $record->amount => 'success',
                    })
                    ->formatStateUsing(fn ($record): string => match (true) {
                        $record->repaid_amount === 0 => __("BELUM DIBAYAR"),
                        $record->repaid_amount < $record->amount => __("DIBAYAR SEBAGIAN"),
                        $record->repaid_amount >= $record->amount => __("SUDAH LUNAS"),
                    })
                    ->label('Status Pembayaran'),


                Tables\Columns\TextColumn::make('loan_duration')
                    ->label('Lama Pinjaman')
                    ->sortable(),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Jumlah Pinjaman')
                    ->money('idr')
                    ->sortable(),

                Tables\Columns\TextColumn::make('repaid_amount')
                    ->label('Cicilan Dibayar')
                    ->money('IDR'),

                Tables\Columns\TextColumn::make('unpaid_amount_loan')
                    ->label('Sisa Tagihan')
                    ->default(function (Loans $record) {
                        $repaid_amount = $record->repaid_amount;
                        $originalAmount = $record->amount;

                        $amount = ($originalAmount * 1.05) - $repaid_amount;

                        $amount = intval($amount);

                        return ($amount);
                    })
                    ->money('IDR'),

                Tables\Columns\TextColumn::make('paid_this_month')
                    ->label('Pembayaran Bulan Ini')
                    ->description('Termasuk Bunga 5%')
                    ->default(function (Loans $record) {
                        $originalAmount = $record->amount;
                        $repaidAmount = $record->repaid_amount;
                        $loanDuration = $record->loan_duration;

                        $amountWithInterest = ($originalAmount / $loanDuration) * 1.05;

                        if ($repaidAmount >= $originalAmount) {
                            return "0";
                        }

                        return intval($amountWithInterest);
                    })
                    ->money('IDR'),
            ])

            ->striped()
            ->actions([
                \Filament\Tables\Actions\Action::make('loan_status')
                    ->action(function (Loans $record) {
                        $originalAmount = $record->amount;
                        $loanDuration = $record->loan_duration;


                        $amount = $originalAmount * 1.05 / $loanDuration; // Add 5%

                        $amount = intval($amount);
                        $userId = auth()->id();
                        $loanId = $record->id;

                        return redirect()->route('repayment', ['amount' => $amount, 'userId' => $userId, 'loanId' => $loanId]);
                    })
                    ->requiresConfirmation()
                    ->button()
                    ->modalIcon('heroicon-s-hand-thumb-up')
                    ->modalDescription('Anda akan diarahkan pada halaman pembayaran')
                    ->modalCancelActionLabel('Batal')
                    ->modalSubmitActionLabel('Lanjut')
                    ->hidden(fn (Loans $record) =>
                        $record->repaid_amount  >= $record->amount)
                    ->label('BAYAR PINJAMAN'),

                ActionGroup::make([
                    ViewAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make('Informasi Pinjaman')
                    ->icon('heroicon-o-face-smile')
                    ->schema([
                        TextEntry::make('loan_purpose') ->label('Tujuan Pinjaman'),

                        TextEntry::make('loan_duration') ->label('Lama Pinjaman'),

                        TextEntry::make('loan_status') ->label('Status Pinjaman')->copyable(true)
                            ->badge()
                            ->color(fn ($record): string => match (true) {
                                $record->repaid_amount === 0 => 'danger',
                                $record->repaid_amount < $record->amount => 'warning',
                                $record->repaid_amount >= $record->amount => 'success',
                            })
                            ->formatStateUsing(fn ($record): string => match (true) {
                                $record->repaid_amount === 0 => __("BELUM DIBAYAR"),
                                $record->repaid_amount < $record->amount => __("DIBAYAR SEBAGIAN"),
                                $record->repaid_amount >= $record->amount => __("SUDAH LUNAS"),
                            })
                            ->label('Status Pembayaran'),

                        TextEntry::make('application_date') ->label('Tanggal Pengajuan'),
                    ]) ->columns(3),

                \Filament\Infolists\Components\Section::make('Pembayaran Pinjaman')
                    ->schema([
                        TextEntry::make('unpaid_amount') ->label('Sisa Tagihan')
                            ->money('IDR')
                            ->default(function (Loans $record) {
                                $repaid_amount = $record->repaid_amount;
                                $originalAmount = $record->amount;

                                $amount = ($originalAmount * 1.05) - $repaid_amount;

                                $amount = intval($amount);

                                return ($amount);
                            }),
                        TextEntry::make('repaid_amount') ->label('Cicilan Dibayarkan')
                            ->money('IDR'),

                        TextEntry::make('intereset') ->label('Bunga Pinjaman')
                            ->money('IDR')
                            ->default(function (Loans $record) {
                                $interestPercentage = 5;
                                $interest = ($record->amount * $interestPercentage) / 100;

                                return number_format($interest, 2, '.', '');
                            }),

                    ]) ->columns(3),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRepayLoans::route('/'),
//            'create' => Pages\CreateRepayLoan::route('/create'),
//            'view' => Pages\ViewRepayLoan::route('/{record}'),
//            'edit' => Pages\EditRepayLoan::route('/{record}/edit'),
        ];
    }
}
