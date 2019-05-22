<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
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
                'cate_name' => 'HP',
                'cate_slug' => str_slug('HP')
            ],
            [
                'cate_name' => 'Dell',
                'cate_slug' => str_slug('Dell')
            ]
        ];
        DB::table('category')->insert($data);
    }
}
