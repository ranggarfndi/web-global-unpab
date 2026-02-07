<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganizationMemberResource\Pages;
use App\Models\OrganizationMember;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload; // Import Penting!
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn; // Import Penting!

class OrganizationMemberResource extends Resource
{
    protected static ?string $model = OrganizationMember::class;

    // Ikon menu di sidebar (pilih yang cocok untuk "People" atau "Team")
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    
    // Urutan menu
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Profile Information')
                    ->description('Masukan data diri anggota tim.')
                    ->schema([
                        Grid::make(2)->schema([
                            // 1. Upload Foto (Pakai Spatie)
                            SpatieMediaLibraryFileUpload::make('member_photo')
                                ->label('Photo Profile')
                                ->collection('member_photo') // Harus sama dengan di Model
                                ->avatar() // Mode bulat/avatar
                                ->image()
                                ->imageEditor() // Fitur crop/edit bawaan Filament
                                ->columnSpan(2) // Biar lebar sendiri di atas
                                ->alignCenter(),

                            // 2. Nama & Jabatan
                            Forms\Components\TextInput::make('name')
                                ->required()
                                ->maxLength(255)
                                ->placeholder('e.g. Dr. Rahmat, S.Kom'),
                            
                            Forms\Components\TextInput::make('position')
                                ->required()
                                ->maxLength(255)
                                ->placeholder('e.g. Head of Division'),
                        ]),
                    ]),

                Section::make('Contact & Social')
                    ->schema([
                        Grid::make(2)->schema([
                            Forms\Components\TextInput::make('email')
                                ->email()
                                ->maxLength(255)
                                ->prefixIcon('heroicon-m-envelope'),
                            
                            Forms\Components\TextInput::make('linkedin_url')
                                ->label('LinkedIn URL')
                                ->url()
                                ->maxLength(255)
                                ->prefixIcon('heroicon-m-link')
                                ->placeholder('https://linkedin.com/in/...'),
                        ]),
                    ]),

                Section::make('Settings')
                    ->schema([
                        Grid::make(2)->schema([
                            // 3. Sort Order (Untuk mengatur urutan tampilan di web)
                            Forms\Components\TextInput::make('sort_order')
                                ->numeric()
                                ->default(0)
                                ->helperText('Angka lebih kecil akan tampil lebih dulu (0 = Paling Atas).'),
                            
                            // 4. Status Aktif
                            Forms\Components\Toggle::make('is_active')
                                ->label('Active Status')
                                ->default(true)
                                ->helperText('Jika dimatikan, anggota tidak akan muncul di website.')
                                ->onColor('success')
                                ->offColor('danger'),
                        ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom Foto
                SpatieMediaLibraryImageColumn::make('member_photo')
                    ->collection('member_photo')
                    ->label('Photo')
                    ->circular(),

                // Kolom Nama & Email (Bisa dicari)
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                // Kolom Jabatan
                Tables\Columns\TextColumn::make('position')
                    ->searchable(),

                // Kolom Sort Order (Bisa diedit langsung di tabel is nice to have)
                Tables\Columns\TextInputColumn::make('sort_order')
                    ->sortable()
                    ->rules(['numeric']),

                // Kolom Status (Toggle langsung di tabel)
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Active'),
            ])
            ->defaultSort('sort_order', 'asc') // Default urutkan berdasarkan sort_order
            ->filters([
                // Filter status aktif/non-aktif
                Tables\Filters\Filter::make('active')
                    ->query(fn ($query) => $query->where('is_active', true))
                    ->label('Show Active Only'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrganizationMembers::route('/'),
            'create' => Pages\CreateOrganizationMember::route('/create'),
            'edit' => Pages\EditOrganizationMember::route('/{record}/edit'),
        ];
    }
}