<?php

namespace App\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Forms;
use Filament\Tables;

use App\Models\Job;

class JobResource extends Resource
{
    protected static ?string $model = Job::class;
    protected static ?string $navigationGroup = 'Operations';

    public static function form(Form $form): Form { return $form->schema([
        Forms\Components\TextInput::make('quote_id')->required()->numeric(),
        Forms\Components\DateTimePicker::make('schedule_start'),
        Forms\Components\DateTimePicker::make('schedule_end'),
        Forms\Components\Select::make('status')->options(['planned'=>'Planned','in_progress'=>'In Progress','paused'=>'Paused','completed'=>'Completed']),
        Forms\Components\Textarea::make('crew_notes'),
    ]); }

    public static function table(Table $table): Table { return $table->columns([
        Tables\Columns\TextColumn::make('id'),
        Tables\Columns\TextColumn::make('quote_id'),
        Tables\Columns\TextColumn::make('schedule_start')->dateTime(),
        Tables\Columns\TextColumn::make('status'),
    ]); }

    public static function getPages(): array { return [
        'index' => JobResource\Pages\ListJobs::route('/'),
        'create' => JobResource\Pages\CreateJob::route('/create'),
        'edit' => JobResource\Pages\EditJob::route('/{record}/edit'),
    ]; }
}
