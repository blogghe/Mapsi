<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        factory(\App\Label::class, 20)->create();
        factory( \App\Role::class, 5 )->create();
    }
}
