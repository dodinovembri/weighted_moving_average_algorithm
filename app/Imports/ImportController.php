<?php

namespace App\Imports;

use App\Models\SalesModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class ImportController extends Model
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function import(array $row)
    {
        return new SalesModel([
           'date'     => $row[0],
           'total'    => $row[1], 
        ]);
    }
}