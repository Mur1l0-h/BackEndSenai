<?php

namespace App\Filament\Resources\Fornecedores;

use App\Filament\Resources\Fornecedores\Pages\CreateFornecedores;
use App\Filament\Resources\Fornecedores\Pages\EditFornecedores;
use App\Filament\Resources\Fornecedores\Pages\ListFornecedores;
use App\Filament\Resources\Fornecedores\Pages\ViewFornecedores;
use App\Filament\Resources\Fornecedores\Schemas\FornecedoresForm;
use App\Filament\Resources\Fornecedores\Schemas\FornecedoresInfolist;
use App\Filament\Resources\Fornecedores\Tables\FornecedoresTable;
use App\Models\Fornecedores;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;

class FornecedoresResource extends Resource
{
    protected static ?string $model = Fornecedores::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Fornecedores';

    public static function form(Schema $schema): Schema
    {
        // FornecedoresForm::configure($schema);
        return $schema->schema([
            TextInput::make('nome')->required()->label('Nome do fornecedor'),
            TextInput::make('endereco')->required()->label('Endereço'),
            TextInput::make('telefone')->label('Telefone'),
            
        ]);

    }

    public static function infolist(Schema $schema): Schema
    {
        return FornecedoresInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('nome')->searchable(),
            TextColumn::make('endereco')->searchable(),
            TextColumn::make('telefone'),
            
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
            'index' => ListFornecedores::route('/'),
            'create' => CreateFornecedores::route('/create'),
            'view' => ViewFornecedores::route('/{record}'),
            'edit' => EditFornecedores::route('/{record}/edit'),
        ];
    }
}
