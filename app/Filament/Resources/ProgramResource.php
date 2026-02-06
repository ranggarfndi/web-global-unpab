<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Support\Str;

class ProgramResource extends Resource
{
    use Translatable; // Aktifkan fitur multi-bahasa

    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    
    // Agar tombol ganti bahasa muncul di pojok kanan atas form
    public static function getTranslatableLocales(): array
    {
        return ['id', 'en'];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // --- HEADER SECTION (Judul & Kategori) ---
                Forms\Components\Group::make()
                    ->schema([
                        TextInput::make('title')
                            ->label('Nama Program')
                            ->required()
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Forms\Set $set) => 
                                $operation === 'create' ? $set('slug', Str::slug($state)) : null),

                        TextInput::make('slug')
                            ->required()
                            ->unique(ignoreRecord: true),

                        Select::make('category')
                            ->options([
                                'experience_at_unpab' => 'Experience at UNPAB (Inbound)',
                                'global_opportunities' => 'UNPAB Global Opportunities (Outbound)',
                            ])
                            ->required(),

                        Select::make('target_audience')
                            ->options([
                                'student' => 'Student',
                                'lecturer' => 'Lecturer',
                                'staff' => 'Staff',
                            ])
                            ->required(),
                            
                        Forms\Components\DatePicker::make('registration_deadline')
                            ->label('Batas Pendaftaran'),
                    ])->columns(2),

                // --- TABS SECTION (Detail Konten) ---
                Tabs::make('Program Details')
                    ->tabs([
                        // TAB 1: OVERVIEW
                        Tabs\Tab::make('Overview')
                            ->icon('heroicon-m-information-circle')
                            ->schema([
                                Repeater::make('overview')
                                    ->label('Poin Ringkasan')
                                    ->schema([
                                        TextInput::make('label')->label('Label (Ex: Duration)')->required(),
                                        TextInput::make('value')->label('Isi (Ex: 3 Months)')->required(),
                                    ])
                                    ->columns(2)
                                    ->helperText('Tambahkan poin info penting di sini.'),
                            ]),

                        // TAB 2: ACTIVITIES
                        Tabs\Tab::make('Activities')
                            ->icon('heroicon-m-calendar-days')
                            ->schema([
                                Repeater::make('activities')
                                    ->label('Timeline Kegiatan')
                                    ->schema([
                                        TextInput::make('time')->label('Waktu (Ex: Day 1)'),
                                        TextInput::make('activity')->label('Nama Kegiatan'),
                                        Forms\Components\Textarea::make('detail')->label('Detail Singkat'),
                                    ])
                                    ->columns(2),
                            ]),

                        // TAB 3: GALLERY
                        Tabs\Tab::make('Gallery')
                            ->icon('heroicon-m-photo')
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('gallery')
                                    ->collection('program_gallery')
                                    ->multiple()
                                    ->reorderable()
                                    ->image()
                                    ->imageEditor(),
                            ]),

                        // TAB 4: DESCRIPTION
                        Tabs\Tab::make('Full Description')
                            ->icon('heroicon-m-document-text')
                            ->schema([
                                RichEditor::make('description')
                                    ->label('Deskripsi Lengkap')
                                    ->toolbarButtons([
                                        'bold', 'italic', 'h2', 'h3', 'bulletList', 'orderedList', 'link'
                                    ]),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category'),
                Tables\Columns\TextColumn::make('target_audience'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}