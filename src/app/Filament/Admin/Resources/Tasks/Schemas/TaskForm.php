<?php

namespace App\Filament\Admin\Resources\Tasks\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class TaskForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                ->required()
                ->maxLength(255),
                Textarea::make('description')
                ->autosize(),
                Select::make('priority')
                ->options([
                    'low' => 'Low',
                    'medium' => 'Medium',
                    'high' => 'High',
                ]),
                DateTimePicker::make('due_date')
                ->seconds(false),
                ToggleButtons::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                    ])
                    ->icons([
                        'pending' => Heroicon::OutlinedClock,
                        'in_progress' => Heroicon::OutlinedPencil,
                        'completed' => Heroicon::OutlinedCheckCircle,
                    ])
            ]);
    }
}
