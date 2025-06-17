<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Models\Banner;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    /**
     * Returns the form definition for the resource.
     *
     * @return \Filament\Forms\Form
     */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Upload image for banner 1
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('/banners'),
                // Upload image for banner 2
                FileUpload::make('image2')
                    ->image()
                    ->disk('public')
                    ->directory('/banner'),
                // Upload image for banner 3
                FileUpload::make('image3')
                    ->image()
                    ->disk('public')
                    ->directory('/banner'),
                // Upload image for banner 4
                FileUpload::make('image4')
                    ->image()
                    ->disk('public')
                    ->directory('/banner'),
            ]);
    }

    /**
     * Returns the table definition for the resource.
     *
     * @param \Filament\Tables\Table $table
     * @return \Filament\Tables\Table
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                // Label for the image column
                ->label('Banner 1')
                // Set the size of the image column
                ->size(80)
                // Use the public disk for the image column
                ->disk('public')
                // Set the state of the image column using a callback
                ->getStateUsing(fn ($record) => $record->image ? asset('storage/' . $record->image) : null),

                ImageColumn::make('image2')
                // Use the public disk for the image2 column
                ->disk('public')
                // Set the state of the image2 column using a callback
                ->getStateUsing(fn($record) => $record->image2 ? asset('storage/' . $record->image2) : null),

                ImageColumn::make('image3')
                // Use the public disk for the image3 column
                ->disk('public')
                // Set the state of the image3 column using a callback
                ->getStateUsing(fn($record) => $record->image3 ? asset('storage/' . $record->image3) : null),

                ImageColumn::make('image4')
                // Use the public disk for the image4 column
                ->disk('public')
                // Set the state of the image4 column using a callback
                ->getStateUsing(fn($record) => $record->image4 ? asset('storage/' . $record->image4) : null),
            ])
            // Add filters to the table
            ->filters([
                //
            ])
            // Add actions to the table
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            // Add bulk actions to the table
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),

        ];
    }
}
