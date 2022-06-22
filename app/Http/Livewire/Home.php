<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Design;
use Illuminate\Support\Facades\Redirect;

class Home extends Component
{

    public $body;
    public $title;
    public $header;
    public $slider;
    public $idPhome = '';

    public function mount()
    {
        $setting = Design::where('pageweb','=','home')
        ->get();

        foreach ($setting as $set){
            if ($set->element=='slider_status'){
                $this->slider = $set->status;
            }
            if ($set->element=='header_status'){
                $this->header = $set->status;
            }
        }

        if(session('cook')== null)
        {
            session()->put('cook','true');
        }

    }


    public function render()
    {
        return view('livewire.home',[
        ])->layout('layouts.guest');
    }

    public function spain(){

        $this->lang="es";
        session()->put('lang',$this->lang);
        return redirect()->to('/');
    }

    public function italy(){

        $this->lang="it";
        session()->put('lang',$this->lang);
        session()->save();
        return redirect()->to('/');
    }

    public function engla(){

        $this->lang="en";
        session()->put('lang',$this->lang);
        return redirect()->to('/');
    }

    public function slider($item){

        if($this->component){
            return redirect()->to($this->component);
        }elseif($item==2){
            return redirect()->to('/');
            }
        }
}
