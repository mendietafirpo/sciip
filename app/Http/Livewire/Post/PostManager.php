<?php

namespace App\Http\Livewire\Post;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use App\Models\File;
use App\Models\Post;
use App\Models\Category;

class PostManager extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $title;
    public $status;
    public $lang;
    public $body;
    public $post_id;
    public $user_id;
    public $category_id;
    public $filename;
    public $content;

    //ckeditor imagen
    protected $listeners = ['input'];

    public $idP = '';

    public $count;

    public $idPhoto ='';

    public $sendOk ='';

    public $search = '';

    public $perPage = '10';

    public $orderBy = 'desc';

    public $category = 0;

    protected $queryString =[
        'search' => ['except'=>'',
        'perPage' => ['excep' =>'5'],
        'category' => ['excep' =>0]
    ]];

    public function mount()
    {
        $idP = session('idP');

        if ($idP && $this->title==null) {
            $this->category_id = Post::find($idP)->category_id;
            $this->status = Post::find($idP)->status;
            $this->title = Post::find($idP)->title;
            $this->body = Post::find($idP)->body;
        }
    }

    public function render()
    {
        return view('livewire.post.post-manager',[
            'categories' => Category::all(),
            ]);
    }

    public function readmore($idP)
    {
        $this->idP = $idP;
    }

    public function listpost()
    {
        $this->idP = '';
    }

    public function clear(){
        $this->search='';
        $this->category='';
        $this->perPage='10';
        $this->orderBy='desc';
    }

    public function input($data){

        $this->body = $data['value'];
    }

    public function createPost(){

        /*$fileexists = collect(Storage::disk('public')->listContents('posts'))
        ->where('basename','=',session('fileloader'))
        ->first();*/
        if(!session('idP')) {

                if ($this->category_id){
                    $idLast = Post::max('id')+1;

                    Post::create([
                        'id' => $idLast,
                        'title' => $this->title,
                        'body' => $this->body,
                        'lang' => session('lang'),
                        'status' => 1,
                        'user_id' => Auth::user()->id,
                        'category_id' => $this->category_id,
                    ]);
                    /*
                    File::create([
                        'post_id' => $idLast,
                        'filename' => session('fileloader')
                    ]);*/

                    $body = str_replace('<img src=','<img style="width: 500px; display:block; align-item:left;" src=', $this->body);

                    Post::find($idLast)->update(['body' => $body]);

                    $this->reset('title', 'category','body');
                    $this->sendOk = "your post was published successful";
                    return redirect()->to('/');

                }else {
                    $this->sendOk = "select any option";
                }
            }else{
                $post = Post::find(session('idP'));

                $post->update([
                    'status' => $this->status,
                    'category_id' => $this->category_id,
                    'title' => $this->title,
                    'body' => $this->body
                ]);
                session()->forget('idP');
                return redirect()->to('/');
            }
    }

    public function cancel(){

        session()->forget('idP');
        return redirect()->to('/');

    }


    public function addCategory(){
        Category::create([
            'name'=> $this->category_id,
        ]);
    }
}
