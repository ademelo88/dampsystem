<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms;
use Filament\Tables;

use App\Models\Supplier;

class SupplierResource extends Resource
{
    protected static ?string $model = Supplier::class;
    protected static ?string $navigationGroup = 'Procurement';

    public static function form(Form $form): Form { return $form->schema([
        Forms\Components\TextInput::make('name')->required(),
        Forms\Components\KeyValue::make('contact'),
        Forms\Components\KeyValue::make('terms'),
    ]); }

    public static function table(Table $table): Table { return $table->columns([
        Tables\Columns\TextColumn::make('id'),
        Tables\Columns\TextColumn::make('name')->searchable(),
        Tables\Columns\TextColumn::make('created_at')->dateTime(),
    ]); }

    public static function getPages(): array { return [
        'index' => SupplierResource\Pages\ListSuppliers::route('/'),
        'create' => SupplierResource\Pages\CreateSupplier::route('/create'),
        'edit' => SupplierResource\Pages\EditSupplier::route('/{record}/edit'),
    ]; }
}
