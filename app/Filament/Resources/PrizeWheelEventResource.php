<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrizeWheelEventResource\Pages;
use App\Filament\Resources\PrizeWheelEventResource\RelationManagers;
use App\Models\PrizeWheelEvent;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrizeWheelEventResource extends Resource
{
    protected static ?string $model = PrizeWheelEvent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Sự kiện quay thưởng';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Thông tin sự kiện')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->autofocus()
                            ->required()
                            ->maxValue(255)
                            ->unique(PrizeWheelEvent::class, 'name')
                            ->label('Tên sự kiện'),
                        Forms\Components\Textarea::make('description')
                            ->label('Mô tả'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    ViewAction::make()
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrizeWheelEvents::route('/'),
            'create' => Pages\CreatePrizeWheelEvent::route('/create'),
            'edit' => Pages\EditPrizeWheelEvent::route('/{record}/edit'),
        ];
    }
}
