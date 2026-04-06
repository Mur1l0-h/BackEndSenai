<?php

namespace App\Filament\Resources\Roles;

use App\Filament\Resources\Roles\Pages\CreateRole;
use App\Filament\Resources\Roles\Pages\EditRole;
use App\Filament\Resources\Roles\Pages\ListRoles;
use App\Filament\Resources\Roles\Pages\ViewRole;
use App\Filament\Resources\Roles\Schemas\RoleForm;
use App\Filament\Resources\Roles\Schemas\RoleInfolist;
use App\Filament\Resources\Roles\Tables\RolesTable;
use Spatie\Permission\Models\Role;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;


class RoleResource extends Resource
{
    protected static ?string $model = Role::class;

    public static function canAccess(): bool
    {
        return auth()->user()?->can('acessar_role') ?? false;
    }

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static string|UnitEnum|null $navigationGroup = "Permissões";

    protected static ?string $recordTitleAttribute = 'Funções';
    
    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = "Cargo";
    protected static ?string $modelLabel = "Cargo";
    protected static ?string $pluralModelLabel = "Cargos";


    public static function form(Schema $schema): Schema
    {
       return $schema->schema([
            Select::make('permissions')
            ->label('Permissões de Acesso')
            ->multiple()
            ->relationship('permissions', 'name')
            ->preload()
            ->columnSpanFull(),

            TextInput::make('name')
            ->label('Nome')
            ->required()
            
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return RoleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('permissions.name')
            ->label('Nome da Regra')
            ->searchable()
            ->sortable(),
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
            'index' => ListRoles::route('/'),
            'create' => CreateRole::route('/create'),
            'view' => ViewRole::route('/{record}'),
            'edit' => EditRole::route('/{record}/edit'),
        ];
    }
}
