<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcaraResource\Pages;
use App\Models\Acara;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class AcaraResource extends Resource
{
    protected static ?string $model = Acara::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Input untuk nama acara
                Forms\Components\TextInput::make('name')
                    ->label('Nama Acara')
                    ->required()
                    ->maxLength(255),

                // Input untuk deskripsi acara
                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi Acara')
                    ->nullable(),

                // Input untuk tanggal acara
                Forms\Components\DatePicker::make('date')
                    ->label('Tanggal Acara')
                    ->required(),

                // Input untuk lokasi acara
                Forms\Components\TextInput::make('location')
                    ->label('Lokasi Acara')
                    ->nullable()
                    ->maxLength(255),

                // Input untuk status acara
                Forms\Components\Select::make('status')
                    ->label('Status Acara')
                    ->options([
                        'Scheduled' => 'Akan Datang',
                        'Ongoing' => 'Sedang Berlangsung',
                        'Completed' => 'Selesai',
                    ])
                    ->default('Upcoming'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Acara')
                    ->searchable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi Acara'),

                Tables\Columns\TextColumn::make('date')
                    ->label('Tanggal Acara')
                    ->sortable(),

                Tables\Columns\TextColumn::make('location')
                    ->label('Lokasi Acara'),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status Acara'),
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
            'index' => Pages\ListAcaras::route('/'),
            'create' => Pages\CreateAcara::route('/create'),
            'edit' => Pages\EditAcara::route('/{record}/edit'),
        ];
    }
}
