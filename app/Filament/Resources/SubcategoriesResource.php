<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubcategoriesResource\Pages;
use App\Filament\Resources\SubcategoriesResource\RelationManagers;
use App\Models\Subcategories;
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
use App\Models\productSegment;
use Filament\Forms\Components\MultiSelect;

class SubcategoriesResource extends Resource
{
    protected static ?string $model = Subcategories::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 7;
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
                ->placeholder('Cardio/ Strength/ Swimming? Cricket/...')
                ->required(),
                FileUpload::make('image')
                    ->image()
                    ->directory('images/segments') // specify the directory where you want to store the images
                    ->required(),
                MultiSelect::make('foreignkey_productsegment_iD')
                ->options(productSegment::all()->pluck('name', 'id')),
    
    
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
            'index' => Pages\ListSubcategories::route('/'),
            'create' => Pages\CreateSubcategories::route('/create'),
            'edit' => Pages\EditSubcategories::route('/{record}/edit'),
        ];
    }
}
