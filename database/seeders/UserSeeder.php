<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Fulano de Tal',
            'dt_birth' => '1999-03-25'
        ]);

        $user1->addresses()->create([
            'street' => 'Rua Brasil',
            'ad_number' => '321',
            'district' => 'Centro',
            'city' => 'Ribeirão Preto',
            'state' => 'SP',
        ]);

        $user2 = User::create([
            'name' => 'Messias Silva',
            'dt_birth' => '1979-06-09'
        ]);

        $user2->addresses()->create([
            'street' => 'Dezoito',
            'ad_number' => '1252',
            'district' => 'Bela Vista',
            'city' => 'Aracaju',
            'state' => 'SE',
        ]);

        $user3 = User::create([
            'name' => 'João Paulo',
            'dt_birth' => '2000-01-14'
        ]);

        $user3->addresses()->create([
            'street' => 'Amazonas',
            'ad_number' => '6326',
            'district' => 'Industrial',
            'city' => 'Maracanaú',
            'state' => 'CE',
        ]);
    }
}
