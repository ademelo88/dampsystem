<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms;
use Filament\Tables;

use App\Models\PurchaseOrder;

class PurchaseOrderResource extends Resource
{
    protected static ?string $model = PurchaseOrder::class;
    protected static ?string $navigationGroup = 'Procurement';

    public static function form(Form $form): Form { return $form->schema([
        Forms\Components\TextInput::make('supplier_id')->required()->numeric(),
        Forms\Components\TextInput::make('job_id')->numeric(),
        Forms\Components\Select::make('status')->options(['draft'=>'Draft','sent'=>'Sent','received'=>'Received','billed'=>'Billed']),
        Forms\Components\KeyValue::make('items'),
        Forms\Components\TextInput::make('total')->numeric(),
    ]); }

    public static function table(Table $table): Table { return $table->columns([
        Tables\Columns\TextColumn::make('id'),
        Tables\Columns\TextColumn::make('supplier_id'),
        Tables\Columns\TextColumn::make('job_id'),
        Tables\Columns\BadgeColumn::make('status'),
        Tables\Columns\TextColumn::make('total'),
    ]); }

    public static function getPages(): array { return [
        'index' => PurchaseOrderResource\Pages\ListPurchaseOrders::route('/'),
        'create' => PurchaseOrderResource\Pages\CreatePurchaseOrder::route('/create'),
        'edit' => PurchaseOrderResource\Pages\EditPurchaseOrder::route('/{record}/edit'),
    ]; }
}
