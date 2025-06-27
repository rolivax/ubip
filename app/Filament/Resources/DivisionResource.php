<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DivisionResource\Pages;
use App\Filament\Resources\DivisionResource\RelationManagers;
use App\Models\Division;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DivisionResource extends Resource
{
    protected static ?string $model = Division::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'División';
    protected static ?string $pluralModelLabel = 'Divisiones';
    protected static ?string $navigationGroup = 'Administración';
    protected static ?int $navigationSort = 5;

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
                    Forms\Components\TextInput::make('nombre_division')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(100),
                    Forms\Components\TextInput::make('codigo')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(3),

                    Forms\Components\Toggle::make('activo')
                        ->required()
                        ->default(true),

                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('id')
                    ->sortable(),
                Tables\Columns\TextColumn::make('nombre_division')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('rubro.nombre_rubro')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->sortable()
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
            'index' => Pages\ListDivisions::route('/'),
            'create' => Pages\CreateDivision::route('/create'),
            'view' => Pages\ViewDivision::route('/{record}'),
            'edit' => Pages\EditDivision::route('/{record}/edit'),
        ];
    }
}
