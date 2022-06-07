<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            'title' => "Hey!, I'm Osama",
            'description' => "I'm a Laravel developer, I can web design also. If you want to Hire me, please get in touch.",
            'created_at' =>Carbon::now(),
        ]);
    }
}
