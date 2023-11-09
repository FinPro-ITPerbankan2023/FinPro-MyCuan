<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LoansResource\Pages;
use App\Filament\Resources\LoansResource\RelationManagers;
use App\Models\Loans;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LoansResource extends Resource
{
    protected static ?string $model = Loans::class;

    protected static ?string $pluralLabel = 'Ajuan Pinjaman';

    protected static ?string $navigationGroup = 'Loan Management';

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('loan_status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('loan_duration')
                    ->maxLength(255),
                Forms\Components\TextInput::make('loan_purpose')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('application_date')
                    ->required(),
                Forms\Components\DatePicker::make('approval_date'),
                Forms\Components\DatePicker::make('denied_date'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable()
                    ->searchable()
                    ->label('Nama Peminjam'),

                TextColumn::make('loan_status')
                    ->badge()
                    ->color(fn (bool $state): string => match ($state) {
                        false => 'danger',
                        true => 'success',
                    })
                    ->formatStateUsing(fn (bool $state): string => $state ? __("SUDAH DIDANAI") : __("BELUM DIDANAI"))
                    ->label('Status Pinjaman'),

                IconColumn::make('is_verified')
                    ->label('Diverifikasi oleh Admin')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-mark')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable()
                    ->money('idr')
                    ->label('Jumlah Pinjaman'),

                Tables\Columns\TextColumn::make('loan_duration')
                    ->searchable()
                    ->label('Lama Pinjaman (Bulan)')
                    ->alignCenter(),

                Tables\Columns\TextColumn::make('application_date')
                    ->dateTime()
                    ->sortable()
                    ->label('Tanggal Pengajuan'),

                Tables\Columns\TextColumn::make('verification_date')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Tanggal Ajuan Pinjaman Diterima'),

                Tables\Columns\TextColumn::make('approval_date')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Tanggal Pengajuan Diterima'),

                Tables\Columns\TextColumn::make('denied_date')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Tanggal Pengajuan Ditolak'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Terakhir Update'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Action::make('is_verified')
                    ->action(fn (Loans $record) => $record->verifyAdmin())
                    ->requiresConfirmation()
                    ->button()
                    ->label('VERIFIKASI')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->striped();
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
            'index' => Pages\ListLoans::route('/'),
            'create' => Pages\CreateLoans::route('/create'),
            'view' => Pages\ViewLoans::route('/{record}'),
            'edit' => Pages\EditLoans::route('/{record}/edit'),
        ];
    }
}
