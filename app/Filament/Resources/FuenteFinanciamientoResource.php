<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FuenteFinanciamientoResource\Pages;
use App\Filament\Resources\FuenteFinanciamientoResource\RelationManagers;
use App\Models\FuenteFinanciamiento;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FuenteFinanciamientoResource extends Resource
{
    protected static ?string $model = FuenteFinanciamiento::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $modelLabel = 'Fuente de Financiamiento';
    protected static ?string $pluralModelLabel = 'Fuentes de financiamiento';
    protected static ?string $navigationGroup = 'Administración';
    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()->schema([
                    Forms\Components\TextInput::make('nombre_fuente_financiamiento')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(100),
                    Forms\Components\TextInput::make('codigo')
                        ->required()
                        ->string()
                        ->length(1)
                        ->unique(ignoreRecord: true)
                        ->maxLength(1),

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
                Tables\Columns\TextColumn::make('nombre_fuente_financiamiento')
                    ->sortable()
                    ->searchable(),
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
            'index' => Pages\ListFuenteFinanciamientos::route('/'),
            'create' => Pages\CreateFuenteFinanciamiento::route('/create'),
            'view' => Pages\ViewFuenteFinanciamiento::route('/{record}'),
            'edit' => Pages\EditFuenteFinanciamiento::route('/{record}/edit'),
        ];
    }
}
