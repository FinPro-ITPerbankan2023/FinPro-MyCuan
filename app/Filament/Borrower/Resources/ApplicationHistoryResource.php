<?php

namespace App\Filament\Borrower\Resources;

use App\Filament\Borrower\Resources\ApplicationHistoryResource\Pages;
use App\Filament\Borrower\Resources\ApplicationHistoryResource\RelationManagers;
use App\Models\ApplicationHistory;
use App\Models\Loans;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ApplicationHistoryResource extends Resource
{
    protected static ?string $model = Loans::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
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
                        'approved' => 'success',
                        'rejected' => 'danger',
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
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('approval_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('denied_date')
                    ->date()
                    ->sortable(),


            ]);


    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApplicationHistories::route('/'),
        ];
    }
}
