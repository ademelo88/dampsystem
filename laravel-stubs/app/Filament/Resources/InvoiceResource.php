<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms;
use Filament\Tables;

use App\Models\Invoice;

class InvoiceResource extends Resource
{
    protected static ?string $model = Invoice::class;
    protected static ?string $navigationGroup = 'Accounting';

    public static function form(Form $form): Form { return $form->schema([
        Forms\Components\TextInput::make('job_id')->required()->numeric(),
        Forms\Components\TextInput::make('type')->required(),
        Forms\Components\KeyValue::make('lines'),
        Forms\Components\TextInput::make('total')->numeric(),
        Forms\Components\TextInput::make('vat_rate')->numeric(),
        Forms\Components\DateTimePicker::make('due_at'),
        Forms\Components\Select::make('status')->options(['pending'=>'Pending','sent'=>'Sent','paid'=>'Paid','overdue'=>'Overdue'])
    ]); }

    public static function table(Table $table): Table { return $table->columns([
        Tables\Columns\TextColumn::make('id'),
        Tables\Columns\TextColumn::make('job_id'),
        Tables\Columns\TextColumn::make('type'),
        Tables\Columns\TextColumn::make('total'),
        Tables\Columns\BadgeColumn::make('status'),
    ]); }

    public static function getPages(): array { return [
        'index' => InvoiceResource\Pages\ListInvoices::route('/'),
        'create' => InvoiceResource\Pages\CreateInvoice::route('/create'),
        'edit' => InvoiceResource\Pages\EditInvoice::route('/{record}/edit'),
    ]; }
}
