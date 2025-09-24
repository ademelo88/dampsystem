<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms;
use Filament\Tables;

use App\Models\LabourRate;

class LabourRateResource extends Resource
{
    protected static ?string $model = LabourRate::class;
    protected static ?string $navigationGroup = 'Price Book';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('role')->required(),
            Forms\Components\TextInput::make('hourly_rate')->numeric()->required(),
            Forms\Components\TextInput::make('overhead_pct')->numeric(),
            Forms\Components\Textarea::make('note')
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('role'),
            Tables\Columns\TextColumn::make('hourly_rate'),
            Tables\Columns\TextColumn::make('overhead_pct'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => LabourRateResource\Pages\ListLabourRates::route('/'),
            'create' => LabourRateResource\Pages\CreateLabourRate::route('/create'),
            'edit' => LabourRateResource\Pages\EditLabourRate::route('/{record}/edit'),
        ];
    }
}
