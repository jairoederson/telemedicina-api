<?php

use Illuminate\Database\Seeder;

class ExamenAnalysisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\ExamenAnalysis::class, 10)->create();
    }
}
