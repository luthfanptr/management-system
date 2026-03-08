<?php

namespace App\Filament\Admin\Resources\Tasks\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TasksTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                ->searchable()
                ->sortable(),
                TextColumn::make('description')
                ->limit(50),
                TextColumn::make('priority')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'low' => 'gray',
                    'medium' => 'warning',
                    'high' => 'danger',
                }),
                TextColumn::make('due_date')
                ->dateTime('d M Y h:i A')
                ->sortable(),
                SelectColumn::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                    ])
                    ->rules(['required']),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
