<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class RedesSociaisController extends Controller
{
    public function index(){
        $redes = DB::table('redeSociais')
                    ->select(DB::raw('count(*) as Deputados_que_utilizam, nome AS Rede_Social'))
                    ->groupBy('nome')
                    ->orderBy('Deputados_que_utilizam', 'DESC')
                    ->get();

        return response()->json($redes);
    }
}
