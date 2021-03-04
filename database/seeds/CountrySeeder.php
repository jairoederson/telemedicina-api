<?php


use Illuminate\Support\Facades\DB;

class CountrySeeder extends DatabaseSeeder {

    public function run()
    {
       DB::table('countries');
        $statement = "INSERT INTO ".env('DB_PREFIX')."`countries` (`id`, `sortname`, `name`) VALUES
            
            (1, 'PE', 'Peru');";
        DB::unprepared($statement);

    }

}