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
    
       Solicitacao::create([
            'user_id' => 1,
            'atividade' => 'Palestra de Segurança',
            'descricao' => 'Participação em evento de tecnologia',
            'quantidade_horas' => 20,
            'comprovante' => 'comprovantes/palestra.pdf',
            'status' => 'aprovada'
        ]);

        Solicitacao::create([
            'user_id' => 2,
            'atividade' => 'Feira de Ciências',
            'descricao' => 'Participação como organizadora',
            'quantidade_horas' => 50,
            'comprovante' => 'comprovantes/feira.pdf',
            'status' => 'pendente'
        ]);
        }
    }
