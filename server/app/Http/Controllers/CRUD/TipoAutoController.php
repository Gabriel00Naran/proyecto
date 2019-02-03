<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Exception;
use App\TipoAuto;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TipoAutoController extends Controller
{
    function get(Request $data)
    {
       $id = $data['id'];
       if ($id == null) {
          return response()->json(TipoAuto::get(),200);
       } else {
          return response()->json(TipoAuto::findOrFail($id),200);
       }
    }

    function paginate(Request $data)
    {
       $size = $data['size'];
       return response()->json(TipoAuto::paginate($size),200);
    }

    function post(Request $data)
    {
       try{
          DB::beginTransaction();
          $result = $data->json()->all();
          $tipoauto = new TipoAuto();
          $tipoauto->Tipo = $result['Tipo'];
          $tipoauto->idAuto = $result['idAuto'];
          $tipoauto->save();
          DB::commit();
       } catch (Exception $e) {
          return response()->json($e,400);
       }
       return response()->json($tipoauto,200);
    }

    function put(Request $data)
    {
       try{
          DB::beginTransaction();
          $result = $data->json()->all();
          $tipoauto = TipoAuto::where('id',$result['id'])->update([
             'Tipo'=>$result['Tipo'],
          ]);
          DB::commit();
       } catch (Exception $e) {
          return response()->json($e,400);
       }
       return response()->json($tipoauto,200);
    }

    function delete(Request $data)
    {
       $result = $data->json()->all();
       $id = $result['id'];
       return TipoAuto::destroy($id);
    }
}