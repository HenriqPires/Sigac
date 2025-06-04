<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Aluno;

class UserAlunoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = User::create([
        'name' => 'Aluno Teste',
        'email' => 'aluno@example.com',
        'password' => Hash::make('senha123'), // Senha
        'tipo' => 'aluno',
    ]);

    Aluno::create([
        'nome' => 'Aluno Teste',
        'cpf' => '123.456.789-00',
        'email' => 'aluno@example.com',
        'senha' => 'senha123',
        'user_id' => $user->id,
        'curso_id' => 1, // IDs válidos existentes
        'turma_id' => 1,
    ]);
    }
}
