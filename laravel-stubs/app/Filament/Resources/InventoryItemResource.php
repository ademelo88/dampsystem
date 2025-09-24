<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms;
use Filament\Tables;

use App\Models\InventoryItem;

class InventoryItemResource extends Resource
{
    protected static ?string $model = InventoryItem::class;
    protected static ?string $navigationGroup = 'Procurement';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('material_id')->required()->numeric(),
            Forms\Components\TextInput::make('location'),
            Forms\Components\TextInput::make('qty_on_hand')->numeric(),
            Forms\Components\TextInput::make('min_qty')->numeric(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('material_id'),
            Tables\Columns\TextColumn::make('location'),
            Tables\Columns\TextColumn::make('qty_on_hand'),
            Tables\Columns\TextColumn::make('min_qty'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => InventoryItemResource\Pages\ListInventoryItems::route('/'),
            'create' => InventoryItemResource\Pages\CreateInventoryItem::route('/create'),
            'edit' => InventoryItemResource\Pages\EditInventoryItem::route('/{record}/edit'),
        ];
    }
}
