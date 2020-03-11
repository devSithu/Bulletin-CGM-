<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'sithu',
            'email' => 'sithu.stdean@gmail.com',
            'password' => Hash::make('sithudean'),
            'isAdmin'=> '1',
            'isVip' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'thandar',
            'email' => 'thandar@gmail.com',
            'password' => Hash::make('sithudean'),
            'isAdmin'=> '0',
            'isVip' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'kyaw kyaw',
            'email' => 'kyawkyaw@gmail.com',
            'password' => Hash::make('sithudean'),
            'isAdmin'=> '0',
            'isVip' => '0'
        ]);

        for($i=0;$i<80;$i++)
        {
            DB::table('news')->insert([
                'user_id'=> random_int(1,3),
                'name' => Str::random(10),
                'title' => Str::random(10),
                'object' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'
            ]);
        }
        

    }
}
