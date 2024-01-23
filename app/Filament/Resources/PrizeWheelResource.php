<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrizeWheelResource\Pages;
use App\Filament\Resources\PrizeWheelResource\RelationManagers;
use App\Models\PrizeWheel;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrizeWheelResource extends Resource
{
    protected static ?string $model = PrizeWheel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Giải thưởng';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin giải thưởng')
                    ->schema([
                        Select::make('event_id')
                            ->relationship('event', 'name')
                            ->label('Sự kiện')
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->autofocus()
                            ->label('Tên giải thưởng')
                            ->required()
                            ->maxValue(255)
                            ->placeholder('Tên giải thưởng'),
                        Forms\Components\TextInput::make('probability')
                            ->default(10)
                            ->numeric()
                            ->suffix('%')
                            ->label('Xác suất'),
                        Forms\Components\Textarea::make('description')
                            ->required(false)
                            ->columnSpan(2)
                            ->placeholder('Mô tả giải thưởng'),
                        Forms\Components\ColorPicker::make('fill_color')
                            ->default('#ffffff')
                            ->label('Màu nền'),
                        Forms\Components\ColorPicker::make('text_color')
                            ->default('#000000')
                            ->label('Màu chữ'),
                        Forms\Components\Toggle::make('is_win')
                            ->label('Có thể trúng'),

                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('event.name')
                    ->label('Sự kiện')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Tên giải thưởng')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Mô tả giải thưởng')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fill_color')
                    ->label('Màu nền')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('text_color')
                    ->label('Màu chữ')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('probability')
                    ->label('Xác suất')
                    ->formatStateUsing(fn (int $state) => $state . '%')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('is_win')
                    ->label('Có thể trúng')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\Action::make('Nhân bản')
                        ->icon('heroicon-o-clipboard-document')
                        ->action(fn (PrizeWheel $record) => $record->replicate()->save()),
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
            'index' => Pages\ListPrizeWheels::route('/'),
            'create' => Pages\CreatePrizeWheel::route('/create'),
            'edit' => Pages\EditPrizeWheel::route('/{record}/edit'),
        ];
    }
}
