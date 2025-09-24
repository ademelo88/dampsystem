<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms;
use Filament\Tables;

use App\Models\Assembly;

class AssemblyResource extends Resource
{
    protected static ?string $model = Assembly::class;
    protected static ?string $navigationGroup = 'Price Book';

    public static function form(Form $form): Form { return $form->schema([
        Forms\Components\TextInput::make('code')->required(),
        Forms\Components\TextInput::make('name')->required(),
        Forms\Components\Textarea::make('description'),
        Forms\Components\KeyValue::make('bom')->label('Bill of Materials'),
        Forms\Components\TextInput::make('labour_hours')->numeric(),
        Forms\Components\KeyValue::make('tags'),
    ]); }

    public static function table(Table $table): Table { return $table->columns([
        Tables\Columns\TextColumn::make('id'),
        Tables\Columns\TextColumn::make('code'),
        Tables\Columns\TextColumn::make('name'),
        Tables\Columns\TextColumn::make('labour_hours'),
    ]); }

    public static function getPages(): array { return [
        'index' => AssemblyResource\Pages\ListAssemblies::route('/'),
        'create' => AssemblyResource\Pages\CreateAssembly::route('/create'),
        'edit' => AssemblyResource\Pages\EditAssembly::route('/{record}/edit'),
    ]; }
}
