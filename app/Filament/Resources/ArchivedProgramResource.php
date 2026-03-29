<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArchivedProgramResource\Pages;
use App\Filament\Resources\ArchivedProgramResource\RelationManagers;
use App\Models\ArchivedProgram;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArchivedProgramResource extends Resource
{
    protected static ?string $model = ArchivedProgram::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('Archive Data')->tabs([
                Forms\Components\Tabs\Tab::make('General Info')->schema([
                    Forms\Components\TextInput::make('title.id')->label('Judul (ID)')->required(),
                    Forms\Components\TextInput::make('title.en')->label('Title (EN)')->required(),
                    Forms\Components\Select::make('category')
                        ->options([
                            'global_opportunities' => 'Global Opportunities',
                            'experience_at_unpab' => 'Experience at UNPAB',
                        ])->required(),
                    Forms\Components\DatePicker::make('execution_date')->required(),
                ]),
                Forms\Components\Tabs\Tab::make('Report & Stats')->schema([
                    Forms\Components\RichEditor::make('content.id')->label('Laporan (ID)'),
                    Forms\Components\RichEditor::make('content.en')->label('Report (EN)'),
                    // Repeater untuk informasi tambahan seperti statistik
                    Forms\Components\Repeater::make('stats')
                        ->schema([
                            Forms\Components\TextInput::make('label')->required(),
                            Forms\Components\TextInput::make('value')->required(),
                        ])->columns(2),
                ]),
                Forms\Components\Tabs\Tab::make('Documentation')->schema([
                    Forms\Components\SpatieMediaLibraryFileUpload::make('archive_documentation')
                        ->collection('archive_documentation')
                        ->multiple() // Admin bisa tambah banyak dokumentasi
                        ->reorderable(),
                ]),
                Forms\Components\Tabs\Tab::make('Testimonials')->schema([
                    Forms\Components\Repeater::make('testimonials')
                        ->label('Testimoni Peserta')
                        ->schema([
                            Forms\Components\FileUpload::make('photo')
                                ->label('Foto Peserta')
                                ->image()
                                ->avatar()
                                ->directory('testimonials')
                                ->imageEditor(),
                            Forms\Components\TextInput::make('name')
                                ->label('Nama Lengkap & Gelar')
                                ->placeholder('Contoh: Dr. Rangga Rafandi, M.Kom') // Menyesuaikan profil Anda sebagai tech innovator
                                ->required(),
                            Forms\Components\TextInput::make('identifier') // Kita ganti key 'npm' menjadi 'identifier' agar lebih umum
                                ->label('Nomor Identitas (NPM/NIDN/NIP)')
                                ->placeholder('Masukkan nomor identitas resmi')
                                ->required(),
                            Forms\Components\Select::make('rating')
                                ->label('Rating')
                                ->options([
                                    5 => '⭐⭐⭐⭐⭐',
                                    4 => '⭐⭐⭐⭐',
                                    3 => '⭐⭐⭐',
                                    2 => '⭐⭐',
                                    1 => '⭐',
                                ])
                                ->default(5)
                                ->required(),
                            Forms\Components\Textarea::make('content')
                                ->label('Isi Testimoni')
                                ->rows(3)
                                ->required(),
                        ])
                        ->columns(2)
                        ->collapsible()
                        ->itemLabel(fn (array $state): ?string => $state['name'] ?? null),
                ]),
            ])->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Menampilkan Judul (Karena translatable, ambil dari locale aktif)
                Tables\Columns\TextColumn::make('title')
                    ->label('Program Title')
                    ->searchable()
                    ->sortable(),

                // Menampilkan Kategori
                Tables\Columns\TextColumn::make('category')
                    ->badge() // Membuat tampilan seperti lencana
                    ->color(fn (string $state): string => match ($state) {
                        'global_opportunities' => 'success',
                        'experience_at_unpab' => 'warning',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => str_replace('_', ' ', $state))
                    ->label('Category'),

                // Menampilkan Tanggal Pelaksanaan
                Tables\Columns\TextColumn::make('execution_date')
                    ->date('d M Y')
                    ->sortable()
                    ->label('Execution Date'),

                // Status Publish
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean()
                    ->label('Published'),
            ])
            ->filters([
                // Tambahkan filter jika perlu
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListArchivedPrograms::route('/'),
            'create' => Pages\CreateArchivedProgram::route('/create'),
            'edit' => Pages\EditArchivedProgram::route('/{record}/edit'),
        ];
    }
}
