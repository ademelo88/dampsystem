<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms;
use Filament\Tables;

use App\Models\Payment;

class PaymentResource extends Resource
{
    protected static ?string $model = Payment::class;
    protected static ?string $navigationGroup = 'Accounting';

    public static function form(Form $form): Form { return $form->schema([
        Forms\Components\TextInput::make('invoice_id')->required()->numeric(),
        Forms\Components\TextInput::make('method')->required(),
        Forms\Components\TextInput::make('amount')->numeric(),
        Forms\Components\TextInput::make('reference'),
        Forms\Components\DateTimePicker::make('received_at'),
    ]); }

    public static function table(Table $table): Table { return $table->columns([
        Tables\Columns\TextColumn::make('id'),
        Tables\Columns\TextColumn::make('invoice_id'),
        Tables\Columns\TextColumn::make('method'),
        Tables\Columns\TextColumn::make('amount'),
        Tables\Columns\TextColumn::make('received_at')->dateTime(),
    ]); }

    public static function getPages(): array { return [
        'index' => PaymentResource\Pages\ListPayments::route('/'),
        'create' => PaymentResource\Pages\CreatePayment::route('/create'),
        'edit' => PaymentResource\Pages\EditPayment::route('/{record}/edit'),
    ]; }
}
