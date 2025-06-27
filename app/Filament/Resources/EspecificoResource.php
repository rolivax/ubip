<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EspecificoResource\Pages;
use App\Filament\Resources\EspecificoResource\RelationManagers;
use App\Models\Especifico;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class EspecificoResource extends Resource
{
    protected static ?string $model = Especifico::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Específico';
    protected static ?string $pluralModelLabel = 'Específicos';
    protected static ?string $navigationGroup = 'Administración';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()->schema([
                    Forms\Components\TextInput::make('nombre_especifico')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(100),
                    Forms\Components\TextInput::make('codigo')
                        ->required()
                        ->numeric()
                        ->unique(ignoreRecord: true)
                        ->maxLength(10),
                    Forms\Components\TextInput::make('cuenta_contable')
                        ->maxLength(25),

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
                Tables\Columns\TextColumn::make('nombre_especifico')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cuenta_contable')
                    ->searchable(),

                Tables\Columns\IconColumn::make('activo')
                    ->boolean(),
            ])
            ->defaultSort('nombre_especifico', 'asc')
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
            'index' => Pages\ListEspecificos::route('/'),
            'create' => Pages\CreateEspecifico::route('/create'),
            'view' => Pages\ViewEspecifico::route('/{record}'),
            'edit' => Pages\EditEspecifico::route('/{record}/edit'),
        ];
    }
}
