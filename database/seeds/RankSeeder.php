<?php

use Illuminate\Database\Seeder;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ranks')->delete();

        DB::table('ranks')->insert(array(

            'name'             => 'Cadet',
            'points'            => '3',
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date('Y-m-d H:i:s')
        ));
        DB::table('ranks')->insert(array(

            'name'             => 'Second Lieutenant',
            'points'            => '10',
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date('Y-m-d H:i:s')
        ));
        DB::table('ranks')->insert(array(

            'name'             => 'Lieutenant',
            'points'            => '100',
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date('Y-m-d H:i:s')
        ));
        DB::table('ranks')->insert(array(

            'name'             => 'Captain',
            'points'            => '250',
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date('Y-m-d H:i:s')
        ));
        DB::table('ranks')->insert(array(

            'name'             => 'Major',
            'points'            => '500',
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date('Y-m-d H:i:s')
        ));
        DB::table('ranks')->insert(array(

            'name'             => 'Lieutenant Colonel',
            'points'            => '1000',
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date('Y-m-d H:i:s')
        ));
        DB::table('ranks')->insert(array(

            'name'             => 'Colonel',
            'points'            => '5000',
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date('Y-m-d H:i:s')
        ));
        DB::table('ranks')->insert(array(

            'name'             => 'Brigadier',
            'points'            => '20000',
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date('Y-m-d H:i:s')
        ));
        DB::table('ranks')->insert(array(

            'name'             => 'Major General',
            'points'            => '50000',
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date('Y-m-d H:i:s')
        ));
        DB::table('ranks')->insert(array(

            'name'             => 'Lieutenant General',
            'points'            => '100000',
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date('Y-m-d H:i:s')
        ));
        DB::table('ranks')->insert(array(

            'name'             => 'General',
            'points'            => '500000',
            'created_at'       => date("Y-m-d H:i:s"),
            'updated_at'       => date('Y-m-d H:i:s')
        ));
    }
}
