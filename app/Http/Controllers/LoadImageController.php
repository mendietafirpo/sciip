<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\File;
use Intervention\Image\Facades\Image;

class LoadImageController extends Controller
{

    public function upload(Request $request){
            //$storage_disk = 'public';
            //$storage_path = 'posts';
            $post_id = Post::max('id')+1;
            $i= File::where('post_id',$post_id)->max('item')+1;
            $file = $request->file('file');
            //$size = $request->file('file')->getSize();
            //$img = Image::make($file->path());
            $path = 'posts/'.'post_'.$post_id.'_'.$i;
            $url = $file->storeAs($path, $file->getClientOriginalName(),'public');
            //session()->put('file_post,$file->getClientOriginalName());
            //$file->store($storage_path, $storage_disk);
            //Storage::url($url);
            $dbfile = new File();
            $dbfile->item =$i;
            $dbfile->post_id =$post_id;
            $dbfile->filename = $file->getClientOriginalName();
            $dbfile->save();

            return response()->json([
                'url' => '/storage'.'/'.$url
            ]);
    }
}
