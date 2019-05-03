<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\Model\DoctorModel::class,20)->create();
        factory(App\User::class,20)->create();
        factory(App\Model\PotencyModel::class,100)->create();
        factory(App\Model\YogaListModel::class,10)->create();
        factory(App\Model\PhysiotherapylistModel::class,10)->create();
        factory(App\Model\TherapyDiseaseModel::class,10)->create();
       // factory(App\Model\OpdModel::class,1000)->create();

    }
}
