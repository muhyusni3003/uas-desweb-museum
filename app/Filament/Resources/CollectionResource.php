<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CollectionResource\Pages;
use App\Models\Collection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class CollectionResource extends Resource
{
    protected static ?string $model = Collection::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Input untuk nama koleksi
                Forms\Components\TextInput::make('name')
                    ->label('Nama Lukisan')
                    ->required()
                    ->maxLength(255),

                // Menambahkan input untuk 'nama_pelukis'
                Forms\Components\TextInput::make('nama_pelukis')
                    ->label('Nama Pelukis')
                    ->required()
                    ->maxLength(255),

                // Input untuk deskripsi koleksi
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi Lukisan')
                    ->nullable(),

                // Input untuk tahun koleksi
                Forms\Components\DatePicker::make('year')
                    ->label('Tahun Lukisan')
                    ->nullable()
                    ->displayFormat('Y')
                    ->format('Y')
                    ->minDate(now()->subYears(500)) // Tahun minimal (500 tahun lalu)
                    ->maxDate(now()),// Tahun maksimal (tahun ini)



                // Input untuk tipe lukisan (dropdown)
                Forms\Components\Select::make('tipe_lukisan')
                    ->label('Tipe Lukisan')
                    ->options([
                        'Realisme' => 'Realisme',
                        'Abstrak' => 'Abstrak',
                        'Sejarah' => 'Sejarah',
                        'Mural' => 'Mural',
                    ])
                    ->default('Realisme'),

                // Input untuk status koleksi (dropdown)
                Forms\Components\Select::make('status')
                    ->label('Status Koleksi')
                    ->options([
                        'Ditampilkan' => 'Ditampilkan',
                        'Disimpan' => 'Disimpan',
                        'Lelang' => 'Lelang',
                    ])
                    ->default('Ditampilkan'),

                // Input untuk kondisi koleksi (dropdown)
                Forms\Components\Select::make('condition')
                    ->label('Kondisi Koleksi')
                    ->options([
                        'Baik' => 'Baik',
                        'Cacat' => 'Cacat',
                    ])
                    ->default('Baik'),

                Forms\Components\FileUpload::make('image')
                        ->image()
                        ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Lukisan')
                    ->searchable(),

                // Menambahkan kolom untuk 'nama_pelukis'
                Tables\Columns\TextColumn::make('nama_pelukis')
                    ->label('Nama Pelukis')
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi Lukisan')
                    ->getStateUsing(fn ($record) => Str::words($record->description, 5)), // Menampilkan hanya 5 kata pertama

                    Tables\Columns\TextColumn::make('year')
                    ->label('Tahun Lukisan')
                    ->date('Y') // Format hanya tahun
                    ->sortable(),


                Tables\Columns\TextColumn::make('tipe_lukisan')
                    ->label('Tipe Lukisan'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status Koleksi'),

                Tables\Columns\TextColumn::make('condition')
                    ->label('Kondisi Koleksi'),

                    Tables\Columns\ImageColumn::make('image'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCollections::route('/'),
            'create' => Pages\CreateCollection::route('/create'),
            'edit' => Pages\EditCollection::route('/{record}/edit'),
        ];
    }
}
