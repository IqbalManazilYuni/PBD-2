<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\BarangKeluar;
use App\Models\Barang;
use PDF;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function halamanbarangkeluar(){
        $postbarangkeluar = BarangKeluar::all();
        $postbarangkeluar = DB::table('barang_keluars')->orderBy('barang_keluars.id','asc')->get();
        return view('barangkeluar',compact('postbarangkeluar'));
    }
    public function halamantambahkeluar(){
        return view('keluarcreate');
    }
    public function postkeluarbarang(Request $request){
        $this->validate($request,[
            'idbarang'=>'required',
            'namabarangkeluar' =>'required',
            'hargabarangkeluar' =>'required',
            'jumlahbarangkeluar' =>'required'
        ]);


        $barang = Barang::find($request->idbarang);

        if($barang->jumlahbarang < $request->jumlahbarangkeluar)
        {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' =>'Data Tidak Berhasil Diambil'
            ]);
            $this->session->set_flashdata('error','Jumlah Barang Kurang');
        }
        else{
            $postbarangkeluar = BarangKeluar::create([
                'idbarang'=>$request->idbarang,
                'namabarangkeluar'=>$request->namabarangkeluar,
                'hargabarangkeluar'=>$request->hargabarangkeluar,
                'jumlahbarangkeluar'=>$request->jumlahbarangkeluar
            ]);
            $barang->jumlahbarang -= $request->jumlahbarangkeluar;
            $barang->save();
            return redirect('/barangkeluar')->with('success', 'Barang Berhasil Diambil');
            if($postbarangkeluar){
                return redirect()
                    ->route('barangkeluar')
                    ->with([
                        'sukses'=>'Barang Berhasil Diambil'
                    ]);
            }else{
                return redirect()
                   ->back()
                   ->withInput()
                   ->with([
                       'error' =>'Data Tidak Berhasil Diambil'
                   ]);
            }
        }
    }
    public function ExportPDFbarangkeluar(){
        $postbarangkeluar = DB::table('barang_keluars')->orderBy('barang_keluars.id','asc')->get();

        view()->share('postbarangkeluar',$postbarangkeluar);
        $pdf = PDF::loadview('barangkeluar-pdf');
        return $pdf->download('BarangKeluar.pdf');

    }

    public function tampilbarangkeluar($id){
        $barang = Barang::find($id);
        return view('keluarcreate', compact('barang'));
    }
    public function ambilbarangkeluar(Request $request, $id){
        $barang = Barang::find($id);
        $barang = Barang::find($request->idbarang);
        $this->validate($request,[
            'idbarang'=>'required',
            'namabarangkeluar' =>'required',
            'hargabarangkeluar' =>'required',
            'jumlahbarangkeluar' =>'required'
        ]);

        if($barang->jumlahbarang < $request->jumlahbarangkeluar)
        {
            return redirect()
            ->back()
            ->withInput()
            ->with([
                'error' =>'Data Tidak Berhasil Diambil'
            ]);
            $this->session->set_flashdata('error','Jumlah Barang Kurang');
        }
        else{
            $postbarangkeluar = BarangKeluar::create([
                'idbarang'=>$request->idbarang,
                'namabarangkeluar'=>$request->namabarangkeluar,
                'hargabarangkeluar'=>$request->hargabarangkeluar,
                'jumlahbarangkeluar'=>$request->jumlahbarangkeluar
            ]);
            $barang->jumlahbarang -= $request->jumlahbarangkeluar;
            $barang->save();
            return redirect('/barangkeluar')->with('success', 'Barang Berhasil Diambil');
            if($postbarangkeluar){
                return redirect()
                    ->route('barangkeluar')
                    ->with([
                        'sukses'=>'Barang Berhasil Diambil'
                    ]);
            }else{
                return redirect()
                   ->back()
                   ->withInput()
                   ->with([
                       'error' =>'Data Tidak Berhasil Diambil'
                   ]);
            }
        }
    }
}
