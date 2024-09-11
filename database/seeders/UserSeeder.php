<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    use HasRoles;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'manager']);

        $admin = User::create([
          'username' => 'admin',
          'email' => 'admin@admin.com',
          'password' => bcrypt('admin123')
        ]);
        $admin->assignRole('admin');
    }
}
