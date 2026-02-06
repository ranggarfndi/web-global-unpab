<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartnerResource\Pages;
use App\Models\Partner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;

class PartnerResource extends Resource
{
    protected static ?string $model = Partner::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2'; // Ikon Gedung

    // protected static ?string $navigationGroup = 'Master Data'; // Mengelompokkan menu (Opsional)

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Mitra')
                    ->schema([
                        // Input Nama
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Instansi / Universitas')
                            ->required()
                            ->maxLength(255),

                        // Input Website
                        Forms\Components\TextInput::make('website_url')
                            ->label('Website URL')
                            ->url()
                            ->suffixIcon('heroicon-m-globe-alt')
                            ->placeholder('https://...'),

                        // Toggle Aktif/Tidak
                        Forms\Components\Toggle::make('is_active')
                            ->label('Tampilkan di Website?')
                            ->default(true),
                    ])->columns(2),

                Forms\Components\Section::make('Logo')
                    ->schema([
                        // Upload Logo
                        SpatieMediaLibraryFileUpload::make('logo')
                            ->collection('partner_logo') // Sesuai nama di Model
                            ->image()
                            ->imageEditor()
                            ->required() // Wajib ada logo
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Menampilkan Logo Kecil di Tabel
                Tables\Columns\SpatieMediaLibraryImageColumn::make('logo')
                    ->collection('partner_logo')
                    ->circular(), 

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('website_url')
                    ->icon('heroicon-m-link')
                    ->color('primary')
                    ->openUrlInNewTab(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListPartners::route('/'),
            'create' => Pages\CreatePartner::route('/create'),
            'edit' => Pages\EditPartner::route('/{record}/edit'),
        ];
    }
}