<?php

namespace App\Filament\Resources\EmailLogs;

use App\Filament\Resources\EmailLogs\Pages\ListEmailLogs;
use App\Filament\Resources\EmailLogs\Pages\ViewEmailLog;
use App\Models\EmailLog;
use BackedEnum;
use UnitEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Infolists\Components\TextEntry;

class EmailLogResource extends Resource
{
    protected static ?string $model = EmailLog::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-envelope';

    protected static string|UnitEnum|null $navigationGroup = 'Vendas';

    protected static ?int $navigationSort = 5;

    protected static ?string $recordTitleAttribute = 'assunto';

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('id')
                ->label('#')
                ->sortable(),

            TextColumn::make('pedido.id')
                ->label('Pedido #')
                ->sortable(),

            TextColumn::make('cliente_nome')
                ->label('Cliente')
                ->searchable()
                ->sortable(),

            TextColumn::make('cliente_email')
                ->label('E-mail')
                ->searchable(),

            TextColumn::make('status_anterior')
                ->label('Status Anterior')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Pendente' => 'warning',
                    'Em produção' => 'info',
                    'Finalizado' => 'success',
                    default => 'gray',
                }),

            TextColumn::make('status_novo')
                ->label('Status Novo')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Pendente' => 'warning',
                    'Em produção' => 'info',
                    'Finalizado' => 'success',
                    default => 'gray',
                }),

            TextColumn::make('assunto')
                ->label('Assunto')
                ->limit(40),

            TextColumn::make('enviado_em')
                ->label('Enviado em')
                ->dateTime('d/m/Y H:i')
                ->sortable(),

            TextColumn::make('created_at')
                ->label('Registrado em')
                ->dateTime('d/m/Y H:i')
                ->sortable(),
        ])
        ->defaultSort('created_at', 'desc')
        ->filters([
            //
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('pedido.id')
                    ->label('Pedido #'),

                TextEntry::make('cliente_nome')
                    ->label('Cliente'),

                TextEntry::make('cliente_email')
                    ->label('E-mail do Cliente'),

                TextEntry::make('status_anterior')
                    ->label('Status Anterior')
                    ->badge(),

                TextEntry::make('status_novo')
                    ->label('Status Novo')
                    ->badge(),

                TextEntry::make('assunto')
                    ->label('Assunto'),

                TextEntry::make('mensagem')
                    ->label('Mensagem'),

                TextEntry::make('enviado_em')
                    ->label('Enviado em')
                    ->dateTime('d/m/Y H:i'),

                TextEntry::make('created_at')
                    ->label('Registrado em')
                    ->dateTime('d/m/Y H:i'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEmailLogs::route('/'),
            'view' => ViewEmailLog::route('/{record}'),
        ];
    }
}