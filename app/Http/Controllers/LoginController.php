<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Alunos;

class LoginController extends Controller
{
    /**
     * Fazer o login!
     * @return Illuminate\Http\Response
     * @param token
     */

    public function login(Request $request)
    {
        $credenciais_aluno = Alunos::where("email", $request->email)->first();

        if ($credenciais_aluno->count() < 1) {
            return response()->json([
                "mensagem" => "O email informado está incorreto"
            ]);

        } else if ($credenciais_aluno->count() == 1) {
            if (Hash::check($request->password, $credenciais_aluno->password) ) {
                $token['token'] = $credenciais_aluno->createToken($credenciais_aluno->email);
                
                return $token;
                
            } else {
                return response()->json([
                    "mensagem" => "senha está errada"
                ]);
            }
        }
    }

    /**
     * Logout para fazer logout
     * @return Illuminate\Http\Response
     */

     public function logout(Request $request)
     {

     }
}
