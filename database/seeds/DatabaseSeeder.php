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
        $this->call( UsersTableSeeder::class );
        $this->call( ServicesTableSeeder::class );
        $this->call( LabelsTableSeeder::class );
        $this->call( ContactsTableSeeder::class );
        $this->call( ProblemsTableSeeder::class );
    }
}
