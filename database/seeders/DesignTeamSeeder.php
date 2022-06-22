<?php

namespace Database\Seeders;
use App\Models\File;
use App\Models\Design;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DesignTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//about
        $dgn = new Design();
        $dgn->id =1;
        $dgn->pageweb = 'home';
        $dgn->element = 'about';
        $dgn->lang = 'es';
        $dgn->title = 'quien somos';
        $dgn->description = 'descripción de quien somos';
        $dgn->save();

        $dgn = new Design();
        $dgn->id =2;
        $dgn->pageweb = 'home';
        $dgn->element = 'about';
        $dgn->lang = 'it';
        $dgn->title = 'chi siamo';
        $dgn->description = 'descrizione di chi siamo';
        $dgn->save();

        $dgn = new Design();
        $dgn->id =3;
        $dgn->pageweb = 'home';
        $dgn->element = 'about';
        $dgn->lang = 'en';
        $dgn->title = 'about title';
        $dgn->description = 'about description';
        $dgn->save();

        //file about
        $file = new File();
        $file->design_id = 1;
        $file->item = 1;
        $file->filename = 'about_img_1.jpg';
        $file->save();

    //header - box 1
        $dgn = new Design();
        $dgn->id =4;
        $dgn->pageweb = 'header';
        $dgn->element = 'box_1';
        $dgn->lang = 'es';
        $dgn->title = 'titulo del box1';
        $dgn->description = 'descripción del box1';
        $dgn->save();

        $dgn = new Design();
        $dgn->id =5;
        $dgn->pageweb = 'header';
        $dgn->element = 'box_1';
        $dgn->lang = 'it';
        $dgn->title = 'titolo del box1';
        $dgn->description = 'descrizione del box1';
        $dgn->save();

        $dgn = new Design();
        $dgn->id =6;
        $dgn->pageweb = 'header';
        $dgn->element = 'box_1';
        $dgn->lang = 'en';
        $dgn->title = 'box1 title';
        $dgn->description = 'box1 description';
        $dgn->save();

    //header - box 2
        $dgn = new Design();
        $dgn->id =7;
        $dgn->pageweb = 'header';
        $dgn->element = 'box_2';
        $dgn->lang = 'es';
        $dgn->title = 'titulo del box2';
        $dgn->description = 'descripción del box2';
        $dgn->save();

        $dgn = new Design();
        $dgn->id =8;
        $dgn->pageweb = 'header';
        $dgn->element = 'box_2';
        $dgn->lang = 'it';
        $dgn->title = 'titolo del box2';
        $dgn->description = 'descrizione del box2';
        $dgn->save();

        $dgn = new Design();
        $dgn->id =9;
        $dgn->pageweb = 'header';
        $dgn->element = 'box_2';
        $dgn->lang = 'es';
        $dgn->title = 'box1 title';
        $dgn->description = 'box1 description';
        $dgn->save();

        //header - box 3
        $dgn = new Design();
        $dgn->id =10;
        $dgn->pageweb = 'header';
        $dgn->element = 'box_3';
        $dgn->lang = 'es';
        $dgn->title = 'titulo del box3';
        $dgn->description = 'descripción del box3';
        $dgn->save();

        $dgn = new Design();
        $dgn->id =11;
        $dgn->pageweb = 'header';
        $dgn->element = 'box_3';
        $dgn->lang = 'it';
        $dgn->title = 'titolo del box3';
        $dgn->description = 'descrizione del box3';
        $dgn->save();

        $dgn = new Design();
        $dgn->id =12;
        $dgn->pageweb = 'header';
        $dgn->element = 'box_3';
        $dgn->lang = 'es';
        $dgn->title = 'box1 title';
        $dgn->description = 'box1 description';
        $dgn->save();

    //file header
        $file = new File();
        $file->design_id = 2;
        $file->item = 1;
        $file->filename = 'header_img_1.jpg';
        $file->save();

        $file = new File();
        $file->design_id = 2;
        $file->item = 2;
        $file->filename = 'header_img_2.jpg';
        $file->save();

        $file = new File();
        $file->design_id = 2;
        $file->item = 3;
        $file->filename = 'header_img_2.jpg';
        $file->save();
    }
}
