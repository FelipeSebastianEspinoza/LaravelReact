<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
 
    public function run()
    {
          $this->call(WalletsTableSeeder::class);
          $this->call(TransferTableSeeder::class);
    }
}
