<?php

namespace App\Http\Livewire\Post;


use Livewire\Component;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class PostList extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $title;
    public $lang;
    public $status;
    public $body;
    public $user_id;
    public $category_id;
    public $newcategory;
    public $idCategory;

    public $search = '';

    public $perPage = '20';

    public $category = '1';

    public $sendok;

    public $idUs;

    public $form;

    protected $queryString =[
        'search' => ['except'=>''],
        'perPage' => ['excep' =>'20'],
        'category' => ['excep' =>'1']
    ];


    public function render()
    {
        if ($this->category=='0'){
            $categ = null;}
        else{
            $categ = $this->category;
        }
        //id new category
        if(!$this->idCategory){
            $this->idCategory = Category::max('id')+1;
        }

        if(Auth::user()->admin==1){
            $post =  Post::all();
        }elseif(Auth::user()->admin>=2){
            $post =  Post::where('user_id','=',Auth::user()->id);
        }

        return view('livewire.post.post-list',[
            'categories' => Category::all(),

            'posts' => $post->where('category_id','LIKE', "%{$categ}%")
              	->where('title','like', "%{$this->search}%")
              	->where('body','like', "%{$this->search}%")
          		->paginate($this->perPage)
        ]);
    }

    public function submit(){
        $this->validate([
            'lang' =>  'required',
            'status' =>  'required',
            'title' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'category' => 'required',
        ]);

        if ($this->form=='create') {
            Post::create([
                'lang' => $this->lang,
                'status' => $this->status,
                'title' => $this->title,
                'description' => $this->description,
                'user_id' => $this->user_id,
                'category_id' => $this->category_id,
                ]);
        }
        if ($this->form=='edit') {

            $dates = Post::find($this->idDgn);
            $dates->update([
                'lang' => $this->lang,
                'status' => $this->status,
                'title' => $this->title,
                'description' => $this->description,
                'user_id' => $this->user_id,
                'category_id' => $this->category_id,

            ]);
        }
        $this->reset();
        $this->sendok = 'your message was sent successfully';
        return redirect()->back();

    }

    public function form($item, $idP){
        if ($item==1){
            $this->lang = '';
            $this->title = '';
            $this->body = '';
            $this->status = '';
            $this->category_id = '';
            $this->user_id = '';

            $this->form = 'create';
        }elseif($item==2){
            $this->form = 'edit';
            $dates = Post::find($idP);
            $this->lang = $dates->lang;
            $this->status = $dates->status;
            $this->category_id = $dates->category_id;
            $this->user_id = $dates->user_id;
            $this->title = $dates->title;
            $this->body = $dates->body;


        }elseif($item==3){
            return redirect()->to('/dashboard');
        }
        $this->idUs = $idP;
    }
    public function destroy($id) {
        $post = Post::find($id);
        $post->delete();
    }


    public function sendCategory(){
        if($this->idCategory == Category::max('id')+1){
            Category::create([
                'id' => $this->idCategory,
                'name' => $this->newcategory,
                ]);
        } else {
            $date = Category::find($this->idCategory);
            $date->update([
                'id' => $this->idCategory,
                'name' => $this->newcategory,
            ]);
        }
    }

    public function editcategory($id){
        $date = Category::find($id);
        $this->idCategory = $date->id;
        $this->newcategory = $date->name;
    }

    public function destroycategory($id){
        $date = Post::find($id);
        $date->delete();
    }


    public function clear(){
        $this->search='';
        $this->perPage='20';

    }
}
