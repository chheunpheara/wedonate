<?php

namespace App\Livewire\Backend;

use Livewire\Component;

class Sse extends Component
{
    public function render()
    {
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: Keep-alive');

        $data = [
            'name' => 'Smith',
            'age' => 35
        ];
        echo 'data: ' . json_encode($data) . "\n\n";
        flush();
        die();
    }
}
