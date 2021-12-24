<?php

namespace App\Http\Controllers;

use App\Imports\ImportController;
use Illuminate\Http\Request;
use App\Models\SalesModel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Exports\ExportController;

class SalesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
        
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sales'] = SalesModel::all();
        return view('sales.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->post('date');
        $check_date = SalesModel::where('date', $date)->first();
        if (empty($check_date)) {
            $insert = new SalesModel();
            $insert->date = $request->post('date');
            $insert->total = $request->post('total');
            $insert->save();
        }else{
            $check_date->date = $request->post('date');
            $check_date->total = $request->post('total');
            $check_date->update();
        }


        return redirect()->back()->with('message', 'Success adding new sales !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = SalesModel::find($id);
        $update->date = $request->post('date');
        $update->total = $request->post('total');
        $update->update();

        return redirect()->back()->with('message', 'Success update sales !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find_to_delete = SalesModel::find($id);
        $find_to_delete->delete();

        return redirect()->back()->with('message', 'Success delete sales !');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);
 
        $file = $request->file('file');
        $nama_file = $file->hashName();
        
        $path = $file->storeAs('public/data_import/',$nama_file);
 
        $array = Excel::toArray(new ImportController, storage_path('app/public/data_import/'.$nama_file));
        foreach ($array as $key => $value) {
            $array2 = $value;
            foreach ($value as $key2 => $value2) {
                        if ($key2 == 0) {
                            continue;
                        }
                        $excel_date = intval($value2[0]); //here is that value 41621 or 41631
                        $unix_date = ($excel_date - 25569) * 86400;
                        $excel_date = 25569 + ($unix_date / 86400);
                        $unix_date = ($excel_date - 25569) * 86400;
                        $orgDate = gmdate("d-m-Y", $unix_date); 
                        $newDate = date("Y-m-d", strtotime($orgDate)); 

                        $check = SalesModel::where('date', $newDate)->first();
                        if (isset($check)) {
                            continue;                       
                        }
                        $insert = new SalesModel();
                        $insert->date = $newDate;
                        $insert->total = $value2[1];
                        $insert->save();
                     }         
        }
        Storage::delete($path);
        return redirect()->back()->with('message', 'Success adding new sales !');
    }

    public function export()
    {
        return Excel::download(new ExportController, 'sales.xlsx');
    }
}
