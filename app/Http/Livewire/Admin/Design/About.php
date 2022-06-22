<?php

namespace App\Http\Livewire\Admin\Design;

use Livewire\Component;
use App\Models\Design;
use App\Models\File;
use Livewire\WithFileUploads;

class About extends Component
{
    use WithFileUploads;

    public $titl;
    public $descrip;
    public $sendOk;
    public $img_1;

    public $title;
    public $idDgn;
    public $pageweb;
    public $element;
    public $lang;
    public $description;
    public $image;


    public function render()

    {
      $abouts = Design::where('pageweb','=','home')
        ->where('element','=','about')
        ->where('lang','=',session('lang'))
        ->first();
        $this->titl = $abouts->title;
        $this->descrip = $abouts->description;

        $imgs = File::where('design_id',1)
        ->where('item',1)->pluck('filename')->first();

        $this->img_1 = $imgs;

        return view('livewire.admin.design.about')
                ->layout('layouts.guest');

    }

    public function edit(){

            $dates = Design::where('pageweb','=','home')
            ->where('element','=','about')
            ->where('lang','=',session('lang'))
            ->first();

            $this->title = $dates->title;
            $this->description = $dates->description;
            $this->idDgn = $dates->id;
    }

    public function submit($item){
        $this->sendOk="start upload";
        if($item==1){
            if($this->image){
                $filename = 'about_img_1'.'.'.$this->image->getClientOriginalExtension();

                $this->image->storeAs('designs',$filename,'public');

                $file = File::where('design_id',1)
                ->where('item',1)->first();

                $file->update([
                    'filename' => $filename
                ]);
                $this->reset();
                $this->sendOk="file upload successefully";
            }else{
                $this->sendOk="select one file";
            }
        }elseif($item==2){
            $dgn = Design::find($this->idDgn);

            $dgn->update([
                'title' => $this->title,
                'description' => $this->description,
            ]);
            $this->reset();
        }

        }
}
