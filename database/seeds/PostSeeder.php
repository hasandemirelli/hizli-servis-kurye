<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'code'=>"T-123456789",
            'type'=>1,
            'sender'=>1,
            'posted_address'=>"Bursa/Yıldırım Test gönderici adresi",
            'receiver'=>1,
            'receiver_address'=>"Bursa/Yıldırım Test teslimat adresi",
            'note'=>'test kargo siparişi ',
            'payment'=>'Gönderen öder',
            'total'=>12,
            'importance'=>1,
            'user_id'=>2,
            'state'=>1,
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
    }
}
