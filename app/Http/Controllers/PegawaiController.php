<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Pegawai;
use App\Models\Pendidikans;
use Illuminate\Http\Request;
use PDF;
use Svg\Tag\Rect;
use Whoops\Run;

class PegawaiController extends Controller
{
    public function halamanpegawai(){
        $postdata = Pegawai::all();
        $data = DB::table('pegawais')
                ->join('pendidikans','pegawais.pendidikans_id','=','pendidikans.id')
                ->select('pegawais.*','pendidikans.pendidikan')
                ->orderBy('pegawais.id','asc')
                ->get();
        return view('pegawai', compact('postdata','data'));
    }
    public function halamantambahpegawai(){
        $pendidikan = Pendidikans::all();
        return view('createpegawai',compact('pendidikan'));
    }
    public function tambahdatapegawai(Request $request){
        $this->validate($request,[
            'namapegawai' =>'required',
            'pendidikans_id'=>'required',
            'posisi' =>'required',
            'keahlian'=>'required'
        ]);

        $postpegawai = Pegawai::create([
            'namapegawai' =>$request->namapegawai,
            'pendidikans_id'=>$request->pendidikans_id,
            'posisi'=>$request->posisi,
            'keahlian'=>$request->keahlian
        ]);

        if($postpegawai){
            return redirect()
                ->route('pegawai')
                ->with([
                    'sukses'=>'Data Baru Berhasil Ditambahkan'
                ]);
        }else{
            return redirect()
               ->back()
               ->withInput()
               ->with([
                   'error' =>'Data Tidak Berhasil Ditambahkan'
               ]);
        }
    }
    public function tampilkandatapegawai($id){
        $postdata = Pegawai::find($id);
        $pendidikan = Pendidikans::all();
        return view('tcreatepegawai',compact('postdata','pendidikan'));
    }
    public function updatedatapegawai(Request $request, $id){
        $postdata = Pegawai::find($id);
        $postdata->update($request->all());
        return redirect()->route('pegawai')->with('sukses','Data Berhasil Di Update');

    }
    public function deletedatapegawai($id){
        $postdata = Pegawai::find($id);
        $postdata->delete();
        return redirect()->route('pegawai')->with('sukses','Data Berhasil Di Delete');
    }
    public function ExportPDFpegawai(){
        $data = DB::table('pegawais')
                ->join('pendidikans','pegawais.pendidikans_id','=','pendidikans.id')
                ->select('pegawais.*','pendidikans.pendidikan')
                ->orderBy('pegawais.id','asc')
                ->get();
        view()->share('data',$data);
        $pdf = PDF::loadview('pegawai-pdf');
        return $pdf->download('Pegawai.pdf');

    }
}
