<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'email' => 'admin@admin',
                'password' => bcrypt('admin'),
                'level' => 1
            ],
            [
                'email' => 'staff@staff',
                'password' => bcrypt('staff'),
                'level' => 1
            ]
        ];
        DB::table('users')->insert($data);
    }
}
