<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status do Pedido</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #fff; border-radius: 8px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #333; font-size: 24px; }
        .status { display: inline-block; padding: 8px 16px; border-radius: 20px; font-weight: bold; }
        .status-Pendente { background: #fef3c7; color: #92400e; }
        .status-Em { background: #dbeafe; color: #1e40af; }
        .status-Finalizado { background: #d1fae5; color: #065f46; }
        .info { margin: 20px 0; }
        .info p { margin: 8px 0; }
        .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #eee; font-size: 12px; color: #888; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Olá, {{ $pedido->cliente->nome }}!</h1>
        <p>O status do seu pedido <strong>#{{ $pedido->id }}</strong> foi atualizado.</p>

        <div class="info">
            <p><strong>Status atual:</strong></p>
            <span class="status status-{{ str_replace(' ', '', $pedido->status) }}">{{ $pedido->status }}</span>

            <p style="margin-top: 16px;"><strong>Valor total:</strong> R$ {{ number_format($pedido->valor_total, 2, ',', '.') }}</p>
        </div>

        <h3>Itens do Pedido</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f9f9f9;">
                    <th style="padding: 8px; text-align: left;">Produto</th>
                    <th style="padding: 8px; text-align: center;">Qtd</th>
                    <th style="padding: 8px; text-align: right;">Preço</th>
                    <th style="padding: 8px; text-align: right;">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedido->itens as $item)
                <tr>
                    <td style="padding: 8px;">{{ $item->produto->nome }}</td>
                    <td style="padding: 8px; text-align: center;">{{ $item->quantidade }}</td>
                    <td style="padding: 8px; text-align: right;">R$ {{ number_format($item->preco_unitario, 2, ',', '.') }}</td>
                    <td style="padding: 8px; text-align: right;">R$ {{ number_format($item->quantidade * $item->preco_unitario, 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <p>Este é um e-mail automático. Por favor, não responda.</p>
            <p>&copy; {{ date('Y') }} Confecção. Todos os direitos reservados.</p>
        </div>
    </div>
</body>
</html>