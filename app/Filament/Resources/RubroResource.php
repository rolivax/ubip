<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RubroResource\Pages;
use App\Filament\Resources\RubroResource\RelationManagers;
use App\Models\Rubro;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RubroResource extends Resource
{
    protected static ?string $model = Rubro::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Rubro';
    protected static ?string $pluralModelLabel = 'Rubros';
    protected static ?string $navigationGroup = 'Administración';
    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()->schema([
                    Select::make('especifico_id')
                        ->label('Específico')
                        ->required()
                        ->relationship('especifico', 'nombre_especifico')
                        ->searchable()
                        ->preload()
                        ->placeholder('Seleccione un específico'),
                    Forms\Components\TextInput::make('nombre_rubro')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(100),
                    Forms\Components\TextInput::make('codigo')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(5),

                    Forms\Components\Toggle::make('activo')
                        ->required()
                        ->default(true),
                ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('id')
                    ->sortable(),

                Tables\Columns\TextColumn::make('nombre_rubro')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('especifico.nombre_especifico')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\IconColumn::make('activo')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListRubros::route('/'),
            'create' => Pages\CreateRubro::route('/create'),
            'view' => Pages\ViewRubro::route('/{record}'),
            'edit' => Pages\EditRubro::route('/{record}/edit'),
        ];
    }
}
