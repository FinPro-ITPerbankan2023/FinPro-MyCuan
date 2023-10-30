<?php

namespace App\Filament\Borrower\Resources;

use App\Filament\Borrower\Resources\ApplicationHistoryResource\Pages;
use App\Models\BankDetail;
use App\Models\Loans;
use App\Models\User;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ApplicationHistoryResource extends Resource
{
    protected static ?string $model = Loans::class;



    protected static ?string $label = 'Riwayat Pengajuan';
    protected static ?string $pluralLabel = 'Riwayat Pengajuan';
    protected static ?string $breadcrumb = 'Riwayat Pengajuan';
    protected static ?string $navigationLabel = 'Riwayat Pengajuan';
    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Rekening Peminjam')
                        ->schema([
                            Forms\Components\TextInput::make('user_id')
                                ->label('User ID'),
                            Forms\Components\TextInput::make('amount')
                                ->label('Jumlah Pinjaman')
                                ->required(),
                            Forms\Components\TextInput::make('loan_duration')
                                ->label('Lama Pinjaman')
                                ->required(),
                        ]),
                ])
                    ->skippable()
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan([
                        'sm' => 2,
                    ])
            ]);

    }

    public static function table(Table $table): Table
    {
        $user = Auth::user();
        $userId = $user->id;
        return $table
        ->modifyQueryUsing(function (Builder $query) use ($userId) {
            $query->where('user_id', $userId);
        })

            ->columns([
                Tables\Columns\TextColumn::make('loan_status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'approved', 'Approved', 'APPROVED' => 'success',
                        'rejected', 'Rejected', 'REJECTED' => 'danger',
                        'pending', 'Pending', 'PENDING' => 'info',
                    }),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric(
                        decimalPlaces: 0,
                        decimalSeparator: '.',
                        thousandsSeparator: ',',
                    )
                    ->sortable(),
                Tables\Columns\TextColumn::make('loan_duration')
                    ->searchable(),
                Tables\Columns\TextColumn::make('application_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('approval_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('denied_date')
                    ->date()
                    ->sortable(),

            ])
            ->striped();


    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApplicationHistories::route('/'),
            'create' => Pages\CreateApplicationHistory::route('/create'),
        ];
    }

}
