<?php

use App\Models\Role;
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
        $titles = ['admin', 'supplier'];

        foreach ($titles as $key => $title){
            Role::updateOrCreate([
                'id' => $key + 1,
                'title' => $title
            ]);
        }
    }
}
