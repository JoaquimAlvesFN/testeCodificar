<?php

use Illuminate\Database\Seeder;

class DeputadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deputados = file_get_contents('http://dadosabertos.almg.gov.br/ws/deputados/em_exercicio');
        $xml = simplexml_load_string($deputados);

        foreach($xml as $registro){
            DB::table('deputados')->insert([
                'codigo' => $registro->id,
                'nome' => $registro->nome,
                'partido' => $registro->partido,
                'tagLocalizacao' => $registro->tagLocalizacao
            ]);
        }
    }
}
