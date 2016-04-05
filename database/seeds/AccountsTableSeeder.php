<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'name' => 'Administrador',
            'amount' => 'admin@correo.com',
            'type' => 'Admin',
            'renovate' => 'Admin',
            'init_date' => '',
            'finish_date' => '',
            'fondo_id' => '1',
        ]);
    }
}
