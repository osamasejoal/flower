<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CompanyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_infos')->insert([
            'name'          => 'Osama Sejoal',
            'title'         => 'The Web Developer',
            'doamin_name'   => 'https://www.osamasejoal.com/',
            'mail'          => 'osamasejoal@mail.com',
            'description'   => "Hi. Myself Osama Sejoal. I'm a Backend web developer. I used Laravel (php framework) to develop a website and Mysql for database.",
            'phone'         => '+880 16 2193 9971',
            'call_time'     => 'Mon-Fri 9am-5pm',
            'city'          => 'Dhaka',
            'country'       => 'Bangladesh',
            'location'      => '32/9, Kuratoli, Khilkhet, Dhaka, Bangladesh',
            'logo'          => 'company_logo.png',
            'developed_by'  => 'Osama Sejoal',
            'created_at'    => Carbon::now(),
        ]);
    }
}
