<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CounterPlus extends Component
{
    public $data = 1;

    public function increment(){
        if ($this->data !== 5) {
            $this->data++;
        }
    }

    public function decrement(){
        if ($this->data > 1) {
            $this->data--;
        }
    }

    public function render()
    {
        return view('livewire.counter-plus');
    }
}
