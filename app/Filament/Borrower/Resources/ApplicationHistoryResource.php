<?php

namespace App\Filament\Borrower\Resources;

use App\Filament\Borrower\Resources\ApplicationHistoryResource\Pages;
use App\Filament\Borrower\Resources\ApplicationHistoryResource\RelationManagers\BusinessRelationManager;
use App\Models\BankDetail;
use App\Models\Business;
use App\Models\Loans;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\UserIdentity;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Form;
use Filament\Forms;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\IconPosition;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\HtmlString;

class ApplicationHistoryResource extends Resource
{
    protected static ?string $model = Loans::class;
    protected static ?string $pluralLabel = 'Riwayat Peminjaman';
    protected static ?string $navigationLabel = 'Riwayat Pengajuan';
    protected static ?string $navigationIcon = 'heroicon-o-bookmark';
    protected static ?string $navigationGroup = 'Peminjaman';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Ajukan Pinjaman')
                        ->icon('heroicon-o-document-plus')
                        ->schema([
                            Textarea::make('loan_purpose')
                                ->label('Tujuan Peminjaman')
                                ->autosize()
                                ->minLength(10)
                                ->maxLength(1024)
                                ->required(),
                            Select::make('loan_duration')
                                ->label('Lama Pinjaman')
                                ->options([
                                    '1' => '1 Bulan',
                                    '3' => '3 Bulan',
                                    '6' => '6 Bulan',
                                    '12' => '12 Bulan',
                                    '18' => '18 Bulan',
                                    '24' => '24 Bulan'
                                ])
                                ->required(),
                            Forms\Components\TextInput::make('amount')
                                ->label('Jumlah Pinjaman')
                                ->placeholder('Minimal Rp. 3.000.000')
                                ->rules('numeric', 'min:3000000')
                                ->required()
                                ->prefix('Rp.')
                                ->inputMode('decimal')
                                ->currencyMask(thousandSeparator: ',',decimalSeparator: '.',precision: 2),
                            Hidden::make('user_id')
                                ->default(function () {
                                    $authUserId = auth()->id();
                                    return User::where('id', $authUserId)->value('id', 'id');
                                })
                                ->disabled()
                                ->dehydrated(),
                            Hidden::make('user_identity_id')
                                ->default(function () {
                                    $authUserId = auth()->id();
                                    return UserIdentity::where('id', $authUserId)->value('id', 'id');
                                })
                                ->disabled()
                                ->dehydrated(),
                            Hidden::make('user_detail_id')
                                ->default(function () {
                                    $authUserId = auth()->id();
                                    return UserDetail::where('id', $authUserId)->value('id', 'id');
                                })
                                ->disabled()
                                ->dehydrated(),
                            Hidden::make('business_id')
                                ->default(function () {
                                    $authUserId = auth()->id();
                                    return Business::where('id', $authUserId)->value('id', 'id');
                                })
                                ->disabled()
                                ->dehydrated()

                ]),
                    Wizard\Step::make('Konfirmasi Pinjaman')
                        ->icon('heroicon-o-check-circle')
                        ->schema([
                            Tabs::make('Label')
                                ->tabs([
                                    Tabs\Tab::make('Data Diri')
                                        ->icon('heroicon-m-user-circle')
                                        ->iconPosition(IconPosition::After)
                                        ->schema([
                                            Forms\Components\TextInput::make('identity_number')
                                                ->label('Nomor Identitas')
                                                ->suffixIcon('heroicon-m-credit-card')
                                                ->default(function () {
                                                    $authUserId = auth()->id();
                                                    return UserIdentity::where('id', $authUserId)->value('identity_number', 'id');
                                                })
                                                ->disabled(),
                                        ]),
                                    Tabs\Tab::make('Informasi Bank')
                                        ->icon('heroicon-m-building-office')
                                        ->iconPosition(IconPosition::After)
                                        ->schema([
                                            Forms\Components\TextInput::make('bank_name')
                                                ->label('Nama Bank')
                                                ->default(function () {
                                                    $authUserId = auth()->id();
                                                    return BankDetail::where('id', $authUserId)->value('bank_name');
                                                })
                                                ->disabled(),
                                            Forms\Components\TextInput::make('bank_number')
                                                ->label('Nomor Bank')
                                                ->default(function () {
                                                    $authUserId = auth()->id();
                                                    return BankDetail::where('id', $authUserId)->value('bank_number');
                                                })
                                                ->disabled(),
                                        ]),
                                    Tabs\Tab::make('Informasi Usaha')
                                        ->icon('heroicon-m-building-storefront')
                                        ->iconPosition(IconPosition::After)
                                        ->schema([
                                            Forms\Components\TextInput::make('business_name')
                                                ->label('Nama Usaha')
                                                ->default(function () {
                                                    $authUserId = auth()->id();
                                                    return Business::where('id', $authUserId)->value('business_name');
                                                })
                                                ->disabled(),
                                            Forms\Components\TextInput::make('field_of_business')
                                                ->label('Bidang Usaha')
                                                ->default(function () {
                                                    $authUserId = auth()->id();
                                                    return Business::where('id', $authUserId)->value('field_of_business');
                                                })
                                                ->disabled(),
                                            Forms\Components\TextInput::make('business_ownership')
                                                ->label('Kepemilikan Usaha')
                                                ->default(function () {
                                                    $authUserId = auth()->id();
                                                    return Business::where('id', $authUserId)->value('business_ownership');
                                                })
                                                ->disabled(),
                                            Forms\Components\TextInput::make('business_duration')
                                                ->label('Lama Usaha Berdiri')
                                                ->default(function () {
                                                    $authUserId = auth()->id();
                                                    return Business::where('id', $authUserId)->value('business_duration');
                                                })
                                                ->disabled(),
                                            Forms\Components\TextInput::make('income_avg')
                                                ->label('Penghasilan Rata-Rata')
                                                ->prefix('Rp.')
                                                ->currencyMask(thousandSeparator: ',',decimalSeparator: '.',precision: 2)
                                                ->default(function () {
                                                    $authUserId = auth()->id();
                                                    return Business::where('id', $authUserId)->value('income_avg');
                                                })
                                                ->disabled(),
                                        ])
                                ])
                                ->columns([
                                    'sm' => 2,
                                ])
                                ->columnSpan([
                                    'sm' => 2,
                                ]),
                        ]),
                ])
                    ->nextAction(
                        fn (Action $action) => $action->label('Selanjutnya'),
                    )
                    ->previousAction(
                        fn (Action $action) => $action->label('Sebelumnya'),
                    )
                    ->skippable()
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan([
                        'sm' => 2,
                    ]),
            ]);

    }

    public static function table(Table $table): Table
    {
        $user = Auth::user();
        $userId = $user->id;
        $record = Loans::where('user_id', $userId)->get(); // Fetch the records for the specific user
        return $table
        ->modifyQueryUsing(function (Builder $query) use ($userId) {
            $query->where('user_id', $userId);
        })
            ->columns([
                TextColumn::make('loan_status')
                    ->badge()
                    ->color(fn (bool $state): string => match ($state) {
                        false => 'danger',
                        true => 'success',
                    })
                    ->formatStateUsing(fn (bool $state): string => $state ? __("SUDAH DIDANAI") : __("BELUM DIDANAI"))
                    ->label('Status Pinjaman'),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Jumlah Pinjaman')
                    ->money('idr')
                    ->sortable(),

                Tables\Columns\TextColumn::make('loan_duration')
                    ->label('Lama Pengajuan (Bulan)')
                    ->searchable()
                    ->sortable()
                    ->alignCenter(),


                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Tanggal Update Terakhir')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->striped()
            ->actions([
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
                    ->icon('heroicon-o-play')
                    ->schema([
                        TextEntry::make('loan_purpose') ->label('Tujuan Pinjaman'),

                        TextEntry::make('application_date') ->label('Tanggal Pengajuan'),
                    ]) ->columns(3),

            ]);
    }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApplicationHistories::route('/'),
            'create' => Pages\CreateApplicationHistory::route('/create'),
//            'view' => Pages\ViewApplicationHistory::route('/{record}'),
//            'edit' => Pages\EditApplicationHistory::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
        ];
    }


}
