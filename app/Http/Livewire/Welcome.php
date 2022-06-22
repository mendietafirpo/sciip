<?php

namespace App\Http\Livewire;
use App\Models\User;

use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\HttpFoundation\Request;

class Welcome extends Component
{
    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     *
     */
    public $path;

    public function render()
    {


        return view('inicio')->layout('layouts.guest');
    }


    public function spain(){

        $this->lang="es";
        session()->put('lang',$this->lang);
        return redirect()->to('dashboard');
    }

    public function italy(){

        $this->lang="it";
        session()->put('lang',$this->lang);
        return redirect()->to('dashboard');
    }

    public function engla(){

        $this->lang="en";
        session()->put('lang',$this->lang);
        return redirect()->to('dashboard');
    }

}
