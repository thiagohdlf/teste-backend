<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyRequest;
use Illuminate\Http\Request;
use App\Models\Property;
use Exception;

class PropertyController extends Controller
{
    /**
     * Lista todos os registros que está salvos
     * no banco de dados
     */
    public function index()
    {
        $properties = Property::all();
        return response()->json($properties);
    }

    /**
     * Salva novos registros
     * no banco de dados
     */
    public function store(PropertyRequest $request)
    {
        $request->validated();
        try{
            $property = new Property();
            $property->nameProperty = $request->input('nameProperty');
            $property->ruralRegistration = $request->input('ruralRegistration');
            $property->save();
            return response()->json(['message' => 'Propriedade cadastrada com sucesso!'], 201);
        }catch(Exception $exception){
            return response()->json(['message' => 'Erro ao cadastrar propriedade!'], 500);
        }
    }

    /**
     * Salva atualizações cadastrais específica
     * no banco de dados
     */
    public function update(PropertyRequest $request, $idProperty)
    {
        if(!$property = Property::find($idProperty)){
            return response()->json([
                'message' => 'Propiedade não encontrada',
            ]);
        }
        $form = $request->validated();
        try{
            $property->nameProperty = $form['nameProperty'];
            $property->ruralRegistration = $form['ruralRegistration'];
            $property->save();
            return response()->json(['message' => 'Propriedade atualizada com sucesso!'], 201);
        }catch(Exception $exception){
            return response()->json(['message' => 'Erro ao atualizar propriedade!'], 500);
        }
    }

    /**
     * Apaga registro específico no banco de dados
     */
    public function destroy($idProperty)
    {
        if(!$property = Property::find($idProperty)){
            return response()->json([
                'message' => 'Propriedade não encontrada!',
            ], 404);
        }
        try{
            $property->delete();
            return response()->json(['message' => 'Propriedade apagada com sucesso!'], 201);
        }catch(Exception $exception){
            return response()->json(['message' => 'Erro ao apagar propriedade!'], 500);
        }
    }

    #Filtra propiedade pelo ID
    public function filter($idProperty)
    {
        if(!$property = Property::find($idProperty)){
            return response()->json(['message' => 'Propriedade não encontrada!']);
        }
        return response()->json($property);
    }
}
