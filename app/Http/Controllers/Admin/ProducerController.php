<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProducerRequest;
use Illuminate\Http\Request;
use App\Models\Producer;
use Exception;

class ProducerController extends Controller
{
    /**
     * Lista todos os registros que está salvos
     * no banco de dados.
     */
    public function index()
    {
        $producers = Producer::all();
        return response()->json($producers);
    }

    /**
     * Salva novos registros
     * no banco de dados.
     */
    public function store(ProducerRequest $request)
    {
        $request->validated();
        try{
            $producer = new Producer();
            $producer->nameProducer = $request->input('nameProducer');
            $producer->cpfProducer = $request->input('cpfProducer');
            $producer->save();
            return response()->json(['message' => 'Produtor cadastrado com sucesso!'], 201);
        }catch(Exception $exception){
            return response()->json(['message' => 'Erro ao cadastrar produtor!'], 500);
        }
    }

    /**
     * Salva atualizações cadastrais específica
     * no banco de dados.
     */
    public function update(ProducerRequest $request, $id)
    {
        if(!$producer = Producer::find($id)){
            return response()->json([
                'message' => 'Produtor não encontrado!',
            ]);
        }
        $form = $request->validated();
        try{
            $producer->nameProducer = $form['nameProducer'];
            $producer->cpfProducer = $form['cpfProducer'];
            $producer->save();
            return response()->json(['message' => 'Produtor atualizar com sucesso!'], 201);
        }catch(Exception $exception){
            return response()->json(['message' => 'Erro ao atualizar o produtor!'], 500);
        }
    }

    /**
     * Apaga registro específico no banco de dados.
     */
    public function destroy($id)
    {
        if(!$producer = Producer::find($id)){
            return response()->json([
                'message' => 'Produtor não encontrado!',
            ], 404);
        }
        try{
            $producer->delete();
            return response()->json(['message' => 'Produtor apagado com sucesso!'], 201);
        }catch(Exception $exception){
            return response()->json(['messagem' => 'Erro ao apagar produtor!'], 500);
        }
    }

    #Filtra produtor pelo ID
    public function filter($id)
    {
        if(!$producer = Producer::find($id)){
            return response()->json(['message' => 'Produtor não encontrado!'], 404);
        }
        return response()->json($producer);
    }
}
