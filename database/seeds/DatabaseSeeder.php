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
        // $this->call(UserSeeder::class);

        $user = new App\User;
        $user->name = 'Ray Lo';
        $user->email = 'hi@raylo.us';
        $user->password = bcrypt('Temp!234');
        $user->save();
    }
}
