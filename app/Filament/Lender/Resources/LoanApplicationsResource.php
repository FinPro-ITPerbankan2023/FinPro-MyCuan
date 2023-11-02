<?php

namespace App\Filament\Lender\Resources;

use App\Filament\Lender\Resources\LoanApplicationsResource\Pages;
use App\Filament\Lender\Resources\LoanApplicationsResource\RelationManagers;
use App\Models\HistoryTransaction;
use App\Models\Loans;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class LoanApplicationsResource extends Resource
{
    protected static ?string $model = Loans::class;

    protected static ?string $modelLabel = 'Daftar Ajuan Pinjaman';

    protected static ?string $pluralLabel = 'Daftar Ajuan Pinjaman';

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';

    protected static ?string $navigationGroup = 'Marketplace';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([//
            ]
                );
    }

    public static function table(Table $table): Table
    {

        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->where('is_verified', 1)
                    ->where('loan_status', 0);
            })

            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable()
                    ->searchable(),

                TextColumn::make('loan_status')
                    ->badge()
                    ->color(fn (bool $state): string => match ($state) {
                        false => 'danger',
                        true => 'success',
                    })
                    ->formatStateUsing(fn (bool $state): string => $state ? __("SUDAH DIDANAI") : __("BELUM DIDANAI"))
                    ->label('Status Pinjaman'),

                Tables\Columns\TextColumn::make('loan_duration')
                    ->label('Lama Pinjaman (bulan)')
                    ->searchable()
                    ->sortable()
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('application_date')
                    ->label('Tanggal Pengajuan')
                    ->date()
                    ->searchable()
                    ->sortable()
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Jumlah Pinjaman')
                    ->money('idr')
                    ->alignCenter(),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
//                Tables\Actions\EditAction::make(),
                Action::make('loan_status')
                    ->action(fn (Loans $record) => $record->verifyLoan())
                    ->requiresConfirmation()
                    ->button()
                    ->label('DANAI')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),

                ]),
                Tables\Actions\BulkAction::make('Checkout')
                    ->action(function (Collection $records) {
                        $authenticatedUser = Auth::user();

                        $records->each(function ($record) use ($authenticatedUser) {
                            $dataToInsert = $record->toArray();

                            $dataToInsert['user_id'] = $authenticatedUser->id;

                            HistoryTransaction::create($dataToInsert);

                            $record->delete();

                        });
                    })
            ])
            ->striped()
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Identitas Peminjam')
                    ->icon('heroicon-o-face-smile')
                    ->schema([
                       TextEntry::make('user.name') ->label('Nama'),
                        TextEntry::make('identity.identity_number') ->label('Nomor Identitas'),
                        TextEntry::make('detail.phone_number') ->label('Nomor Telepon')->copyable(true),
                        TextEntry::make('detail.birth_place') ->label('Tempat Lahir'),
                        TextEntry::make('detail.date_birth') ->label('Tanggal Lahir'),
                    ]) ->columns(3),

                Section::make('Alamat Peminjam')
                    ->icon('heroicon-o-map')
                    ->schema([
                        TextEntry::make('detail.street') ->label('Jalan'),
                        TextEntry::make('detail.district') ->label('Kecamatan'),
                        TextEntry::make('detail.city') ->label('Kota'),
                        TextEntry::make('detail.province') ->label('Provinsi'),
                        TextEntry::make('detail.post_code') ->label('Kode Pos'),
                    ]) ->columns(3),

                Section::make('Usaha Peminjam')
                    ->icon('heroicon-o-building-storefront')
                    ->schema([
                        TextEntry::make('business.business_name') ->label('Nama Usaha'),
                        TextEntry::make('business.field_of_business') ->label('Bidang Usaha'),
                        TextEntry::make('business.business_ownership') ->label('Kepemilikan Usaha'),
                        TextEntry::make('business.business_duration') ->label('Lama Usaha Berdiri'),
                        TextEntry::make('business.income_avg') ->money('idr') ->label('Pendapat Usaha /Bulan'),
                    ]) ->columns(3),


//                Section::make('Riwayat Pinjaman')
//                    ->icon('heroicon-o-arrow-path')
//                    // TODO Add logic to retrieve history of borrower, try with RepeatableEntry
//
//                    ->columns(2),

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
            'index' => Pages\ListLoanApplications::route('/'),
//            'create' => Pages\CreateLoanApplications::route('/create'),
//            'view' => Pages\ViewLoanApplications::route('/{record}'),
//            'edit' => Pages\EditLoanApplications::route('/{record}/edit'),
        ];
    }
}
