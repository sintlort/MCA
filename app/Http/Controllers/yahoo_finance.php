<?php

namespace App\Http\Controllers;

use App\t_data_yahoo;
use Illuminate\Http\Request;

class yahoo_finance extends Controller
{
    public function index()
    {
        $data = t_data_yahoo::with('relation_symbol')->get();
        return view('table-datatable', compact('data'));
    }

    public function sort(Request $request)
    {
        $data = t_data_yahoo::get();
        foreach ($request->input_name as $index => $ins){
            $data = $data->where($ins,$request->type[$index],$request->value[$index]);
        }
        return view('table-datatable', compact('data'));
    }

    public function APIsort(Request $request)
    {
        $data = t_data_yahoo::get();
        foreach ($request->category as $index => $ins){
            $data = $data->where($ins,$request->type[$index],$request->value[$index]);
        }
        return response()->json(['code'=>200, 'message'=>'yahoo data finance success','data'=>$data],200);
    }
    public function apiStaticSort(Request $request)
    {
        $data = t_data_yahoo::where($request->category, $request->type, $request->value)->with('relation_symbol')->get();
        return response()->json(['code'=>200, 'message'=>'yahoo data finance success','data'=>$data],200);
    }
}
