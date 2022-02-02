<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiLoginController extends Controller
{
    /**
     * 
     * @return Illuminate\Http\Reponse
     */
    public function login(Request $request)
    {
        $credentiaisDoAluno = $request->only('email', 'senha');
        
        $senha = "gato";
        
        if($credentiaisDoAluno['senha'] != $senha) {
            return response()->json([
                "tá" => "errado"
            ]);

        } else {
            return response()->json([
                "senha" => "senha"
            ]);
        }
    }
}
