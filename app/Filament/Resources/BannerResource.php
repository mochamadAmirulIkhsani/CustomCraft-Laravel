<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                FileUpload::make('image')
                 ->image()
                 ->disk('public')
                 ->directory('/banners'),
                FileUpload::make('image2')
                ->image()
                ->disk('public')
                ->directory('/banners'),
                FileUpload::make('image3')
                ->image()
                ->disk('public')
                ->directory('/banners'),
                FileUpload::make('image4')
                ->image()
                ->disk('public')
                ->directory('/banners'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                ->disk('public')
                ->getStateUsing(fn($record) => $record->image ? asset('storage/' . $record->image) : null),

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
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
