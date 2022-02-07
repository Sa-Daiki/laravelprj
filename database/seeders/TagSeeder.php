<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('tags')->delete();

        \DB::table('tags')->insert([
        0 => [
            'id' => 1,
            'title' =>'laravel',
        ],

        1 => [
            'id' => 2,
            'title' =>'PHP',
        ],

        2 => [
            'id' => 3,
            'title' =>'HTML',
        ],

        3 => [
            'id' => 4,
            'title' =>'CSS',
        ],

        4 => [
            'id' => 5,
            'title' =>'C',
        ],

    ]);
    }
}
