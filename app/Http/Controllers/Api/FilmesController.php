<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiError;
use App\Http\Controllers\Controller;
use App\Model\Classificacao;
use App\Model\Filme;
use App\Model\Rel_filme_users;
use App\Model\Usuario;
use Illuminate\Http\Request;

class FilmesController extends Controller
{
    //Listagem de resgistro da tabela "filmes"
    public function index()
    {
        try{
            $response  = Filme::select('id','titulo')->get();
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


    public function store(Request $request)
    {
        try{
            $data = new Filme();
            $data->titulo = $request->titulo;
            $data->classificacao_id = $request->classificacao;
            $data->ano_lancamento = $request->ano;
            $data->genero = $request->genero;
            $data->save();
            $data  = Filme::OrderBy('id','DESC')->first();
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


    public function show($id)
    {
        try{
            $response  = Filme::select('filmes.id', 'classificacoes.titulo as classificacao_titulo', 'filmes.titulo', 'filmes.ano_lancamento', 'filmes.genero')
            ->rightJoin('classificacoes', 'filmes.classificacao_id', '=', 'classificacoes.id')
            ->where('filmes.id', '=',$id)
            ->get();


            $datas = Rel_filme_users::where('filme_id',$id)->get();
            $arr = '';
            foreach ($datas as $data){
                $arr .= $data->user_id .'.';
            }
            $arr =  substr($arr, 0, -1);
            $arr = explode('.',$arr);

            $user = Usuario::select('name', 'perfil')->whereIn('id', $arr)->get();


            $response = ['data'=> ['filme' => $response, 'elenco' => $user], 'sucesso'=> 'Operação efetuada com sucesso'];
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
            $response  = Filme::select('filmes.id', 'classificacoes.titulo as classificacao_titulo', 'filmes.titulo', 'filmes.ano_lancamento', 'filmes.genero')
                ->rightJoin('classificacoes', 'filmes.id', '=', 'classificacoes.id')
                ->Where('filmes.titulo', 'like', '%' . $titulo . '%')
                ->first();


            $datas = Rel_filme_users::where('filme_id', $response->id)->get();
            $arr = '';
            foreach ($datas as $data){
                $arr .= $data->user_id .'.';
            }
            $arr =  substr($arr, 0, -1);
            $arr = explode('.',$arr);

            $user = Usuario::select('name', 'perfil')->whereIn('id', $arr)->get();


            $response = ['data'=> ['filme' => $response, 'elenco' => $user], 'sucesso'=> 'Operação efetuada com sucesso'];
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


     public function update(Request $request, $id)
    {
        try{
            $data = Filme::find($id);
            $data->titulo = $request->titulo;
            $data->classificacao_id = $request->classificacao;
            $data->ano_lancamento = $request->ano;
            $data->genero = $request->genero;
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


    public function destroy($id)
    {
        try{
            $data = Filme::find($id);
            if($data == null){
                $response = ['error' => 'Registro não encontrado'];
                return response()->json($response, 400);
            }else{

                $rel = Rel_filme_users::where('filme_id', $id)->get();
                if(count($rel) != 0){
                   $rel->delete();
                }

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
