<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesModel;

class PredictionController extends Controller
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
        return view('prediction.index');
    }

    public function filter_new(Request $request)
    {
        // date from form
        $from_date = $request->post('from_date');
        $to_date = $request->post('to_date');

        // get data
        $sales = SalesModel::whereBetween('date', [$from_date, $to_date])->get();

        // initial value        
        $alpha = 0.9;
        $ewmas = [];

        // calculate
        foreach ($sales as $key => $value) {
            if ($key == 0) {
                $date = $value->date;
                $ewma = $value->total;

                $total_row_now = $value->total;
                $date_now = $value->date;

                $date_row_prev = $date_now;
            }else{
                $date = $value->date;
                $total_row_now = $value->total;
                $date_row_now = $value->date;

                $total_alpha = $this->alpha_factorial($alpha, $from_date, $date_row_prev);
                $total_alpha_divider = $this->alpha_factorial_divider($alpha, $from_date, $date_row_prev);
                $ewma = ($total_row_now + $total_alpha) / $total_alpha_divider;
                            
                $date_row_prev = $date_row_now;
            }
            
            $ewma_final = array(
                'date' => $date, 
                'wmas_final' => $ewma
            );
            array_push($ewmas, $ewma_final);
        }

        $data['wmas'] = $ewmas;
        return view('prediction.filter', $data);
    }

    public function alpha_factorial($alpha, $from_date, $date_row_prev)
    {
        // get data
        $sales = SalesModel::whereBetween('date', [$from_date, $date_row_prev])->orderBy('date', 'DESC')->take(6)->get();
        $total_alpha_factorial = 0;
        
        // calculate
        $i = 1;
        foreach ($sales as $key => $value) {
            $alpha_used = pow($alpha, $i);
            $total_alpha_factorial = $total_alpha_factorial + ($value->total * $alpha_used);
            $i ++;
        }

        return $total_alpha_factorial;
    }

    public function alpha_factorial_divider($alpha, $from_date, $date_row_prev)
    {
        $sales = SalesModel::whereBetween('date', [$from_date, $date_row_prev])->count();
        if ($sales > 6) $sales = 6;
        $total = 0;
        for ($i=1; $i <= $sales; $i++) { 
            $total = $total + pow($alpha, $i);
        }

        return $total_alpha_factorial = 1 + $total;
    }
}
