<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClaseResource\Pages;
use App\Filament\Resources\ClaseResource\RelationManagers;
use App\Models\Clase;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClaseResource extends Resource
{
    protected static ?string $model = Clase::class;

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    protected static ?string $modelLabel = 'Clase';
    protected static ?string $pluralModelLabel = 'Clases';
    protected static ?string $navigationGroup = 'Administración';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()->schema([
                    Select::make('rubro_id')
                        ->label('Rubro')
                        ->relationship('rubro', 'nombre_rubro')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->placeholder('Seleccione un rubro'),
                    Select::make('division_id')
                        ->label('División')
                        ->relationship('division', 'nombre_division')
                        ->required()
                        ->searchable()
                        ->preload()
                        ->placeholder('Seleccione una división'),
                    Forms\Components\TextInput::make('nombre_clase')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(100),
                    Forms\Components\TextInput::make('codigo')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(10),

                    Forms\Components\Toggle::make('activo')
                        ->default(true)
                        ->required(),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('rubro_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('division_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre_clase')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->searchable(),

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
            'index' => Pages\ListClases::route('/'),
            'create' => Pages\CreateClase::route('/create'),
            'view' => Pages\ViewClase::route('/{record}'),
            'edit' => Pages\EditClase::route('/{record}/edit'),
        ];
    }
}
