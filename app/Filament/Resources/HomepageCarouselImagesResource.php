<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HomepageCarouselImagesResource\Pages;
use App\Filament\Resources\HomepageCarouselImagesResource\RelationManagers;
use App\Models\HomepageCarouselImages;
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

class HomepageCarouselImagesResource extends Resource
{
    protected static ?string $model = HomepageCarouselImages::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 10;
    protected static ?string $navigationGroup = 'Home Page Decore';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('caption'),

                FileUpload::make('image')
                    ->image()
                    ->directory('images/Carousel') // specify the directory where you want to store the images
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('caption')->searchable(),
                ImageColumn::make('image'),
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
            'index' => Pages\ListHomepageCarouselImages::route('/'),
            'create' => Pages\CreateHomepageCarouselImages::route('/create'),
            'edit' => Pages\EditHomepageCarouselImages::route('/{record}/edit'),
        ];
    }
}
