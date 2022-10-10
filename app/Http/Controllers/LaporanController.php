<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Laporan;
Use App\Transaksi;
Use App\User;
Use App\Produk;
use Validator;
use \PDF;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::orderBy('created_at','DESC')->paginate(20);
        return view('laporan.index',compact('laporan'));
    }

    public function pdf()
    {
    	$laporan = Laporan::all();
 
    	$pdf = PDF::loadview('laporan.pdf',compact('laporan'));
    	return $pdf->download('laporan.pdf');
    }
    // public function print()
    // {
    //     $laporan = Laporan::orderBy('created_at','DESC')->get();
    //     $pdf = PDF::loadview('laporan.print',compact('laporan'));
    //     return $pdf->stream();
    // }

    public function export_excel()
	{
		return Excel::download(new LaporanExport, 'laporan.xlsx');
	}

}

?>
