<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Events\RequestSending;
use Illuminate\Http\Request;
use App\Models\Sale;
class SalesController extends Controller
{
    public function index(){
        return view('upload-file');
    }
    public function store(Request $request){
          // return 'test';
        if($request->has('mycsv')){
            
            // $data =array_map('str_getcsv',file( $request->mycsv)); 
            $data = file( $request->mycsv);  
            $header = $data[0];
            unset($data[0]);
            
            //chunking data 
            $chunks  = array_chunk($data,1000);
         
            foreach($chunks as $key=>$chunk){
              $name= "/tmp{$key}.csv";
              $path= resource_path('temp'); 
              file_put_contents( $path.$name , $chunk);
            }

            // foreach($data as $value){
            //     $saleData = array_combine($header,$value);
            //     Sale::create($saleData);
            // }

            return 'done';
        }
        return 'please upload file';
    }


}
