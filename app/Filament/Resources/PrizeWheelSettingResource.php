<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrizeWheelSettingResource\Pages;
use App\Filament\Resources\PrizeWheelSettingResource\RelationManagers;
use App\Models\PrizeWheelSetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PrizeWheelSettingResource extends Resource
{
    protected static ?string $model = PrizeWheelSetting::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $label = 'Cài đặt vòng quay';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Thông tin cài đặt')
                    ->schema([
                        Forms\Components\FileUpload::make('background_pc')
                            ->label('Hình nền cho máy tính')
                            ->required(),
                        Forms\Components\FileUpload::make('background_mobile')
                            ->label('Hình nền cho điện thoại')
                            ->required(),
                        Forms\Components\FileUpload::make('background_wheel')
                            ->label('Hình nền cho vòng quay')
                            ->required(),
                        Forms\Components\FileUpload::make('background_spin')
                            ->label('Hình nền cho nút quay')
                            ->required(),
                        Forms\Components\RichEditor::make('rule_title')
                            ->label('Nội dung quy định')
                            ->required(),
                        Forms\Components\Select::make('event_id')
                            ->relationship('event', 'name')
                            ->label('Sự kiện')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('background_pc')
                    ->label('Hình nền cho máy tính')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('background_mobile')
                    ->label('Hình nền cho điện thoại')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('background_wheel')
                    ->label('Hình nền cho vòng quay')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('background_spin')
                    ->label('Hình nền cho nút quay')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('event.name')
                    ->label('Sự kiện')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ngày tạo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Ngày cập nhật')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPrizeWheelSettings::route('/'),
            'create' => Pages\CreatePrizeWheelSetting::route('/create'),
            'edit' => Pages\EditPrizeWheelSetting::route('/{record}/edit'),
        ];
    }
}
