<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Hasan",
            'lastname' =>"Demirelli",
            'email' => 'admin@istekapinda.com',
            'password' => Hash::make('Fe50*1999'),
            'image'=>'hasan.png',
            'state'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('users')->insert([
            'name' => "Doğukan",
            'lastname' =>"Yükselen",
            'email' => 'dogukan@istekapinda.com',
            'password' => Hash::make('d.yükselen'),
            'image'=>'dogukan.png',
            'state'=>2,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('users')->insert([
            'name' => "test",
            'lastname' =>"kullanıcı",
            'email' => 'test@istekapinda.com',
            'password' => Hash::make('test123456789'),
            'state'=>2,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
