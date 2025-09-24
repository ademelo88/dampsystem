<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeadResource\Pages;
use App\Models\Lead;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables;

class LeadResource extends Resource
{
    protected static ?string $model = Lead::class;
    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('contact_id')->required(),
            Forms\Components\TextInput::make('property_id')->required(),
            Forms\Components\Select::make('status')->options([
                'new'=>'New','triaged'=>'Triaged','surveyed'=>'Surveyed','quoted'=>'Quoted','won'=>'Won','lost'=>'Lost'
            ])
        ]);
    }
    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('status'),
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
        ]);
    }
    public static function getPages(): array
    {
        return ['index' => Pages\ListLeads::route('/')];
    }
}
