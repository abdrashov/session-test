<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'name' => 'admin admin',
    		'email' => 'admin@admin.com',
    		'password' => '$2y$10$9tvFy4zuUE.ZUTO0EQJKDOj0CH.Jyj3.fpgzq/.P77ieK7QzF0FAu' // admin@admin.com
    	]);
    	User::factory()->times(4)->create();
    }
}
