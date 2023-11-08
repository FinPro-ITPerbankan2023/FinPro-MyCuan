<?php

namespace App\Filament\Borrower\Resources;

use App\Filament\Borrower\Resources\BankDetailResource\Pages;
use App\Filament\Borrower\Resources\BankDetailResource\RelationManagers;
use App\Filament\Borrower\Resources\BankDetailResource\RelationManagers\BusinessRelationManager;
use App\Models\Bank;
use App\Models\BankDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class BankDetailResource extends Resource
{
    protected static ?string $model = BankDetail::class;
    protected static ?string $navigationGroup = 'Data Diri';
    protected static ?string $modelLabel = 'Informasi Bank';
    protected static ?string $pluralLabel = 'Informasi Bank';


    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('account_name')
                    ->label('Nama Akun')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('bank_number')
                    ->label('Nomor Bank')
                    ->required()
                    ->numeric(),

                Forms\Components\Select::make('bank_name')
                    ->label('Nama Bank')
                    ->options(Bank::all()->pluck('nama_bank', 'nama_bank'))
                    ->searchable(),
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
                    Tables\Columns\TextColumn::make('account_name')
                        ->label('Nama Akun'),

                    Tables\Columns\TextColumn::make('bank_number')
                        ->label('Nomor Akun'),

                    Tables\Columns\TextColumn::make('bank_name')
                        ->label('Nama Bank')
                        ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ])
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Identitas Peminjam')
                    ->icon('heroicon-o-credit-card')

                    ->schema([
                        TextEntry::make('account_name')
                            ->label('Nama Akun'),

                        TextEntry::make('bank_number')
                            ->label('Nomor Akun'),

                        TextEntry::make('bank_name')
                            ->label('Nama Bank')
                    ])
                    ->collapsible()
                    ->columns(3),
            ]);
    }
    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBankDetails::route('/'),
            'create' => Pages\CreateBankDetail::route('/create'),
//            'view' => Pages\ViewBankDetail::route('/{record}'),
            'edit' => Pages\EditBankDetail::route('/{record}/edit'),
        ];
    }
}
