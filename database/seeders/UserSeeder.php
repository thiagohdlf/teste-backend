<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Dados para criar usuário
        $dados = [
            'name' => 'Administrador',
            'email' => 'admin@nice.com.br',
            'password' => '123456',
        ];

        //Verifica se usuário já existe
        if(User::where('email', $dados['email'])->exists()){
            echo 'Usuário já existe!';
        }else{
            //Cria o usuário
            User::create($dados);
            echo 'Usuário cadastrado!';
        }
    }
}
