<?php

use App\Models\Role;
use App\Models\User;
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
        $emails = ['admin@email.com', 'supplier@email.com'];

        $user = User::whereIn('email', [$emails])->get();

        if(count($user) <= 0 ){
            $roles = Role::all();

            factory(User::class)->create([
                'role_id' => $roles[0]->id,
                'email' => $emails[0]
            ]);

            factory(User::class)->create([
                'role_id' => $roles[0]->id,
                'email' => $emails[1]
            ]);
        }
    }
}
