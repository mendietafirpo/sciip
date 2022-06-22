<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;
use App\Models\Category;


class Ckeditor extends Component
{
    use WithPagination;

    public $title;
    public $status;
    public $lang;
    public $body;
    public $post_id;
    public $user_id;
    public $category_id;

    public $file;

    public $form_data = ['body' => ''];

    protected $listeners = ['input'];

    public function render()
    {

        return view('livewire.ckeditor',[
            'categories' => Category::all(),

            'posts' => Post::all()
        ]);
    }

    public function input($data){

        $this->body = $data['value'];
    }

    public function getContentProperty($data){

        return "eyyyy";//$this->form_data[$data];
        //return Post::find(6)->first()->title;

    }

    public function createPost(){
        dd([
            $this->category_id,
            $this->title,
            $this->body,

        ]);
    }

}
