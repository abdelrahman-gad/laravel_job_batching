<?php
namespace App\Http\Controllers;

use App\Jobs\SalesCsvProcess;
use Illuminate\Support\Facades\Bus;
use App\Exports\SalesExport;
use Maatwebsite\Excel\Facades\Excel;
class SalesController extends Controller
{
    public function index()
    {
        return view('upload-file');
    }
	public function upload(){

    
        if (request()->has('mycsv')) {
            $data   =   file(request()->mycsv);
            // Chunking file
            $chunks = array_chunk($data, 1000);
            //  convert 1000 records into a new csv file
            $path = resource_path('temp');
            $header = [];
            $batch = Bus::batch([])->dispatch();
            foreach ($chunks as $key => $chunk) {
                $name = "/tmp{$key}.csv";
                file_put_contents($path . $name, $chunk);
            }

            $files = glob("$path/*.csv");

            
        
            foreach ($files as $key => $file) {
                $data = array_map('str_getcsv', file($file));
                if ($key === 0) {
                    $header = $data[0];
                    unset($data[0]);
                }

                $batch->add(new SalesCsvProcess($data,$header));

                // SalesCsvProcess::dispatch($data, $header);
                unlink($file);
            }

            return $batch;

        }
           
        

        return 'please upload file';
    }
    public function batch(){
        $batchId = request('id');
        return Bus::findBatch($batchId);
    }

    public function  exportToExcel(){
        // return 'test';
        return Excel::download(new SalesExport, 'sales.xlsx');
    }
}