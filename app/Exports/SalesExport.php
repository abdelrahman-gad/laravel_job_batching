<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Sale;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
class SalesExport implements FromCollection , WithHeadings 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings(): array
    {
        $columns = [
            'id' =>'#' , 
            'Region'=>'Region',
            'Country'=>'Country',
            'Item Type'=>'Item Type', 
            'Sales Channel'=>'Sales Channel',
            'Order Priority'=>'Order Priorty',
            'Order Date'=>'Order date',
            'Order ID'=>'Order ID',
            'Ship Date' => 'Ship Date',
            'Units Sold' =>'Units Sold',
            'Unit Price'=>'Unit Price',
            'Unit Cost'=>'Unit Cost',
            'Total Revenue'=>'Total Revenue',
            'Total Cost'=>'Total Cost',
            'Total Profit'=>'Total Profit', 
            'created_at'=>'created at',
            'updated_at'=>'updated at'
        ];
        return $columns;
    }

    public function collection()
    {
        
    
        $sales = Sale::all(); 

        
        return $sales;
    }
}

