<?php

namespace App\Filament\Lender\Resources;

use App\Filament\Lender\Resources\LoanApplicationsResource\Pages;
use App\Filament\Lender\Resources\LoanApplicationsResource\RelationManagers;
use App\Models\LoanApplications;
use App\Models\Loans;
use App\Models\new_identity;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
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
                $query->where('loan_status', 'Approved');
            })
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('loan_status')
                    ->badge()
                    ->color('success')
                    ->searchable(),
                Tables\Columns\TextColumn::make('loan_duration')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('application_date')
                    ->dateTime()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('amount')
                    ->money('idr')
                    ->summarize(Sum::make()->money('idr'))
            ])
            ->filters([
            ])
            ->actions([
//                Tables\Actions\ViewAction::make(),
//                Tables\Actions\EditAction::make(),
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

                            new_identity::create($dataToInsert);

                            $record->delete();

                        });
                    })
            ])
            ->striped()
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'create' => Pages\CreateLoanApplications::route('/create'),
            'view' => Pages\ViewLoanApplications::route('/{record}'),
            'edit' => Pages\EditLoanApplications::route('/{record}/edit'),
        ];
    }
}
