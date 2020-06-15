<?php

namespace App\Http\Controllers\Api;

use App\Api\ApiError;
use App\Model\Generos;
use App\Http\Controllers\Controller;
use App\Model\Usuario;
use Illuminate\Http\Request;

class GenerosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $genero  = Generos::select('id','titulo')->where('ativo', '1')->get();
            return  response()->json(['data'=>$genero, 'status' => 'sucesso']);
        }catch (\Exception $exception){
            if(config('app.debug')){
                $ex = ApiError::errorMessage($exception->getMessage(), 1010);
                return response()->json(['data'=>$ex, 'status' => ['Ops, encontramos um erro no modulo de Gêneros. Erro interno entre em contato com o seu suporte']]);
            }
            $ex = ApiError::errorMessage($exception->getMessage(), 1010);
            return response()->json(['data'=>$ex, 'status' => ['Ops, encontramos um erro no modulo de Gêneros. Erro interno entre em contato com o seu suporte']]);
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
        try{
            $genero = new Generos();
            $genero->titulo = $request->titulo;
            $genero->save();
            $genero = Generos::where('ativo', '1')->orderBy('id','DESC')->first();
            $response = ['data'=> $genero, 'status' => ['sucesso'=> 'Gênero adicionado com sucesso']];
            return  response()->json($response, 201); //código 201 para produto criado com sucesso
        }catch (\Exception $exception){
            if(config('app.debug')){
                $ex = ApiError::errorMessage($exception->getMessage(), 1010);
                return response()->json(['data'=>$ex, 'status' => ['Ops, encontramos um erro no modulo de Gêneros. Erro interno entre em contato com o seu suporte']]);
            }
            $ex = ApiError::errorMessage($exception->getMessage(), 1010);
            return response()->json(['data'=>$ex, 'status' => ['Ops, encontramos um erro no modulo de Gêneros. Erro interno entre em contato com o seu suporte']]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{

            $response  = Generos::where('id',$id)->first();
            $response = ['data'=> $response, 'status' => ['sucesso'=> 'Gênero encontrado com sucesso']];
            return response()->json($response);
        }catch (\Exception $exception){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($exception->getMessage(), 1010));
            }

            return response()->json(ApiError::errorMessage('Ops, encontramos um erro no modulo de Gêneros. Erro interno entre em contato com o seu suporte', 1010));
        }
    }

    public function showTitulo($nome)
    {
        try{
            $response  = Generos::Where('ativo', '1')->where('titulo', 'like', '%' . $nome . '%')->get();
            $response = ['data'=> $response, 'status' => ['sucesso'=> 'Gênero encontrado com sucesso']];
            return $response;
        }catch (\Exception $exception){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($exception->getMessage(), 1010));
            }

            return response()->json(ApiError::errorMessage('Ops, encontramos um erro no modulo de Gêneros. Erro interno entre em contato com o seu suporte', 1010));
        }
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
        try{
            $generos = Generos::find($id);
            $generos->titulo = $request->titulo;
            $generos->save();
            $response = ['data'=> $generos, 'status' => ['sucesso'=> 'usuario atualizado com sucesso']];
            return  response()->json($response, 201); //código 201 para produto criado com sucesso
        }catch (\Exception $exception){
            if(config('app.debug')){
                return response()->json(ApiError::errorMessage($exception->getMessage(), 1010));
            }

            return response()->json(ApiError::errorMessage('Ops, encontramos um erro no modulo de Gêneros. Erro interno entre em contato com o seu suporte', 1010));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $user = Generos::find($id);
            if($user == null){
                return response()->json(['status' => 'Ops, encontramos um erro no modulo de Gênero. Entre com um valor valído'], 400);
            }else{
                Generos::find($id)->delete();
                $response = ['sucesso' => 'Gênero excluido com sucesso'];
                return  $response;
            }
        }catch (\Exception $exception){
            if(config('app.debug')){
                $ex = ApiError::errorMessage($exception->getMessage(), 1010);
                return response()->json(['data'=>$ex, 'status' => ['Ops, encontramos um erro no modulo de usuario. Erro interno entre em contato com o seu suporte']]);
            }
            $ex = ApiError::errorMessage($exception->getMessage(), 1010);
            return response()->json(['data'=>$ex, 'status' => ['Ops, encontramos um erro no modulo de usuario. Erro interno entre em contato com o seu suporte']]);        }

    }

}
