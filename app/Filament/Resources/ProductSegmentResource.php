<?php

namespace App\Filament\Resources;
 
use App\Filament\Resources\ProductSegmentResource\Pages;
use App\Filament\Resources\ProductSegmentResource\RelationManagers;
use App\Models\ProductSegment;
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

class ProductSegmentResource extends Resource
{
    protected static ?string $model = ProductSegment::class;

    protected static ?string $navigationIcon = 'heroicon-o-puzzle-piece';
    protected static ?int $navigationSort = 9;
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
                ->placeholder('Trademill/ Elapticle/Dumbell / Bench /...')
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
                ImageColumn::make('image')
                ->disk('public')
                ->url(fn ($record) => asset('storage/' . ltrim($record->image, '/')))
                ->height(50) // Or any preferred size
                ->width(50),
                            
                TextColumn::make('name')->searchable(),
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
            'index' => Pages\ListProductSegments::route('/'),
            'create' => Pages\CreateProductSegment::route('/create'),
            'edit' => Pages\EditProductSegment::route('/{record}/edit'),
        ];
    }
}
