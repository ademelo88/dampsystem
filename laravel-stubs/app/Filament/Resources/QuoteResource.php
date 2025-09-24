<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuoteResource\Pages;
use App\Models\Quote;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables;

class QuoteResource extends Resource
{
    protected static ?string $model = Quote::class;
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('lead_id')->required(),
            Forms\Components\Select::make('status')->options([
                'draft'=>'Draft','sent'=>'Sent','accepted'=>'Accepted','rejected'=>'Rejected'
            ])
        ]);
    }
    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('lead_id'),
            Tables\Columns\BadgeColumn::make('status'),
        ]);
    }
    public static function getPages(): array
    {
        return ['index' => Pages\ListQuotes::route('/')];
    }
}
