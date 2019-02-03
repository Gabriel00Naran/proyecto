<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Exception;
use App\kilometrage;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class kilometrageController extends Controller
{
    function get(Request $data)
    {
       $id = $data['id'];
       if ($id == null) {
          return response()->json(kilometrage::get(),200);
       } else {
          return response()->json(kilometrage::findOrFail($id),200);
       }
    }

    function paginate(Request $data)
    {
       $size = $data['size'];
       return response()->json(kilometrage::paginate($size),200);
    }

    function post(Request $data)
    {
       try{
          DB::beginTransaction();
          $result = $data->json()->all();
          $kilometrage = new kilometrage();
          $kilometrage->KilometrageInicial = $result['KilometrageInicial'];
          $kilometrage->kilometrageFinal = $result['kilometrageFinal'];
          $kilometrage->save();
          DB::commit();
       } catch (Exception $e) {
          return response()->json($e,400);
       }
       return response()->json($kilometrage,200);
    }

    function put(Request $data)
    {
       try{
          DB::beginTransaction();
          $result = $data->json()->all();
          $kilometrage = kilometrage::where('id',$result['id'])->update([
             'KilometrageInicial'=>$result['KilometrageInicial'],
             'kilometrageFinal'=>$result['kilometrageFinal'],
          ]);
          DB::commit();
       } catch (Exception $e) {
          return response()->json($e,400);
       }
       return response()->json($kilometrage,200);
    }

    function delete(Request $data)
    {
       $result = $data->json()->all();
       $id = $result['id'];
       return kilometrage::destroy($id);
    }
}