<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExcelController extends Controller
{
    public function upload(Request $request){
        $file = $request->file('excel');
        if($file){
            $row = 1;
            $array = [];
            if (($handle = fopen($file, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    if($row > 1){
                        Http::post('https://reqres.in/api/users', [
                            'name' => $data[0],
                            'job' => $data[1],
                        ]);
                        array_push($array,$data[0]);
                    }
                    $request->session()->flash('status', 'Users '.implode($array,", ").' created successfully!');
                    $row++;
                }
            }
        }else{
            $request->session()->flash('error', 'Please choose a file to submit.');
        }
        return view('dashboard');
    }
}
