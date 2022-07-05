<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use PDF;
use PhpParser\Node\Stmt\TryCatch;
use Ramsey\Uuid\Codec\OrderedTimeCodec;

class BarangController extends Controller
{
    //menampilkan halamancreate barang
    public function HalamanBarang()
    {
        $postsbarang = DB::table('barangs')->orderBy('barangs.id', 'asc')
            ->get();
        return view('barang', compact('postsbarang'));
    }
    public function HalamanTambahBarang()
    {
        return view('createbarang');
    }
    public function postHalamanBarang(Request $request)
    {
        $this->validate($request, [
            'namabarang' => 'required',
            'hargabarang' => 'required',
            'jumlahbarang' => 'required'
        ]);

        $postbarang = Barang::create([
            'namabarang' => $request->namabarang,
            'hargabarang' => $request->hargabarang,
            'jumlahbarang' => $request->jumlahbarang
        ]);

        if ($postbarang) {
            return redirect()
                ->route('barang')
                ->with([
                    'sukses' => 'Data Baru Berhasil Ditambahkan'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Tidak Berhasil Ditambahkan'
                ]);
        }
    }
    public function tampilkandata($id)
    {
        $postbarang = Barang::find($id);
        return view('tcreatebarang', compact('postbarang'));
    }
    public function updatedata(Request $request, $id)
    {
        $postbarang = Barang::find($id);
        $postbarang->update($request->all());
        return redirect()->route('barang')->with('sukses', 'Data Berhasil Di Update');
    }
    public function deletedata($id)
    {
        $postbarang = Barang::find($id);
        $postbarang->delete();
        return redirect()->route('barang')->with('sukses', 'Data Berhasil Di Hapus');
    }
    public function ExportPDF()
    {
        $data = Barang::all();

        view()->share('data', $data);
        $pdf = PDF::loadview('barang-pdf');
        return $pdf->download('data.pdf');
    }
}
