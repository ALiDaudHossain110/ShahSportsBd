<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Models\products;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\MultiSelect;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TextFilter; // if you need a text filter
use Filament\Tables\Columns\ImageColumn;
use App\Models\Brand;
use App\Models\productgenre;
use App\Models\producttype;
use App\Models\subcategories;
use App\Models\productSegment;

class ProductsResource extends Resource
{
    protected static ?string $model = products::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationGroup = 'Product Base';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('model_no')->required(),
                TextInput::make('stock_quantity')->required()->numeric(),
                TextInput::make('cost_price')->required()->numeric(),
                TextInput::make('sell_price')->required()->numeric(),
                TextInput::make('lowest_selling_price')->required()->numeric(),
                TextInput::make('discount_percentage')->numeric(),
                MarkdownEditor::make('about_the_product')->required()->columnSpan(3),
                Select::make('foreignkey_brand_iD')
                ->options(Brand::all()->pluck('name', 'id'))
                ->required(),
                MultiSelect::make('foreignkey_product_genre_iD')
                ->options(productgenre::all()->pluck('name', 'id'))
                ->required(),
                MultiSelect::make('foreignkey_product_type_iD')
                ->options(producttype::all()->pluck('name', 'id'))
                ->required(),
                MultiSelect::make('foreignkey_subcategory_iD')
                ->options(subcategories::all()->pluck('name', 'id'))
                ->required(),
                MultiSelect::make('foreignkey_productsegment_iD')
                ->options(productSegment::all()->pluck('name', 'id'))
                ->required(),
                FileUpload::make('image1')
                    ->image()
                    ->directory('products/images') // specify the directory where you want to store the images
                    ->required(),

                FileUpload::make('image2')
                ->image()
                ->directory('products/images'),

                FileUpload::make('image3')
                ->image()
                ->directory('products/images'),

                FileUpload::make('image4')
                ->image()
                ->directory('products/images'),
                FileUpload::make('image5')
                ->image()
                ->directory('products/images'),
                FileUpload::make('image6')
                ->image()
                ->directory('products/images'),
                FileUpload::make('image7')
                ->image()
                ->directory('products/images'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image1'),
                TextColumn::make('name')->searchable(),
                TextColumn::make('model_no')->searchable(),
                TextColumn::make('stock_quantity'),
                TextColumn::make('cost_price'),
                TextColumn::make('sell_price'),
                TextColumn::make('lowest_selling_price'),
                // TextColumn::make('foreignkey_brand_iD'),
                TextColumn::make('about_the_product')
                ->extraAttributes(['style' => 'width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;']),
                TextColumn::make('foreignkey_brand_iD')
                ->formatStateUsing(function ($state) {
                    if (is_array($state)) {
                        return implode(', ', Brand::whereIn('id', $state)->pluck('name')->toArray());
                    }
                    return Brand::find($state)?->name ?? 'N/A';    })->searchable(),

                
                TextColumn::make('foreignkey_product_genre_iD')
                ->formatStateUsing(function ($state) {
                    if (is_array($state)) {
                        return implode(', ', productgenre::whereIn('id', $state)->pluck('name')->toArray());
                    }
                    return productgenre::find($state)?->name ?? 'N/A';    })->searchable(),

            
                TextColumn::make('foreignkey_product_type_iD')
                ->formatStateUsing(function ($state) {
                    if (is_array($state)) {
                        return implode(', ', producttype::whereIn('id', $state)->pluck('name')->toArray());
                    }
                    return producttype::find($state)?->name ?? 'N/A';    })->searchable(),

                
                TextColumn::make('foreignkey_subcategory_iD')
                ->formatStateUsing(function ($state) {
                    if (is_array($state)) {
                        return implode(', ', subcategories::whereIn('id', $state)->pluck('name')->toArray());
                    }
                    return subcategories::find($state)?->name ?? 'N/A';
                })->searchable(),
                TextColumn::make('foreignkey_productsegment_iD')
                ->formatStateUsing(function ($state) {
                    if (is_array($state)) {
                        return implode(', ', productSegment::whereIn('id', $state)->pluck('name')->toArray());
                    }
                    return productSegment::find($state)?->name ?? 'N/A';
                })->searchable(),

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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
