<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms;
use Filament\Tables;

use App\Models\Material;

class MaterialResource extends Resource
{
    protected static ?string $model = Material::class;
    protected static ?string $navigationGroup = 'Price Book';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('sku')->required(),
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('unit')->default('each'),
            Forms\Components\TextInput::make('cost')->numeric(),
            Forms\Components\TextInput::make('category'),
            Forms\Components\TextInput::make('vat_rate')->numeric(),
            Forms\Components\KeyValue::make('meta'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('sku')->searchable(),
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('cost'),
            Tables\Columns\TextColumn::make('category'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => MaterialResource\Pages\ListMaterials::route('/'),
            'create' => MaterialResource\Pages\CreateMaterial::route('/create'),
            'edit' => MaterialResource\Pages\EditMaterial::route('/{record}/edit'),
        ];
    }
}
