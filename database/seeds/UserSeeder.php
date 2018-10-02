<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
        public function run()
        {
            DB::table('users')->delete();

            DB::table('users')->insert(array(

            'firstname'              => 'Jide',
            'surname'                => 'Moto',
            'username'               => 'motolola',
            'mobilephone'            => '07888777333',
            'businessphone'          => '0766633555',
            'avatar'                 => '1.jpg',
            'country_id'            => '151',
            'about'                  => 'I am a perfect cook with who understands what a great delicacy is, I cook not just to fill, but to also sensitise your taste buds. I do delivery to my local area, but with additional costs.',
            'password'               => bcrypt('Mioj0913'),
            'email'                  => 'motolola@icloud.com',
            'created_at'             => date("Y-m-d H:i:s"),
            'updated_at'             => date('Y-m-d H:i:s')
            ));

            DB::table('users')->insert(array(

                'firstname'              => 'Ati',
                'surname'                => 'Agboola',
                'username'               => 'atilola',
                'mobilephone'            => '07888778833',
                'businessphone'          => '0766677555',
                'avatar'                 => '1.jpg',
                'country_id'            => '151',
                'about'                  => 'I am a perfect cook with who understands what a great delicacy is, I cook not just to fill, but to also sensitise your taste buds. I do delivery to my local area, but with additional costs.',
                'password'               => bcrypt('Mioj0913'),
                'email'                  => 'atilola@icloud.com',
                'created_at'             => date("Y-m-d H:i:s"),
                'updated_at'             => date('Y-m-d H:i:s')
            ));
            DB::table('users')->insert(array(

                'firstname'              => 'Kemi',
                'surname'                => 'Agboola',
                'username'               => 'fakorede',
                'mobilephone'            => '07888448833',
                'businessphone'          => '0760977555',
                'avatar'                 => '1.jpg',
                'country_id'            => '71',
                'about'                  => 'I am a perfect cook with who understands what a great delicacy is, I cook not just to fill, but to also sensitise your taste buds. I do delivery to my local area, but with additional costs.',
                'password'               => bcrypt('Mioj0913'),
                'email'                  => 'fakorede@icloud.com',
                'created_at'             => date("Y-m-d H:i:s"),
                'updated_at'             => date('Y-m-d H:i:s')
            ));
        }
}