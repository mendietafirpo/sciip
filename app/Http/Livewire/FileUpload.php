<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;

class FileUpload extends Component
{
    use WithFileUploads;

    public $title;
    public $file_name;

    public function upload()
    {
        $data = $this->validate([
            'title' => 'required',
            'file_name' => 'required',
        ]);

        $filename = $this->name->store('posts','public');

        $data['file_name'] = $filename;

        Post::create($data);

        session()->flash('message', 'File has been successfully Uploaded.');

        return redirect()->to('/livewire-file-upload');
    }

    public function render()
    {
        return view('livewire.file-upload');
    }
}
