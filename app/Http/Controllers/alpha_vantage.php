<?php

namespace App\Http\Controllers;

use App\t_data_alpha;
use Illuminate\Http\Request;

class alpha_vantage extends Controller
{
    public function index()
    {
        $data = t_data_alpha::with('relation_symbol')->get();
        return view('table-datatable_alpha', compact('data'));
    }

    public function sort(Request $request)
    {
        $data = t_data_alpha::get();
        foreach ($request->input_name as $index => $ins){
            $data = $data->where($ins,$request->type[$index],$request->value[$index]);
        }
        return view('table-datatable_alpha', compact('data'));
    }

    public function APIsort(Request $request)
    {
        $data = t_data_alpha::get();
        foreach ($request->category as $index => $ins){
            $data = $data->where($ins,$request->type[$index],$request->value[$index]);
        }
        $data = $data->with('relation_symbol');
        return response()->json(['code'=>200, 'message'=>'alphavantage data finance success','data'=>$data],200);
    }

    public function apiStaticSort(Request $request)
    {
        $data = t_data_alpha::where($request->category, $request->type, $request->value)->with('relation_symbol')->get();
        return response()->json(['code'=>200, 'message'=>'alphavantage data finance success','data'=>$data],200);
    }
}
