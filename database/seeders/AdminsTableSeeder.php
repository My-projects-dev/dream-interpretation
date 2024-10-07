<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
            \DB::table('users')->delete();

            \DB::table('users')->insert(array (
                0 =>
                    array (
                        'id' => 1,
                        'name' => 'Anar',
                        'email' => 'admin@admin.az',
                        'email_verified_at' => null,
                        'password' => '$2a$12$zvG9Z7p/fs/kB1qWIbhkj.66udPnV/rt1HL1vDCs4btdjYJAdoSDW',
                        'remember_token' => null,
                        'created_at' => '2024-04-04 16:18:14',
                        'updated_at' => '2024-04-24 16:18:14',
                    ),
            ));
    }
}
