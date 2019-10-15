<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerbasController extends Controller
{
    public function index()
    {
        $deputados = DB::table('deputados')->select('codigo')->get();

            foreach($deputados as $dpt)
            {
                $verbas = DB::table('verbas')
                ->join('deputados', 'verbas.idDeputado', '=', 'deputados.codigo')
                ->select(DB::raw('SUM(valorReembolsado) AS Valor_Total, deputados.nome AS Deputado, idDeputado AS Id_Deputado'))
                ->groupBy('idDeputado')
                ->orderBy('Valor_Total', 'DESC')    
                ->limit(5)
                ->get();

                return response()->json($verbas);
            }
    }
}
