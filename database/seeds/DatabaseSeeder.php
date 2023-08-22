<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\Supervisor;
use App\Models\User;
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
        $this->command->call('media-library:clean');

        $admin = User::factory()->createOne(['name'=>'admin','email'=>'admin@demo.com','phone'=>'11111111','type'=>User::ADMIN_TYPE]);

        $this->call([
            DummyDataSeeder::class,
        ]);

        $this->command->table(['ID', 'Name', 'Email', 'Phone', 'Password', 'Type', 'Type Code'], [
            [$admin->id, $admin->name, $admin->email, $admin->phone, 'password', 'Admin', $admin->type],
        ]);
    }
}
