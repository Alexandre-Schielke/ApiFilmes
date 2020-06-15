<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiError;
use App\Http\Controllers\Controller;
use App\Model\Classificacao;
use Illuminate\Http\Request;

class ClassificacoesController extends Controller
{
    //Listagem de resgistro da tabela "classificacoes"
    public function index()
    {
        try{
            $response  = Classificacao::select('id','titulo')->get();
            $response = ['data'=>$response, 'sucesso'=> 'Operação efetuada com sucesso'];
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

    //Criação de resgistro na tabela "classificacoes"
    public function store(Request $request)
    {
        try{
            $data = new Classificacao();
            $data->titulo = $request->titulo;
            $data->save();
            $data  = Classificacao::OrderBy('id','DESC')->first();
            $response = ['data'=> $data, 'sucesso'=> 'Operação efetuada com sucesso'];
            return  response()->json($response, 201); //código 201 para produto criado com sucesso
        }catch (\Exception $exception){
            if(config('app.debug')){
                $ex = ApiError::errorMessage($exception->getMessage(), 1010);
                return response()->json(['data'=> $ex['data'], 'error'=> 'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
            }
            $ex = ApiError::errorMessage($exception->getMessage(), 1010);
            return response()->json(['data'=> $ex['data'], 'error' =>'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
        }

    }

    //exibir resgistro da tabela "classificacoes" usando ID
    public function show($id)
    {
        try{
            $response  = Classificacao::where('id',$id)->first();
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

    //exibir resgistro da tabela "classificacoes" usando titulo
    public function showTitulo($titulo)
    {
        try{
            $response  = Classificacao::Where('titulo', 'like', '%' . $titulo . '%')->get();
            $response = ['data'=> $response, 'sucesso'=> 'Operação efetuada com sucesso'];
            return $response;
        }catch (\Exception $exception){
            if(config('app.debug')){
                $ex = ApiError::errorMessage($exception->getMessage(), 1010);
                return response()->json(['data'=> $ex['data'], 'error'=> 'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
            }

            $ex = ApiError::errorMessage($exception->getMessage(), 1010);
            return response()->json(['data'=> $ex['data'], 'error'=> 'Ops, encontramos um erro no modulo de Classificação. Erro interno entre em contato com o seu suporte']);
        }
    }

    //Atualizar resgistro da tabela "classificacoes"
    public function update(Request $request, $id)
    {
        try{
            $data = Classificacao::find($id);
            $data->titulo = $request->titulo;
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

    //Deletar resgistro da tabela "classificacoes"
    public function destroy($id)
    {
        try{
            $data = Classificacao::find($id);
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
