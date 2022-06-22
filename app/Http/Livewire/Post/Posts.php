<?php

namespace App\Http\Livewire\Post;

use App\Models\File;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Posts extends Component
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

    public $idP = '';

    public $count;

    public $idPhoto ='';

    public $sendOk ='';

    public $search = '';

    public $perPage = '10';

    public $orderBy = 'desc';

    public $category = '0';

    public $comment;

    public $reply;

    public $xreply;

    public $like;

    public $likes;

    protected $queryString =[
        'search' => ['except'=>'',
        'perPage' => ['excep' =>'5'],
        'category' => ['excep' =>'0'],
    ]];

    public function mount()
    {

    }


    public function render(){
        if(!session('sendCommentSessionIdP')){
            $idP = $this->idP;
        }
        else{
            $idP = session('sendCommentSessionIdP');
            $this->comment = session('sendCommentSessionBody');
            $this->idP = session('sendCommentSessionIdP');
        }

        if ($idP) {
            if (Auth::user()){
                $like = Like::where('post_id',$idP)
                ->where('user_id',Auth::user()->id)->first();
                if($like){
                $this->like = $like->likeable_id;
                }
            }

            $likes = Like::where('post_id',$idP)->where('likeable_id',1);
            $this->likes = $likes->count();

            return view('livewire.post.posts',[
                'categories' => Category::all(),

                'comments' => Comment::where('post_id','=',$idP)
                ->where('parent_id','=',null)
                ->orderBy('created_at','desc')
                ->get(),

                'replies' => Comment::where('parent_id','<>',null)
                ->orderBy('created_at','desc')
                ->get(),

                'posts' => Post::where('id','=',$idP)
                ->paginate(10)
             ]);

        }else {
            if ($this->category=='0'){
                $categ = null;}
            else{
                $categ = $this->category;
            }


            return view('livewire.post.posts',[
                'categories' => Category::all(),

                'comments' => Comment::all(),

                'posts' => Post::where('lang','=', session('lang'))
                ->where('status',1)
                ->where('body','LIKE', "%{$this->search}%")
                ->where('category_id','LIKE', "%{$categ}%")
                ->orderBy('created_at',$this->orderBy)
                ->paginate($this->perPage)
             ]);
        }
    }

    public function readmore($idP)
    {
        $this->idP = $idP;
    }

    public function edit($idP)
    {
        session()->put('idP',$idP);
        return redirect()->to('/');

    }

    public function listpost()
    {
        session()->forget('sendCommentSessionIdP');
        session()->forget('sendCommentSessionBody');
        session()->forget('idP');
        $this->idP = '';
    }

    public function sendComment($idP)
    {
        if(Auth::user()){
            Comment::create([
                'body' => $this->comment,
                'post_id' => $idP,
                'user_id' => Auth::user()->id,
            ]);

            $this->comment='';

        }else{
            session()->put('sendCommentSessionIdP',$idP);
            session()->put('sendCommentSessionBody',$this->comment);

            return redirect()->to('/login');
        }
    }


    public function sendReply($idP,$idC)
    {
        Comment::create([
            'body' => $this->reply,
            'post_id' => $idP,
            'parent_id' => $idC,
            'user_id' => Auth::user()->id,
        ]);
        $this->reply='';
    }

    public function reply($idC)
    {
        $this->xreply=$idC;
    }


    public function like($idP){
        $likes = Like::where('post_id',$idP)->where('user_id',Auth::user()->id)->first();

        if ($likes){
            if ($likes->likeable_id==1) {
                $likes->update([
                    'likeable_id' => 0,
                ]);
            } elseif ($likes->likeable_id==0) {
                $likes->update([
                    'likeable_id' => 1,
                ]);
            }
        }else{
            Like::create([
                'likeable_id' => 1,
                'likeable_type' => 'mg',
                'post_id' => $idP,
                'user_id' => Auth::user()->id,
            ]);
        }
    }

    public function clear(){
        $this->search='';
        $this->category='';
        $this->perPage='10';
        $this->orderBy='desc';
    }

}
