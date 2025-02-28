<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurClientsResource\Pages;
use App\Filament\Resources\OurClientsResource\RelationManagers;
use App\Models\OurClients;
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

class OurClientsResource extends Resource
{
    protected static ?string $model = OurClients::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?int $navigationSort = 11;
    protected static ?string $navigationGroup = 'Home Page Decore';
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('client_name')->required(),
                FileUpload::make('client_logo')
                ->image()
                ->directory('products/images'),
                TextInput::make('email')->email()->required(),
                TextInput::make('contact_number')->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('client_logo'),
                TextColumn::make('client_name')->searchable(),
                TextColumn::make('email')->searchable(),
                TextColumn::make('contact_number')->searchable(),
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
            'index' => Pages\ListOurClients::route('/'),
            'create' => Pages\CreateOurClients::route('/create'),
            'edit' => Pages\EditOurClients::route('/{record}/edit'),
        ];
    }
}
