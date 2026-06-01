<?php

namespace App\Filament\Resources\Pedidos\Pages;

use App\Filament\Resources\Pedidos\PedidoResource;
use App\Mail\PedidoStatusChanged;
use App\Models\EmailLog;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;

class EditPedido extends EditRecord
{
    protected static string $resource = PedidoResource::class;

    protected ?string $statusAnterior = null;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    /**
     * Captura o status ANTIGO antes do formulário salvar
     */
    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->statusAnterior = $this->record->status;

        return $data;
    }

    protected function afterSave() : void{
        $pedido = $this->record;

        // Recalcula o valor total
        $total = $pedido->itens->sum(function ($item){
            return $item->quantidade * $item->preco_unitario;
        });
        $pedido->update(['valor_total' => $total]);

        // Pega o status NOVO que foi salvo no banco
        $statusNovo = $pedido->status;

        // Se o status mudou, envia e-mail
        if ($this->statusAnterior && $this->statusAnterior !== $statusNovo) {
            $cliente = $pedido->cliente;
            if ($cliente && $cliente->email) {
                // Envia o e-mail
                Mail::to($cliente->email, $cliente->nome)
                    ->send(new PedidoStatusChanged($pedido));

                // Registra o log do e-mail enviado
                EmailLog::create([
                    'pedido_id'       => $pedido->id,
                    'cliente_email'   => $cliente->email,
                    'cliente_nome'    => $cliente->nome,
                    'status_anterior' => $this->statusAnterior,
                    'status_novo'     => $statusNovo,
                    'assunto'         => "Status do Pedido #{$pedido->id} atualizado para {$statusNovo}",
                    'mensagem'        => "O status do pedido #{$pedido->id} foi alterado de '{$this->statusAnterior}' para '{$statusNovo}'.",
                    'enviado_em'      => now(),
                ]);
            }
        }
    }
}
