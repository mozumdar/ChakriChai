<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'about'=>'Laravel Job Portal',
            'contact_number'=>'01757261530',
            'contact_email'=>'mozumdars3@gmail.com'
        ]);
    }
}
