<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\User;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'display_name' => 'Level Admin',
            'description' => 'Roles Level Admin User',
        ]);

        DB::table('roles')->insert([
            'name' => 'pegawai',
            'display_name' => 'Level Pegawai',
            'description' => 'Roles Level Pegawai',
        ]);

        DB::table('roles')->insert([
            'name' => 'warga',
            'display_name' => 'Level Warga',
            'description' => 'Roles Level Warga',
        ]);

        DB::table('roles')->insert([
            'name' => 'warga',
            'display_name' => 'Level Warga',
            'description' => 'Roles Level Warga',
        ]);

        $user = User::create([
            'name' => "Admin User",
            'email' => "admin@gmail.com",
            'password' => Hash::make($data['123456']),
            ]);
        $user->roles()->attach(1);
    }
}
