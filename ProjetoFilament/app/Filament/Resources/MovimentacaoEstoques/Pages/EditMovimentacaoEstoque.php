<?php

namespace App\Filament\Resources\MovimentacaoEstoques\Pages;

use App\Filament\Resources\MovimentacaoEstoques\MovimentacaoEstoqueResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditMovimentacaoEstoque extends EditRecord
{
    protected static string $resource = MovimentacaoEstoqueResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make()->label('Ver movimentação'),
            DeleteAction::make()->label('Excluir movimentação'),
        ];
    }
}
