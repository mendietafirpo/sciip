<?php

namespace App\Http\Livewire\Tools;
use App\Models\Contactm;

use Livewire\Component;

class Contact extends Component
{
    public $lang;
    public $name;
    public $surname;
    public $email;
    public $phone;
    public $city;
    public $country;
    public $subject;
    public $messege;
    public $titleForm = 'Your question or suggestion is welcome';


    public function submit()
    {

        $this->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'messege' => 'required'
        ]);

        Contactm::create([
            'lang' => session('lang'),
            'name' => $this->name,
            'surname' => $this->surname,
            'email' => $this->email,
            'phone' => $this->phone,
            'city' => $this->city,
            'country' => $this->country,
            'subject' => $this->subject,
            'messege' => $this->messege,
        ]);

        $this->reset('lang', 'name', 'surname', 'email', 'phone', 'city', 'country', 'subject', 'messege');
        $this->titleForm = 'your message was sent successfully';

        //return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.tools.contact');
    }
}
