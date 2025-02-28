<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductgenreResource\Pages;
use App\Filament\Resources\ProductgenreResource\RelationManagers;
use App\Models\Productgenre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TextFilter; // if you need a text filter
use Filament\Tables\Columns\ImageColumn;

class ProductgenreResource extends Resource
{
    protected static ?string $model = Productgenre::class;


    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';
    protected static ?int $navigationSort = 6;
    protected static ?string $navigationGroup = 'Product Base';

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->placeholder('Home / Residential Gym / Commercial Gym')
                ->required(),
                FileUpload::make('image')
                    ->image()
                    ->directory('images/segments') // specify the directory where you want to store the images
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name')->searchable(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductgenres::route('/'),
            'create' => Pages\CreateProductgenre::route('/create'),
            'edit' => Pages\EditProductgenre::route('/{record}/edit'),
        ];
    }
}
