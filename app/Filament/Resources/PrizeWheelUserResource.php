<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrizeWheelUserResource\Pages;
use App\Filament\Resources\PrizeWheelUserResource\RelationManagers;
use App\Models\PrizeWheelUser;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrizeWheelUserResource extends Resource
{
    protected static ?string $model = PrizeWheelUser::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Người dùng';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin người dùng')
                    ->schema([
                        Select::make('event_id')
                            ->relationship('event', 'name')
                            ->label('Sự kiện')
                            ->required(),

                        Forms\Components\TextInput::make('phone')
                            ->autofocus()
                            ->required()
                            ->maxValue(255)
                            ->placeholder('Số điện thoại'),
                        Forms\Components\TextInput::make('prize')
                            ->autofocus()
                            ->required()
                            ->maxValue(255)
                            ->placeholder('Giải thưởng'),
                        Forms\Components\TextInput::make('full_name')
                            ->required()
                            ->maxValue(255)
                            ->placeholder('Họ và tên'),
                        Forms\Components\TextInput::make('address')
                            ->required()
                            ->maxValue(255)
                            ->placeholder('Địa chỉ'),
                        Forms\Components\TextInput::make('facebook')
                            ->required()
                            ->maxValue(255)
                            ->placeholder('Facebook'),
                    ])
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
                Tables\Columns\TextColumn::make('phone')
                    ->label('Số điện thoại')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('prize')
                    ->label('Giải thưởng')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->label('Họ và tên')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address')
                    ->label('Địa chỉ')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('facebook')
                    ->label('Facebook')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->searchable()
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
            'index' => Pages\ListPrizeWheelUsers::route('/'),
            'create' => Pages\CreatePrizeWheelUser::route('/create'),
            'edit' => Pages\EditPrizeWheelUser::route('/{record}/edit'),
        ];
    }
}
