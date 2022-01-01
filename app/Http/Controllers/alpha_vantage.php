<?php

namespace App\Http\Controllers;

use App\t_data_alpha;
use Carbon\Carbon;
use Illuminate\Http\Request;

class alpha_vantage extends Controller
{
    public function index()
    {
        $data = t_data_alpha::with('relation_symbol')->get()->sortBy('symbol')->sortBy('date');
        return view('table-datatable_alpha', compact('data'));
    }

    public function sort(Request $request)
    {
        $daterange = $request->daterange;
        $period = explode(' - ', $daterange);
        $data1 = Carbon::parse($period[0])->format('Y-m-d');
        $data2 = Carbon::parse($period[1])->format('Y-m-d');
        $data = t_data_alpha::get();
        foreach ($request->input_name as $index => $ins){
            $data = $data->where($ins,$request->type[$index],$request->value[$index]);
        }
        $data = $data->whereBetween('date',[$data1, $data2])->sortBy('symbol')->sortBy('date');
        return view('table-datatable_alpha', compact('data'));
    }

    public function APIsort(Request $request)
    {
        $data = t_data_alpha::get();
        foreach ($request->category as $index => $ins){
            $data = $data->where($ins,$request->type[$index],$request->value[$index]);
        }
        $data = $data->sortBy('date')->sortBy('symbol')->sortBy('date');
        return response()->json(['code'=>200, 'message'=>'alphavantage data finance success','data'=>$data],200);
    }

    public function APIsortwithDate(Request $request)
    {
        $data = t_data_alpha::get();
        foreach ($request->category as $index => $ins){
            $data = $data->where($ins,$request->type[$index],$request->value[$index]);
        }
        $data = $data->whereBetween('date',[$request->date1, $request->date2])->sortBy('symbol')->sortBy('date');
        return response()->json(['code'=>200, 'message'=>'alphavantage data finance success','data'=>$data],200);
    }

    public function apiStaticSort(Request $request)
    {
        $data = t_data_alpha::where($request->category, $request->type, $request->value)->with('relation_symbol')->get()->sortBy('symbol')->sortBy('date');
        return response()->json(['code'=>200, 'message'=>'alphavantage data finance success','data'=>$data],200);
    }

    public function apiStaticSortwithDate(Request $request)
    {
        $data = t_data_alpha::where($request->category, $request->type, $request->value)->with('relation_symbol')->whereBetween('date',[$request->date1, $request->date2])->get()->sortBy('symbol')->sortBy('date');
        return response()->json(['code'=>200, 'message'=>'alphavantage data finance success','data'=>$data],200);
    }
}
