<?php
use App\Language;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Language::truncate();
        Language::create([
            'name' => 'English',
            'folder' => 'en',
            'author' => 'Marcel',
            'site_title' => 'Multi langue et traduction avec Laravel',
            'site_keywords' => 'laravel, lessons, educations',
            'site_description' => 'Translation Manage',
            'flag' => '/backend/standard_lang_flag/en.png',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
