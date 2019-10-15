<?php

use Illuminate\Database\Seeder;

class VerbasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deputados = DB::table('deputados')->select('codigo')->get();
        
        foreach($deputados as $res){
                $dpt = $res->codigo;

                for($mes = 0; $mes<= 12; $mes++){
                        $verbas = file_get_contents("http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/legislatura_atual/deputados/$dpt/2019/$mes");
                        $xml = simplexml_load_string($verbas);
        
                        foreach($xml as $verba){
                                foreach($verba->listaDetalheVerba->detalheVerba as $lista){
                                        DB::table('verbas')->insert([
                                            '_id' => $lista->id,
                                            'idDeputado' => $lista->idDeputado ,
                                            'dataReferencia' => $lista->dataReferencia ,
                                            'valorReembolsado' => $lista->valorReembolsado ,
                                        ]);
                                }
                        }
                }
        }
    }
}
