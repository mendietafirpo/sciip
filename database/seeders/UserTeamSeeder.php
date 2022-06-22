<?php

namespace Database\Seeders;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UserTeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $name = new User();
        $name->id = 1;
        $name->name = 'marcelo';
        $name->admin = 1;
        $name->current_team_id = 1;
        $name->email = 'mendietafirpo@gmail.com';
        $name->password = Hash::make('marcelo2022');
        $name->save();

        $name->teams()->attach(1, ['role' => 'admin']);
        Team::create(['user_id'=>1, 'name' => 'team admin','personal_team' => 1]);

        $name = new User();
        $name->id = 2;
        $name->name = 'isabel';
        $name->admin = 2;
        $name->current_team_id = 1;
        $name->email = 'sblpesoa@gmail.com';
        $name->password =  Hash::make('isabel2022');
        $name->save();

        $name->teams()->attach(2, ['role' => 'editor']);
        Team::create(['user_id'=>2, 'name' => 'team editos','personal_team' => 1]);

    }
}
