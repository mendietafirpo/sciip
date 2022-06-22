<?php

namespace App\Http\Livewire\Admin\Design;

use Livewire\Component;
use App\Models\Design;

class Slider extends Component
{
    public $sl_item = '1';

    //slider texto
    public $sl_desc_1;
    public $sl_desc_2;
    public $sl_desc_3;
    public $sl_desc_4;
    public $sl_desc_5;
//slider bg color
    public $sl_bg_1;
    public $sl_bg_2;
    public $sl_bg_3;
    public $sl_bg_4;
    public $sl_bg_5;
// slider color texto
    public $sl_tx_c_1;
    public $sl_tx_c_2;
    public $sl_tx_c_3;
    public $sl_tx_c_4;
    public $sl_tx_c_5;
// slider size texto
    public $sl_tx_s_1;
    public $sl_tx_s_2;
    public $sl_tx_s_3;
    public $sl_tx_s_4;
    public $sl_tx_s_5;
// slider size texto
    public $sl_class_1;
    public $sl_class_2;
    public $sl_class_3;
    public $sl_class_4;
    public $sl_class_5;
// slider status
    public $sl_status_1;
    public $sl_status_2;
    public $sl_status_3;
    public $sl_status_4;
    public $sl_status_5;
//slider toComponent
    public $sl_redirect_1;
    public $sl_redirect_2;
    public $sl_redirect_3;
    public $sl_redirect_4;
    public $sl_redirect_5;


    public function mount()
    {
        $setting = Design::where('pageweb','=','home')
        ->where('lang','=',session('lang'))
        ->get();

        foreach ($setting as $set){
            if ($set->element=='slider_1'){
                $this->sl_desc_1 = $set->description;
                if($set->color_bg){
                    $this->sl_bg_1 = $set->color_bg;
                    $this->sl_tx_c_1 = $set->color_text_1;
                    $this->sl_tx_s_1 = $set->text_size_1;
                    $this->sl_class_1 = $set->class;
                    $this->sl_status_1 = $set->status;
                    $this->sl_redirect_1 = $set->redirect;
                }
            }
            if ($set->element=='slider_2'){
                $this->sl_desc_2 = $set->description;
                if($set->color_bg){
                    $this->sl_bg_2 = $set->color_bg;
                    $this->sl_tx_c_2 = $set->color_text_1;
                    $this->sl_tx_s_2 = $set->text_sz_1;
                    $this->sl_class_2 = $set->class;
                    $this->sl_status_2 = $set->status;
                    $this->sl_redirect_2 = $set->redirect;
                }
            }
            if ($set->element=='slider_3'){
                $this->sl_desc_3 = $set->description;
                if($set->color_bg){
                    $this->sl_bg_3 = $set->color_bg;
                    $this->sl_tx_c_3 = $set->color_text_1;
                    $this->sl_tx_s_3 = $set->text_sz_1;
                    $this->sl_class_3 = $set->class;
                    $this->sl_status_3 = $set->status;
                    $this->sl_redirect_3 = $set->redirect;
                }
            }
            if ($set->element=='slider_4'){
                $this->sl_desc_4 = $set->description;
                if($set->color_bg){
                    $this->sl_bg_4 = $set->color_bg;
                    $this->sl_tx_c_4 = $set->color_text_1;
                    $this->sl_tx_s_4 = $set->text_sz_1;
                    $this->sl_class_4 = $set->class;
                    $this->sl_status_4 = $set->status;
                    $this->sl_redirect_4 = $set->redirect;
                }
            }
            if ($set->element=='slider_5'){
                $this->sl_desc_5 = $set->description;
                if($set->color_bg){
                    $this->sl_bg_5 = $set->color_bg;
                    $this->sl_tx_c_5 = $set->color_text_1;
                    $this->sl_tx_s_5 = $set->text_sz_1;
                    $this->sl_class_5 = $set->class;
                    $this->sl_status_5 = $set->status;
                    $this->sl_redirect_5 = $set->redirect;
                }
            }
        }
    }


    public function render()
    {
        return view('livewire.admin.design.slider');
    }

    public function formUpdate($i){

        $this->emitTo('admin.design.design-update', 'formUpdate','home','slider_'.$i);
    }


    public function toredirect($i)
    {
        $redirecting = Design::where('pageweb','=','home')
        ->where('element','=','slider_'.$i)
        ->where('redirect','<>',null)
        ->first();

        if($redirecting){
            $redirectto= $redirecting->redirect;

            return redirect()->to($redirectto);
        }
    }
}
