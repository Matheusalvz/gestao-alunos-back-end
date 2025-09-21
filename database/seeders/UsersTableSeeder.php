<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $usuarios = [
            [
                'name' => 'Daniel Santos',
                'email' => 'daniel.santos@mail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Juca Silva',
                'email' => 'juca.silva@mail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Luiz Oliveira',
                'email' => 'luiz.oliveira@mail.com',
                'password' => Hash::make('123456'),
            ],
            [
                'name' => 'Alice Matos',
                'email' => 'alice.matos@mail.com',
                'password' => Hash::make('123456'),
            ],
        ];

        foreach ($usuarios as $usuario) {
            User::create($usuario);
        }
    }
}