<?php

namespace App\Http\Livewire\Admin\Design;

use Livewire\Component;
use App\Models\Design;

class DesignUpdate extends Component

{

    protected $listeners = [
        'formUpdate'=> 'edit'] ;

    public $pageweb;
    public $element;
    public $lang;
    public $color_bg;
    public $color_tx_1;
    public $color_tx_2;
    public $text_sz_1;
    public $text_sz_2;
    public $class;
    public $title;
    public $description;
    public $status;
    public $redirect;
    public $idDgn;


    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.admin.design.design-update');
    }

    public function submit(){

            $dates = Design::find($this->idDgn);
            $dates->update([
                'color_bg' => $this->color_bg,
                'color_tx_1' => $this->color_tx_1,
                'color_tx_2' => $this->color_tx_2,
                'text_sz_1' => $this->text_sz_1,
                'text_sz_2' => $this->text_sz_2,
                'class' => $this->class,
                'title' => $this->title,
                'description' => $this->description,
                'status' => $this->status,
                'redirect' => $this->redirect,
            ]);
        $this->reset();
        return redirect()->back();
    }


    public function edit($pagw, $elem){

        $dates = Design::where('pageweb','=',$pagw)
        ->where('element','=',$elem)
        ->where('lang','=',session('lang'))
        ->first();

        $this->idDgn = $dates->id;
        $this->color_bg = $dates->color_bg;
        $this->color_tx_1 = $dates->color_tx_1;
        $this->color_tx_2 = $dates->color_tx_2;
        $this->text_sz_1 = $dates->text_sz_1;
        $this->text_sz_2 = $dates->text_sz_2;
        $this->class = $dates->class;
        $this->title = $dates->title;
        $this->description = $dates->description;
        $this->status = $dates->status;
        $this->redirect = $dates->redirect;

    }

}
