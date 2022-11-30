<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create(['name' => 'Arabic' ,'code' => 'ar' ,'icon' =>'EG']);
        Language::create(['name' => 'English' ,'code' => 'en' ,'icon' =>'UK']);

    }
}
