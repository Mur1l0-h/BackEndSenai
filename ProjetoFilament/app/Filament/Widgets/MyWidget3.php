<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class MyWidget3 extends ChartWidget
{
    protected ?string $heading = 'Título legal';
    protected int | string | array $columnSpan = 30;

    protected function getData(): array
    {
        return [
        
        'datasets' => [
            [
                'label' => 'Valores',
                'data' => [45,6,59,59,495,752,72,95,657,20,25,78],
                'backgroundColor' => '#125639',
                'borderColor' => '#258963'
            ],
            ],
            'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
