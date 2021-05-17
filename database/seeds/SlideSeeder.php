<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            'image'=>'1.png',
            'title'=>"Bursa'nın En Hızlı Servisi istekapında",
            'description'=>"Bursa içi kargo teslimatı ve alışveriş hizmetimizle hizmetinizdeyiz.",
            'url'=>"",
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('slides')->insert([
            'image'=>'2.png',
            'title'=>"Bir telefonla Kuryen kapında",
            'description'=>"İletişim kanallarımızdan bize ulaşabilir kolayca fiyat bilgisi alabilir kurye isteyebilirsiniz.",
            'url'=>"",
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('slides')->insert([
            'image'=>'3.png',
            'title'=>"Zamanında Teslimat ",
            'description'=>"Kargolarınızı ve Siparişlerinizi istediğiniz saat aralığında kapınızdan alıp istediğiniz adrese istediğiniz saatte teslim ediyoruz",
            'url'=>"",
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);
        DB::table('slides')->insert([
            'image'=>'4.png',
            'title'=>"Hijyenik Teslimat",
            'description'=>"Kuryelerimiz teslimatları alırken ve teslim ederken tüm hijyen ve mesafe kurallarını titizlikle uygular ve en güvenli şekilde teslimat sağlanır.",
            'url'=>"",
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

    }
}
