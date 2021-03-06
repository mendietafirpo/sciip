<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Trix extends Component
{
    public $value;
    public $trixId;

    const EVENT_VALUE_UPDATED = 'trix_value_updated';

    public function mount($value = ''){
        $this->value = $value;
        $this->trixId = 'trix-' . uniqid();
    }

    public function updatedValue($value){
        $this->emit(self::EVENT_VALUE_UPDATED, $this->value);
    }

    public function render()
    {
        return view('livewire.trix');
    }
}
