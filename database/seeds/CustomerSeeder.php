<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'identification' => "11111111110",
            'username' =>"test-müşteri",
            'tel' => "11111111111",
            'address'=>"Bursa/test semt test adresi",
            'state'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
