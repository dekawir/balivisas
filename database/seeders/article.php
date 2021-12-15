<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class article extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $user = [
            [
                'title' => 'B211A',
                'description'=>'testtest',
                'status'=>'1',
                'created_by'=>'1',
            ],
            [
                'title' => 'Kitas',
                'description'=>'testtest',
                'status'=>'1',
                'created_by'=>'1',
            ],
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
