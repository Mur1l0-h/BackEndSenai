<?php

namespace App\Livewire;

use Filament\Widgets\ChartWidget;

class MyWidget2 extends ChartWidget
{
    protected ?string $heading = 'My Widget2';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'radar';
    }
}
