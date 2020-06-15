<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Usuario;
use App\Api\ApiError;
use http\Client\Curl\User;
use Illuminate\Http\Request;


class UsersController extends Controller
{

    // Listagem de usuário
    public function index()
    {
        try{
            $response  = Usuario::select('id','name as nome', 'perfil')->get();
            $response = ['data'=>$response , 'sucesso'=> 'Operação efetuada com sucesso'];
            return  response()->json($response, 200);
        }catch (\Exception $exception){
            if(config('app.debug')){
                $ex = ApiError::errorMessage($exception->getMessage(), 1010);
                return response()->json(['data'=> $ex['data'], 'error'=> 'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
            }
            $ex = ApiError::errorMessage($exception->getMessage(), 1010);
            return response()->json(['data'=> $ex['data'], 'error'=> 'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
        }

    }

    // Criação de usuário
    public function store(Request $request)
    {
        try{
            $data = new Usuario();
            $data->name = $request->nome;
            $data->perfil = $request->perfil;
            $data->save();
            $data = Usuario::orderBy('id','DESC')->first();
            $response = ['data'=> $data, 'sucesso'=> 'Operação efetuada com sucesso'];
            return  response()->json($response, 201); //código 201 para produto criado com sucesso
        }catch (\Exception $exception){
            if(config('app.debug')){
                $ex = ApiError::errorMessage($exception->getMessage(), 1010);
                return response()->json(['data'=> $ex['data'], 'error'=> 'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
            }
            $ex = ApiError::errorMessage($exception->getMessage(), 1010);
            return response()->json(['data'=> $ex['data'], 'error'=> 'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
        }

    }

    // View do usuário atravês da busca por ID
    public function show($id)
    {
        try{

            $response  = Usuario::where('id',$id)->first();
            $response = ['data'=> $response, 'sucesso'=> 'Operação efetuada com sucesso'];
            return response()->json($response);
        }catch (\Exception $exception){
            if(config('app.debug')){
                $ex = ApiError::errorMessage($exception->getMessage(), 1010);
                return response()->json(['data'=> $ex['data'], 'error'=> 'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
            }

            $ex = ApiError::errorMessage($exception->getMessage(), 1010);
            return response()->json(['data'=> $ex['data'], 'error'=> 'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
        }

    }

    // View do usuário atravês da busca por Nome
    public function showNome($nome)
    {
        try{
            $response  = Usuario::where('name', 'like', '%' . $nome . '%')->first();
            $response = ['data'=> $response, 'sucesso'=> 'Operação efetuada com sucesso'];
            return response()->json($response);
        }catch (\Exception $exception){
            if(config('app.debug')){
                $ex = ApiError::errorMessage($exception->getMessage(), 1010);
                return response()->json(['data'=> $ex['data'], 'error'=> 'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
            }

            $ex = ApiError::errorMessage($exception->getMessage(), 1010);
            return response()->json(['data'=> $ex['data'], 'error'=> 'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
        }
    }

    //Atualização do usuário
    public function update(Request $request, $id)
    {
        try{
            $data = Usuario::find($id);
            $data->name = $request->nome;
            $data->perfil = $request->perfil;
            $data->save();
            $response = ['data'=> $data, 'sucesso'=> 'Operação efetuada com sucesso'];
            return  response()->json($response, 201); //código 201 para produto criado com sucesso
        }catch (\Exception $exception){
            if(config('app.debug')){
                $ex = ApiError::errorMessage($exception->getMessage(), 1010);
                return response()->json(['data'=> $ex['data'], 'error'=> 'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
            }

            $ex = ApiError::errorMessage($exception->getMessage(), 1010);
            return response()->json(['data'=> $ex['data'], 'error'=> 'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
        }
    }

    // Apagar rgistro da tabela usuário
    public function destroy($id)
    {
        try{
            $data = Usuario::find($id);
            if($data == null){
                $response = ['error' => 'Registro não encontrado'];
                return response()->json($response, 400);
            }else{
                $data->delete();
                $response = ['sucesso' => 'Operação efetuada com sucesso'];
                return response()->json($response, 201);
            }
        }catch (\Exception $exception){
            if(config('app.debug')){
                $ex = ApiError::errorMessage($exception->getMessage(), 1010);
                return response()->json(['data'=> $ex['data'], 'error'=> 'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
            }
            $ex = ApiError::errorMessage($exception->getMessage(), 1010);
            return response()->json(['data'=> $ex['data'], 'error'=> 'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
        }

    }
}
