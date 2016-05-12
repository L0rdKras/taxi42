<?php

use Illuminate\Database\Seeder;

class RouteSheetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('route_sheet')->insert([
            'amount' => '1000',
        ]);
    }
}
