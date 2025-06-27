<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InstitucionResource\Pages;
use App\Filament\Resources\InstitucionResource\RelationManagers;
use App\Models\Institucion;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InstitucionResource extends Resource
{
    protected static ?string $model = Institucion::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-library';

    protected static ?string $modelLabel = 'Institución';
    protected static ?string $pluralModelLabel = 'Instituciones';
    protected static ?string $navigationGroup = 'Administración';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()->schema([

                    Forms\Components\TextInput::make('nombre_institucion')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(100),
                    Forms\Components\TextInput::make('codigo')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->numeric()
                        ->maxLength(2),
                    Forms\Components\TextInput::make('siglas')
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->maxLength(15),
                    Forms\Components\TextInput::make('telefono1')
                        ->tel()
                        ->required()
                        ->maxLength(15),
                    Forms\Components\TextInput::make('telefono2')
                        ->tel()
                        ->maxLength(15),
                    Forms\Components\TextInput::make('email')
                        ->email()
                        ->maxLength(100),

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
                Tables\Columns\TextColumn::make('nombre_institucion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('codigo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('siglas')
                    ->searchable(),
                Tables\Columns\IconColumn::make('activo')
                    ->boolean()
                    ->label('Activo')
                    ->searchable(),

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
            'index' => Pages\ListInstitucions::route('/'),
            'create' => Pages\CreateInstitucion::route('/create'),
            'view' => Pages\ViewInstitucion::route('/{record}'),
            'edit' => Pages\EditInstitucion::route('/{record}/edit'),
        ];
    }
}
