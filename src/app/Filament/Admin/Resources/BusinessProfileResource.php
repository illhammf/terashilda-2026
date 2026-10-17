<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BusinessProfileResource\Pages;
use App\Models\BusinessProfile;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BusinessProfileResource extends Resource
{
    protected static ?string $model = BusinessProfile::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';

    protected static ?string $navigationGroup = 'Pengaturan';

    protected static ?string $navigationLabel = 'Profil Bisnis';

    protected static ?string $modelLabel = 'Profil Bisnis';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('tagline')
                            ->maxLength(255)
                            ->nullable(),
                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->nullable(),
                        Forms\Components\Textarea::make('story')
                            ->rows(5)
                            ->columnSpanFull()
                            ->nullable(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Kontak & Lokasi')
                    ->schema([
                        Forms\Components\TextInput::make('address')
                            ->maxLength(500)
                            ->nullable(),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(20)
                            ->nullable(),
                        Forms\Components\TextInput::make('whatsapp')
                            ->tel()
                            ->maxLength(20)
                            ->nullable(),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->maxLength(255)
                            ->nullable(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Media Sosial')
                    ->schema([
                        Forms\Components\TextInput::make('instagram')
                            ->prefix('@')
                            ->maxLength(255)
                            ->nullable(),
                        Forms\Components\TextInput::make('tiktok')
                            ->prefix('@')
                            ->maxLength(255)
                            ->nullable(),
                        Forms\Components\TextInput::make('facebook')
                            ->maxLength(255)
                            ->nullable(),
                        Forms\Components\FileUpload::make('logo')
                            ->image()
                            ->directory('business')
                            ->nullable(),
                        Forms\Components\FileUpload::make('hero_image')
                            ->image()
                            ->directory('business')
                            ->nullable(),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Jam Buka')
                    ->schema([
                        Forms\Components\Repeater::make('opening_hours')
                            ->schema([
                                Forms\Components\TextInput::make('day')
                                    ->placeholder('Senin - Jumat')
                                    ->required(),
                                Forms\Components\TextInput::make('hours')
                                    ->placeholder('09:00 - 21:00')
                                    ->required(),
                            ])
                            ->columns(2)
                            ->nullable(),
                    ]),

                Forms\Components\Toggle::make('is_active')
                    ->default(true)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tagline')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBusinessProfiles::route('/'),
            'create' => Pages\CreateBusinessProfile::route('/create'),
            'edit' => Pages\EditBusinessProfile::route('/{record}/edit'),
        ];
    }
}
