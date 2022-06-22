<?php

namespace App\Http\Livewire\Tools;

use Livewire\Component;
use App\Models\Design;

class Cookie extends Component
{

    public $lang;
    public $cookDesc;

    public $setItem_1;
    public $setItem_2;
    public $setItem_3;
    public $setItem_4;

    public $onoff_1 = 1;
    public $onoff_2 = 1;
    public $onoff_3 = 0;
    public $onoff_4 = 0;

    public $sendOk;

    public function mount()
    {
        $setting = Design::where('pageweb','=','cookie')
        ->where('lang','=',session('lang'))
        ->get();

        foreach ($setting as $set){
            if ($set->element=='cookdescription'){
                $this->cookDesc = $set->description;
            }
            if ($set->element=='cookitem_1'){
                $this->setItem_1 = $set->description;
            }
            if ($set->element=='cookitem_2'){
                $this->setItem_2 = $set->description;
            }
            if ($set->element=='cookitem_3'){
                $this->setItem_3 = $set->description;
            }
            if ($set->element=='cookitem_4'){
                $this->setItem_4 = $set->description;
            }
        }

    }

    public function render()
    {
        return view('livewire.tools.cookie');
    }

    public function ofCook(){
        session()->put('cook','false');
        return redirect()->to('/');
    }

    public function cookieConfig(){
        $this->onoff_1 = $this->onoff_1;
        $this->onoff_2 = $this->onoff_2;
        $this->onoff_3 = $this->onoff_3;
        $this->onoff_4 = $this->onoff_4;
        $this->sendOk = "your settings were saved successfully";

        if ($this->onoff_1==1){

        }
        if ($this->onoff_2==1){

        }
        if ($this->onoff_3==1){

        }
        if ($this->onoff_4==1){

        }
        session()->flash('message', 'Post successfully updated.');
        return redirect()->to('/');

    }
}
