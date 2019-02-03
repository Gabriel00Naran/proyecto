<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Exception;
use App\Auto;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AutoController extends Controller
{
    function get(Request $data)
    {
       $id = $data['id'];
       if ($id == null) {
          return response()->json(Auto::get(),200);
       } else {
          return response()->json(Auto::findOrFail($id),200);
       }
    }

    function paginate(Request $data)
    {
       $size = $data['size'];
       return response()->json(Auto::paginate($size),200);
    }

    function post(Request $data)
    {
       try{
          DB::beginTransaction();
          $result = $data->json()->all();
          $auto = new Auto();
          $auto->Placa = $result['Placa'];
          $auto->Matricula = $result['Matricula'];
          $auto->Tiempo Inicial = $result['Tiempo Inicial'];
          $auto->Tiempo Final = $result['Tiempo Final'];
          $auto->idNeumatico = $result['idNeumatico'];
          $auto->save();
          DB::commit();
       } catch (Exception $e) {
          return response()->json($e,400);
       }
       return response()->json($auto,200);
    }

    function put(Request $data)
    {
       try{
          DB::beginTransaction();
          $result = $data->json()->all();
          $auto = Auto::where('id',$result['id'])->update([
             'Placa'=>$result['Placa'],
             'Matricula'=>$result['Matricula'],
             'Tiempo Inicial'=>$result['Tiempo Inicial'],
             'Tiempo Final'=>$result['Tiempo Final'],
          ]);
          DB::commit();
       } catch (Exception $e) {
          return response()->json($e,400);
       }
       return response()->json($auto,200);
    }

    function delete(Request $data)
    {
       $result = $data->json()->all();
       $id = $result['id'];
       return Auto::destroy($id);
    }
}