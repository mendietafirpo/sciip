<?php

namespace App\Http\Livewire\Admin\Design;


use Livewire\Component;
use App\Models\Design;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Manager extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search = '';

    public $perPage = '20';

    public $sendok;

    public $idDgn;

    public $form;

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

    protected $queryString =[
        'search' => ['except'=>'',
        'perPage' => ['excep' =>'20']
    ]];

    public function render()
    {

        return view('livewire.admin.design.manager',[

            'designs' => Design::where('element','LIKE', "%{$this->search}%")
            ->orWhere('pageweb','LIKE', "%{$this->search}%")
            ->orderBy('pageweb','asc')
            ->orderBy('element','asc')
            ->paginate($this->perPage)
        ]);
    }

    public function submit(){
        $this->validate([
            'pageweb' => 'required',
            'element' => 'required',
            'lang' => 'required',
        ]);

        if ($this->form=='create') {
            Design::create([
                'pageweb' => $this->pageweb,
                'element' => $this->element,
                'lang' => $this->lang,
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
        }
        if ($this->form=='edit') {

            $dates = Design::find($this->idDgn);
            $dates->update([
                'pageweb' => $this->pageweb,
                'element' => $this->element,
                'lang' => $this->lang,
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
        }
        $this->reset();
        $this->sendok = 'your message was sent successfully';
        return redirect()->back();

    }

    public function form($item, $idD){
        if ($item==1){
            $this->pageweb = '';
            $this->element = '';
            $this->lang = '';
            $this->color_bg = '';
            $this->color_tx_1 = '';
            $this->color_tx_2 = '';
            $this->text_sz_1 = '';
            $this->text_sz_2 = '';
            $this->class = '';
            $this->title = '';
            $this->description = '';
            $this->status = '';
            $this->redirect = '';
            $this->form = 'create';
        }elseif($item==2){
            $this->form = 'edit';
            $dates = Design::find($idD);
            $this->pageweb = $dates->pageweb;
            $this->element = $dates->element;
            $this->lang = $dates->lang;
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
        }elseif($item==3){
            return redirect()->to('/dashboard');
        }
        $this->idDgn = $idD;
    }

    public function clear(){
        $this->search='';
        $this->perPage='5';

    }
}
