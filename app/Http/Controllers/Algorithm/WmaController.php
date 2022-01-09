<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesModel;
use DateTime;

class WmaController extends Controller
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

    public function filter(Request $request)
    {
        $from_dates = $request->post('from_date');
        $from_date = date('Y-m-d', strtotime("-7 day", strtotime($from_dates)));
        $to_date = $request->post('to_date');

        $sales = SalesModel::whereBetween('date', [$from_date, $to_date])->get();
        $wmas = [];
        $total_to_multiples = [0];
        $i = 0;
        $n = 6;
        $l = 0;

        foreach ($sales as $key => $value) {
            $weighted = $this->calculate($from_date, $to_date, $value->id, $total_to_multiples, $n, $l);
            array_push($wmas, $weighted);
            
            $total_to_multiple = $weighted['wmas_final'];
            array_push($total_to_multiples, $total_to_multiple);
            
            if ($i == 6) {
                $i = 0;
                $n = 6;
            }
            if ($key == 6) {
                break;
            }
            $i++;
            $l++;
            $n--;

        } 
        
        $data['wmas'] = $wmas;
        return view('prediction.filter', $data);
    }

    public function calculate($from_date, $to_date, $id, $total_to_multiples, $n, $l)
    {
        $multiplier = [1, 2, 3, 4, 5, 6, 7];
        $sum_multiplier = array_sum($multiplier);
        $sales = SalesModel::where('id', '>=', $id)->whereBetween('date', [$from_date, $to_date])->get();
        $wmas = [];
        
        foreach ($sales as $key => $value) {
            $date = $value->date;

            if ($l > 6) {
                $keys = $l - $n - 1;
                $total = $total_to_multiples[$keys];
            }else{
                if ($key <= $n) {
                    $total = $value->total;
                }else{
                    $total = $total_to_multiples[$key - $n];
                }
            }

            $wma = $multiplier[$key] * $total;

            $wma_result = array(
                'date' => $date, 
                'wma' => $wma
            );

            array_push($wmas, $wma_result);
            if ($key == 6) {
                break;
            }
        }    
        
        $total = 0;
        foreach ($wmas as $key => $value) {
            $total = $total + $value['wma']; 
        }
        
        $total_date = $l;
        $last_date = date('Y-m-d', strtotime("+$total_date day", strtotime($date)));
        $wmas_final = $total/$sum_multiplier;
        $wmas_final = array(
            'date' => $last_date, 
            'wmas_final' => $wmas_final
        );

        return $wmas_final;
    }
}
