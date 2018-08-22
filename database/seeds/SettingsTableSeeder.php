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
        \App\Setting::create([
          'site_name' => "Laravel's Blog",
          'address' => "Arlington, Texas",
          'contact_number' => '682 123 2567',
          'contact_email' => 'info@laravel_blog.com'
        ]);
    }
}
