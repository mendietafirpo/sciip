<?php

namespace App\Http\Livewire\Admin\Design;

use Livewire\Component;
use App\Models\Design;
use App\Models\File;
use Facade\Ignition\Http\Controllers\ScriptController;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;


class Header extends Component
{
    use WithFileUploads;


    public $idDgn;
    public $pageweb;
    public $element;
    public $lang;
    public $title;
    public $description;
    public $image;
    public $sendOk;

    public $img_1;
    public $img_2;
    public $img_3;
    public $title_1;
    public $title_2;
    public $title_3;
    public $descrip_1;
    public $descrip_2;
    public $descrip_3;

    public function formUpdate($i){
        if($i==1){
            $this->emitTo('admin.design.design-update', 'formUpdate','header','box_1');
        }elseif($i==2){
            $this->emitTo('admin.design.design-update', 'formUpdate','header','box_2');
        }elseif($i==3){
            $this->emitTo('admin.design.design-update', 'formUpdate','header','box_3');
        }
    }

    public function mount()
    {

       /* $setting = Design::where('pageweb','=','header')
        ->where('lang','=',session('lang'))
        ->get();

        foreach ($setting as $set){
            if ($set->element=='box_1'){
                $this->sl_desc_1 = $set->description;
                $this->title = $set->title;
                if($set->color_bg){
                    $this->sl_bg_1 = $set->color_bg;
                    $this->sl_tex_c_1 = $set->text_color_1;
                    $this->sl_tex_s_1 = $set->text_size_1;
                    $this->sl_class_1 = $set->class;
                }
            }
            if ($set->element=='box_2'){
                $this->sl_desc_2 = $set->description;
                if($set->color_bg){
                    $this->sl_bg_2 = $set->color_bg;
                    $this->sl_tex_c_2 = $set->text_color_1;
                    $this->sl_tex_s_2 = $set->text_size_1;
                    $this->sl_class_2 = $set->class;
                }
            }
            if ($set->element=='box_3'){
                $this->sl_desc_3 = $set->description;
                if($set->color_bg){
                    $this->sl_bg_3 = $set->color_bg;
                    $this->sl_tex_c_3 = $set->text_color_1;
                    $this->sl_tex_s_3 = $set->text_size_1;
                    $this->sl_class_3 = $set->class;
                }
            }
        }*/
    }


    public function render()
    {
        $designs = Design::all();
        foreach ($designs as $dgn) {
            if ($dgn->pageweb=='header' && $dgn->element=='box_1' && $dgn->lang == session('lang')){
                $this->title_1 = $dgn->title;
                $this->descrip_1 = $dgn->description;
            }
            if ($dgn->pageweb=='header' && $dgn->element=='box_2' && $dgn->lang == session('lang')){
                $this->title_2 = $dgn->title;
                $this->descrip_2 = $dgn->description;
            }
            if ($dgn->pageweb=='header' && $dgn->element=='box_3' && $dgn->lang == session('lang')){
                $this->title_3 = $dgn->title;
                $this->descrip_3 = $dgn->description;
            }
        }
        $files = File::all();
        foreach ($files as $file) {
            if ($file->design_id==2 && $file->item==1){
                $this->img_1 = $file->filename;
            }
            if ($file->design_id==2 && $file->item==2){
                $this->img_2 = $file->filename;
            }
            if ($file->design_id==2 && $file->item==3){
                $this->img_3 = $file->filename;
            }
        }

        return view('livewire.admin.design.header');
    }

    public function edit($item){

        if($item==1){
            $dates = Design::where('pageweb','=','header')
            ->where('element','=','box_1')
            ->where('lang','=',session('lang'))
            ->first();
            $this->title = $dates->title;
            $this->description = $dates->description;
            $this->idDgn = $dates->id;
        }
        if($item==2){
            $dates = Design::where('pageweb','=','header')
            ->where('element','=','box_2')
            ->where('lang','=',session('lang'))
            ->first();
            $this->title = $dates->title;
            $this->description = $dates->description;
            $this->idDgn = $dates->id;
        }
        if($item==3){
            $dates = Design::where('pageweb','=','header')
            ->where('element','=','box_3')
            ->where('lang','=',session('lang'))
            ->first();
            $this->title = $dates->title;
            $this->description = $dates->description;
            $this->idDgn = $dates->id;
        }

    }

    public function submit($xx, $yy){
        //box 1
        if ($xx && $yy == 2){
            $record = Design::find($this->idDgn);
            $record->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
            $this->reset();
        }

        if ($xx == 1 && $yy == 1){
            if($this->image){
                $filename = 'header_img_1'.'.'.$this->image->getClientOriginalExtension();
                $this->image->storeAs('designs',$filename,'public');

                $file = File::where('design_id',2)
                ->where('item',1)->first();

                $file->update([
                    'filename' => $filename
                ]);
                $this->reset();
            }else{
                $this->sendOk = 'file is null, upload file again';
            }
        }

        //box 2
        if ($xx == 2 && $yy == 1){
            if($this->image){
                $filename = 'header_img_2'.'.'.$this->image->getClientOriginalExtension();
                $this->image->storeAs('designs',$filename,'public');

                $file = File::where('design_id',2)
                ->where('item',2)->first();

                $file->update([
                    'filename' => $filename
                ]);
                $this->reset();
            }else{
                $this->sendOk = 'file is null, upload file again';
            }
        }

        //box 3
        if ($xx == 3 && $yy == 1){
            if($this->image){
                $filename = 'header_img_3'.'.'.$this->image->getClientOriginalExtension();
                $this->image->storeAs('designs',$filename,'public');

                $file = File::where('design_id',2)
                ->where('item',3)->first();

                $file->update([
                    'filename' => $filename
                ]);
                $this->reset();
            }else{
                $this->sendOk = 'file is null, upload file again';
            }
        }


    }

}
