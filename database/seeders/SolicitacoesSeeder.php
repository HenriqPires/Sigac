<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

use App\Models\Solicitacao;
use App\Models\User;

class SolicitacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    
        $aluno = User::where('tipo', 'aluno')->first();

        if (!$aluno) {
            $this->command->warn('Nenhum aluno encontrado. Por favor, cadastre um aluno com tipo "aluno" antes de rodar este seeder.');
            return;
        }

        
        $solicitacoes = [
            [
                'atividade' => 'Palestra de Tecnologia',
                'descricao' => 'Participação em palestra sobre inovação em TI.',
                'quantidade_horas' => 10,
                'status' => 'pendente',
            ],
            [
                'atividade' => 'Curso de Extensão',
                'descricao' => 'Curso de Desenvolvimento Web com Laravel.',
                'quantidade_horas' => 20,
                'status' => 'aprovada',
            ],
            [
                'atividade' => 'Organização de Evento',
                'descricao' => 'Auxílio na organização da semana acadêmica.',
                'quantidade_horas' => 15,
                'status' => 'rejeitada',
            ],
        ];

        foreach ($solicitacoes as $dados) {
            Solicitacao::create([
                'user_id' => $aluno->id,
                'atividade' => $dados['atividade'],
                'descricao' => $dados['descricao'],
                'quantidade_horas' => $dados['quantidade_horas'],
                'status' => $dados['status'],
                'comprovante' => null,
            ]);
        }
    }
}