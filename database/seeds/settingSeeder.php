<?php

use Illuminate\Database\Seeder;

class settingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\FrontendSetting::create([

            'logo' => 'logo.png',
            'site_title' => 'Laravel block Application',
            'site_about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae similique doloremque cum repudiandae saepe, quas quia natus illum minima nam magnam eaque ',
            'copyright' =>'Copyright © 2014-2020 Develope by MD Munirujjaman. All rights reserved. ',
            'facebook' => 'https://www.facebook.com/Munirujjaman.mone',
            'twitter' => 'https://twitter.com/MdMunirujjaman5',
            'instagram' => 'https://www.instagram.com/mdmunirujjaman045/',
            'gmail' => 'mdmunirujjaman045@gmail.com',
            'phone' => '01518488865',
            'address' => '203 Fake St. Mountain View, San Francisco, California, USA',
        ]);
    }
}
