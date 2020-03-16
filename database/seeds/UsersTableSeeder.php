<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('users')->insert([
            [
                'id'             => 1,
                'name'           => 'test',
                'email'          => 'test@test.com',
                'password'       => bcrypt(123456),
                'remember_token' => null,
                'created_at'     => date('Y-m-d H:i:s'),
                'updated_at'     => date('Y-m-d H:i:s'),
                'deleted_at'     => null,
            ],
        ]);
    }
}
