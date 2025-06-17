<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\ProductResource\Pages;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_produk'),
                RichEditor::make('deskripsi'),
                TextInput::make('no_whatsapp'),

                FileUpload::make('image')
                ->image()
                ->disk('public')
                ->directory('/images'),
                FileUpload::make('image2')
                ->image()
                ->disk('public')
                ->directory('/images'),
                FileUpload::make('image3')
                ->image()
                ->disk('public')
                ->directory('/images'),
                FileUpload::make('image4')
                ->image()
                ->disk('public')
                ->directory('/images'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_produk')
                ->description(function (Product $record) {
                    $plainText = strip_tags($record->deskripsi);

                    return \Illuminate\Support\Str::limit($plainText, 80);
                }),
                TextColumn::make('deskripsi')->hidden(),
                TextColumn::make('no_whatsapp'),

                ImageColumn::make('image')
                ->label('Banner 1')
                ->size(80)
                ->disk('public') // Gunakan disk 'public'
                ->getStateUsing(fn ($record) => $record->image ? asset('storage/' . $record->image) : null),

                ImageColumn::make('image2')
                ->disk('public')
                ->getStateUsing(fn($record) => $record->image2 ? asset('storage/' . $record->image2) : null),

                ImageColumn::make('image3')
                ->disk('public')
                ->getStateUsing(fn($record) => $record->image3 ? asset('storage/' . $record->image3) : null),

                ImageColumn::make('image4')
                ->disk('public')
                ->getStateUsing(fn($record) => $record->image4 ? asset('storage/' . $record->image4) : null),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
