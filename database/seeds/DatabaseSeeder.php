<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard() does temporarily disable the mass assignment protection of the model, so you can seed all model properties.

        Model::unguard();
         $this->call(LanguageSeeder::class);
        Model::reguard();
    }
}
