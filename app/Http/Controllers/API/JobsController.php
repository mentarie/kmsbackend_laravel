<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobsController extends Controller
{
    public function index()
    {
        $data = Jobs::get();
    
        return response()->json($data);
    }

    public function show($id)
    {
        $data = Jobs::findOrFail($id);
    
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|min:5|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = [
            'name' => $request->input('name'),
        ];

        
        Jobs::create($data);

        return response()->json([
            'status' => 'success'
        ]);
        
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required|min:5|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $data = [
            'name' => $request->input('name'),
        ];

        $jobs = Jobs::where('id_jobs',$id)->update($data);

        if($jobs){
            return response()->json([
                'status' => 'success',
            ]);
        }else{
            return response()->json([
                'status' => 'error, data tidak ada',
            ]);
        }
    }


    public function destroy($id)
    {
        $jobs = Jobs::where('id_jobs',$id)->delete();
        if($jobs){
            return response()->json([
                'status' => 'success',
            ]);
        }else{
            return response()->json([
                'status' => 'error',
            ]);
        }
    }

}