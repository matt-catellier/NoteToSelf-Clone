<?php
/**
 * Created by PhpStorm.
 * User: matthewcatellier
 * Date: 2016-02-28
 * Time: 2:57 PM
 */
class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'username' => 'mattcatellier@gmail.com',
            'password' => Hash::make('password'),
        ));
    }
}