<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class MyNavigationMenu extends Component
{

      /**
     * The component's listeners.
     *
     * @var array
     */
    protected $listeners = [
        'refresh-navigation-menu' => '$refresh',
    ];

    public $lang = '';

    public $sgm1;

    public $sgm2;

    public $slash;

    public function __contruct()
    {
        //
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $this->sgm1 = Request()->segment(1);
        $this->sgm2 = Request()->segment(2);
        if ($this->sgm2){$this->slash ='/';}else {$this->slash ='';}

        return view('livewire.my-navigation-menu');
    }


    public function spain(){

        $this->lang="es";
        session()->put('lang',$this->lang);
        return redirect()->to($this->sgm1.$this->slash.$this->sgm2);
    }

    public function italy(Request $request){

        $this->lang="it";
        $request->session()->put('lang',$this->lang);
        return redirect()->to($this->sgm1.$this->slash.$this->sgm2);
    }

    public function engla(){

        $this->lang="en";
        session()->put('lang',$this->lang);
        return redirect()->to($this->sgm1.$this->slash.$this->sgm2);
    }
}
