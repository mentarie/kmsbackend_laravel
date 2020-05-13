<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KMS;
class KmsController extends Controller
{
    public function index()
    {
        $data = Kms::all();
        return response()->json([
            'status' => 'Success',
            'size' => sizeof( $data),
            'data' => [
                'kms' =>  $data->toArray()
            ],
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'age'=>'required',
            'weight'=>'required',
            'height'=>'required',
            'institution'=>'required',
            'location'=>'required',
        ]);
        $kms = new KMS([
            'name'=>$request->input('name'),
            'age' => $request->input('age'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'institution' => $request->input('institution'),
            'location' => $request->input('location')
        ]);
        $kms->save();

        return response()->json([
            'status' => 'Success',
            'data' => [
                'kms' =>  $kms->toArray()
            ],
        ]);
    }
    public function delete($id)
    {
        KMS::where('id',$id)->delete();
        return response()->json([
            'status' => 'Success',
            'message' => 'deleted success'
        ],200);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'age'=>'required',
            'weight'=>'required',
            'height'=>'required',
            'institution'=>'required',
            'location'=>'required',
        ]);
        $data = [
            'name'=>$request->input('name'),
            'age' => $request->input('age'),
            'weight' => $request->input('weight'),
            'height' => $request->input('height'),
            'institution' => $request->input('institution'),
            'location' => $request->input('location')
        ];
        KMS::where('id',$id)->update($data);
        return response()->json([
            'status' => 'Success',
            'message' => 'update success'
        ],200);
    }
}
