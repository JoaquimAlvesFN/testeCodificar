<?php

use Illuminate\Database\Seeder;

class RedeSocialTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dpt = DB::table('deputados')->select('codigo')->get();
        foreach($dpt as $deputados){
            $dpts = $deputados->codigo;
            $verbas = file_get_contents("http://dadosabertos.almg.gov.br/ws/deputados/$dpts");
            $xml = simplexml_load_string($verbas);

            foreach($xml->redesSociais->redeSocialDeputado as $socs){
                DB::table('redeSociais')->insert([
                    'codigo_deputado' => $xml->id,
                    'cod_rede_social' => $socs->redeSocial->id,
                    'nome' => $socs->redeSocial->nome,
                ]);
            }
        }
    }
}
