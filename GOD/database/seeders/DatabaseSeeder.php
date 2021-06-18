<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Aluno;
use App\Models\Turma;
use App\Models\Escola;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        // for ($t=0; $t < 6; $t++) { 
        //     DB::table('escolas')->insert([
        //         'nome' => 'Escola '.Str::random(10),
        //         'morada' => Str::random(2),
        //         'concelho' => Str::random(2),
        //         'codpost' => Str::random(2),
        //         'telef' => Str::random(2),
        //         'fax' => Str::random(2),
        //         'email' => Str::random(2),
        //         'representante' => Str::random(2),
        //     ]);

        //     for ($i=0; $i < 10; $i++) { 
        //         DB::table('turmas')->insert([
        //             'ano' => random_int(1,12).'º',
        //             'codTurma' => Str::random(2),
        //             'escola_id' => Escola::all()->reverse()->pluck('id')->first()
        //         ]);

        //         for ($x=0; $x < 30; $x++) { 
        //             DB::table('alunos')->insert([
        //                 'nome' => Str::random(15),
        //                 'datanasc' => '2021-06-16',
        //                 'email' => Str::random(10),
        //                 'nif' => Str::random(10),
        //                 'telef' => Str::random(10),
        //                 'morada' => Str::random(10),
        //                 'concelho' => Str::random(10),
        //                 'codpost' => Str::random(10),
        //                 'cc' => Str::random(10),            
        //             ]);

        //             DB::table('aluno_turma')->insert([
        //                 'aluno_id' => Aluno::all()->reverse()->pluck('id')->first(),
        //                 'turma_id' => Turma::all()->reverse()->pluck('id')->first()
        //             ]);
        //         }               
        //     }
        // }

        for ($i=0; $i < 5000; $i++) { 
            DB::table('ocorrencias')->insert([
                'aluno_id' => random_int(1,1799),
                'data' => '2021-'.strval(random_int(1,12)).'-18 11:29:00',
                'descricao' => Str::random(10),
                'decisao' => Str::random(10),
                'frequencia' => Str::random(10),
                'comport_inc' => Str::random(10),
                'cod_p' => '1',
                'estado' => 'Pendente'

            ]);
        }
    }
}
