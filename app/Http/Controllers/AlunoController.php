<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Alunos as AlunosResouce;
use App\Models\Alunos;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return AlunosResouce::collection(Alunos::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $aluno = new ALunos;

        $validator = Validator::make($request->all(), ([
            "nome" => "required|max:200",
            "cpf" => "required|max:20|unique:alunos",
            "email" => "required",
            "rg" => "required|max:20|unique:alunos",
            "celular" => "required|max:20",
            "endereco" => "required",
            "password" => "required"
        ]));
        
        $aluno->nome = $request->nome;
        $aluno->email = $request->email;
        $aluno->cpf = $request->cpf;
        //Hash de senha para não guardar a senha em texto aberto no banco
        $aluno->password = Hash::make($request->password);
        $aluno->rg = $request->rg;
        $aluno->celular = $request->celular;
        $aluno->telefone = $request->telefone;
        $aluno->endereco = $request->endereco;
        
        if ($validator->fails()) {
            return response()->json([
                'detalhes_de_erro' => $validator->errors()
            ]);

        } else {
            $aluno->save();

            return response([
                "mensagem" => "Aluno cadastrado com sucesso!"
            ]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        $aluno = Alunos::where("email", $request->email)->first();
                
        if(!$aluno || !Hash::check($request->password, $aluno->password)) {
            return response("tá errado", 503);
        }
        


        return $aluno->createToken($request->header('User-Agent'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $aluno_id = $request->aluno;
        $aluno = Alunos::where("aluno_id", $aluno_id)->get();
    
        $aluno_count = $aluno->count();

        dd($request);

        if($aluno_count < 1) {
            return response()->json([
                "status" => "aluno não encotrado"
            ]);

        } else {
            return AlunosResouce::collection($aluno);

        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $to_destroy = Alunos::where("aluno_id", $request->aluno_id);

        $aluno_count = $to_destroy->count();

        if($aluno_count == 1) {
            $to_destroy->delete();

            return response()->json([
                "mensagem" => "Aluno excluido com sucesso!"
            ]);

        } else if($aluno_count < 1) {
            return response()->json([
                "mensagem" => "Não se pode excluir o que não existe!"
            ]);
        }
    }
}
