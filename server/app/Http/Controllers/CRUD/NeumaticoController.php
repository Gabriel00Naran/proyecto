<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Exception;
use App\Neumatico;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NeumaticoController extends Controller
{
    function get(Request $data)
    {
       $id = $data['id'];
       if ($id == null) {
          return response()->json(Neumatico::get(),200);
       } else {
          return response()->json(Neumatico::findOrFail($id),200);
       }
    }

    function paginate(Request $data)
    {
       $size = $data['size'];
       return response()->json(Neumatico::paginate($size),200);
    }

    function post(Request $data)
    {
       try{
          DB::beginTransaction();
          $result = $data->json()->all();
          $neumatico = new Neumatico();
          $neumatico->Ancho = $result['Ancho'];
          $neumatico->Carga = $result['Carga'];
          $neumatico->velocidad = $result['velocidad'];
          $neumatico->Ring = $result['Ring'];
          $neumatico->Perfil = $result['Perfil'];
          $neumatico->TipoNeumatico = $result['TipoNeumatico'];
          $neumatico->save();
          DB::commit();
       } catch (Exception $e) {
          return response()->json($e,400);
       }
       return response()->json($neumatico,200);
    }

    function put(Request $data)
    {
       try{
          DB::beginTransaction();
          $result = $data->json()->all();
          $neumatico = Neumatico::where('id',$result['id'])->update([
             'Ancho'=>$result['Ancho'],
             'Carga'=>$result['Carga'],
             'velocidad'=>$result['velocidad'],
             'Ring'=>$result['Ring'],
             'Perfil'=>$result['Perfil'],
             'TipoNeumatico'=>$result['TipoNeumatico'],
          ]);
          DB::commit();
       } catch (Exception $e) {
          return response()->json($e,400);
       }
       return response()->json($neumatico,200);
    }

    function delete(Request $data)
    {
       $result = $data->json()->all();
       $id = $result['id'];
       return Neumatico::destroy($id);
    }
}