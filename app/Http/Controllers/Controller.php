<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Maatwebsite\Excel\Facades\Excel;
use \App\Models\People;
use \App\Exports\PeopleExport;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        $people = People::all();
        return view('index', ['people' => $people]);
    }

    public function exportTxt(){
        $people = People::all();
        $file = fopen('relatorio.txt', 'w');
        foreach($people as $person){
            $output = $person->id . "\t; " . $person->first_name . "\t; " . $person->last_name . "\t; " . $person->phone . "\t; " . $person->email . "\t; " . date('d/m/Y', strtotime($person->created_at)) . "\t; " . date('d/m/Y', strtotime($person->updated_at)) . PHP_EOL;
            fwrite($file, $output);
        }        
        fclose($file);
        header("Content-Type: application/octet-stream;");
        header("Content-disposition: attachment; filename=relatorio.txt");
        readfile('relatorio.txt');
    }

    public function exportExcel(){
        return Excel::download(new PeopleExport, 'relatorio.xlsx');
    }

    public function exportPdf(){
        $people = People::all();
        $filename = 'Relatorio.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10,
        ]);

        $html = view('pdf', ['people' => $people]);
        $html = $html->render();
        $mpdf->WriteHTML($html);
        $mpdf->Output($filename, 'I');
    }
}
