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
        DB::table('user')->insert([
        		['user_id' => '2009-0068', 'username' => 'maartri', 'password' => Hash::make('maartri')],
        		['user_id' => '2009-1111', 'username' => 'gel', 'password' => Hash::make('gel')],
        		['user_id' => '2009-2222', 'username' => 'mark', 'password' => Hash::make('mark')],
        		['user_id' => '2009-3333', 'username' => 'aris', 'password' => Hash::make('aris')],
        	]);
    }
}
