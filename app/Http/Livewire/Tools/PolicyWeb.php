<?php

namespace App\Http\Livewire\Tools;

use Livewire\Component;
use App\Models\Design;


class PolicyWeb extends Component

{
    public $lang;
    public $color_bg_1;
    public $color_bg_2;
    public $color_bg_3;
    public $color_bg_4;
    public $color_bg_5;
    public $title_1;
    public $title_2;
    public $title_3;
    public $title_4;
    public $title_5;
    public $item_1;
    public $item_2;
    public $item_3;
    public $item_4;
    public $item_5;

    public function mount()
    {
        $setting = Design::where('pageweb','=','policy')
        ->where('lang','=',session('lang'))
        ->get();

        foreach ($setting as $set){
            if ($set->element=='item_1'){
                $this->title_1 = $set->title;
                $this->item_1 = $set->description;
                $this->color_bg_1 = $set->color_bg;
            }
            if ($set->element=='item_2'){
                $this->title_2 = $set->title;
                $this->item_2 = $set->description;
                $this->color_bg_2 = $set->color_bg;
            }
            if ($set->element=='item_3'){
                $this->title_3 = $set->title;
                $this->item_3 = $set->description;
                $this->color_bg_3 = $set->color_bg;
            }
            if ($set->element=='item_4'){
                $this->title_4 = $set->title;
                $this->item_4 = $set->description;
                $this->color_bg_4 = $set->color_bg;
            }
            if ($set->element=='item_5'){
                $this->title_5 = $set->title;
                $this->item_5 = $set->description;
                $this->color_bg_5 = $set->color_bg;
            }
        }
    }
    public function render()
    {
        return view('livewire.tools.policy-web');
    }
}
