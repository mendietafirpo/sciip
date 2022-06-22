<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\Contactm;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Contactme extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $search = '';

    public $perPage = '5';

    public $sendok;

    public $lang;
    public $name;
    public $surname;
    public $subject;
    public $messege;
    public $email;
    public $phone;
    public $city;
    public $country;

    protected $queryString =[
        'search' => ['except'=>'',
        'perPage' => ['excep' =>'5']
    ]];


    public function render()
    {
        return view('livewire.admin.contactme',[

            'contacts' => Contactm::where('name','LIKE', "%{$this->search}%")
            ->orWhere('surname','LIKE', "%{$this->search}%")
            ->paginate($this->perPage)
        ]);
    }


    public function destroy($id) {
        $contact = Contactm::find($id);
        $contact->delete();
    }

    public function clear(){
        $this->search='';
        $this->perPage='5';

    }
 }

