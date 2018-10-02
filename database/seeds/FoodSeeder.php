<?php


use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder {

    public function run()
    {
        DB::table('portions')->delete();
        DB::table('food')->delete();

        DB::table('food')->insert(array(

            'name'                   => 'Rice',
            'description'            => 'Rice, very popular around the world',
            'photo'                  => '1.jpg',
            'user_id'                => '2',
            'slug'                   => 'rice',
            'created_at'             => date("Y-m-d H:i:s"),
            'updated_at'             => date('Y-m-d H:i:s')
        ));
        DB::table('food')->insert(array(

            'name'                   => 'Moin Moin',
            'description'            => 'Made from beans',
            'photo'                  => '2.jpg',
            'user_id'                => '2',
            'slug'                   => 'moin-moin',
            'created_at'             => date("Y-m-d H:i:s"),
            'updated_at'             => date('Y-m-d H:i:s')
        ));
        DB::table('food')->insert(array(

            'name'                   => 'Asaro (Mashed yam)',
            'description'            => 'Nicely cooked from the best yam ever',
            'photo'                  => '2.jpg',
            'user_id'                => '3',
            'slug'                   => 'asaro-mashed-yam',
            'created_at'             => date("Y-m-d H:i:s"),
            'updated_at'             => date('Y-m-d H:i:s')
        ));
        DB::table('food')->insert(array(

            'name'                   => 'Beef Pepper soup',
            'description'            => 'Nicely done pepper spiced soup',
            'photo'                  => '2.jpg',
            'user_id'                => '1',
            'slug'                   => 'Beef-Pepper-soup',
            'created_at'             => date("Y-m-d H:i:s"),
            'updated_at'             => date('Y-m-d H:i:s')
        ));
        DB::table('food')->insert(array(

            'name'                   => 'Fish Pepper soup',
            'description'            => 'Nicely done pepper spiced soup',
            'photo'                  => '2.jpg',
            'user_id'                => '1',
            'slug'                   => 'Fish-Pepper-soup',
            'created_at'             => date("Y-m-d H:i:s"),
            'updated_at'             => date('Y-m-d H:i:s')
        ));
        DB::table('food')->insert(array(

            'name'                   => 'Akara (Beans cake)',
            'description'            => 'Fried in vegetable oil',
            'photo'                  => '2.jpg',
            'user_id'                => '1',
            'slug'                   => 'Akara-Beans-cake',
            'created_at'             => date("Y-m-d H:i:s"),
            'updated_at'             => date('Y-m-d H:i:s')
        ));
    }

}