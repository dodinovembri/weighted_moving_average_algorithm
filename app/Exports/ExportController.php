<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\TransactionDetailsModel;
use App\Models\CompanyModel;
use App\Models\SalesModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;

class ExportController implements FromView
{
	
	public function view(): View
	{		

		$data['sales'] = SalesModel::all();
		return view('exports.sales', $data);
	}	
}