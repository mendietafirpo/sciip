<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Users extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search = '';

    public $perPage = '5';

    public $sendok;

    public $idUs;

    public $form;

    public $name;
    public $email;
    public $password;
    public $admin;
    public $google_id;
    public $facebook_id;
    public $github_id;
    public $profile_photo_path;

    protected $queryString =[
        'search' => ['except'=>'',
        'perPage' => ['excep' =>'5']
    ]];

    public function render()
    {
        return view('livewire.admin.users',[

            'users' => User::where('name','LIKE', "%{$this->search}%")
            ->orWhere('email','LIKE', "%{$this->search}%")
            ->paginate($this->perPage)
        ]);
    }

    public function submit(){
        $this->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        if($this->profile_photo_path) {
            $filename = $this->name.'_'.'.'.$this->profile_photo_path->getClientOriginalExtension();
            $this->profile_photo_path->storeAs('profiles-photos',$filename,'public');
        }  else{
            $filename= null;
        }

        if ($this->form=='create') {
            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'admin' => $this->admin,
                'google_id' => $this->google_id,
                'facebook_id' => $this->facebook_id,
                'github_id' => $this->github_id,
                'profile-photo_patg' => $filename,
            ]);
        }
        if ($this->form=='edit') {

            $dates = User::find($this->idUs);
            $dates->update([
                'name' => $this->name,
                'email' => $this->email,
                'admin' => $this->admin,
                'google_id' => $this->google_id,
                'facebook_id' => $this->facebook_id,
                'github_id' => $this->github_id,
                'profile-photo_patg' => $filename,
            ]);
        }
        $this->reset();
        $this->sendok = 'your record was sent successfully';

    }

    public function form($item, $idU){
        if ($item==1){
            $this->name = '';
            $this->email = '';
            $this->admin = '';
            $this->google_id = '';
            $this->facebook_id = '';
            $this->profile_photo_path = '';
            $this->form = 'create';
        }elseif($item==2){
            $this->form = 'edit';
            $dates = User::find($idU);
            $this->name = $dates->name;
            $this->email = $dates->email;
            $this->admin = $dates->admin;
            $this->google_id = $dates->google_id;
            $this->facebook_id = $dates->facebook_id;
            $this->profile_photo_path = $dates->profile_photo_path;
        }elseif($item==3){
            return redirect()->to('/dashboard');
        }
        $this->idUs = $idU;
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
    }

    public function clear(){
        $this->search='';
        $this->perPage='5';

    }
 }
