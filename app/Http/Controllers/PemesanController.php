<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Pemesan;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use App\Models\Pegawai;
use App\Models\Transaksi;
use PDF;

class PemesanController extends Controller
{
    public function tampilhalaman()
    {
        $postdata = DB::table('transaksis')
            ->join('pemesans', 'transaksis.pemesan_id', '=', 'pemesans.id')
            ->join('barangs', 'transaksis.barang_id', '=', 'barangs.id')
            ->join('pegawais', 'transaksis.pegawai_id', '=', 'pegawais.id')
            ->select('transaksis.id', 'pemesans.id', 'transaksis.NoFaktur', 'transaksis.jumlahbarang', 'transaksis.status', 'pemesans.alamat', 'pemesans.namapemesan', 'barangs.namabarang', 'pegawais.namapegawai')
            ->orderBy('transaksis.id', 'ASC')
            ->get();
        return view('pemesan', compact('postdata'));
    }
    public function tampiltransaksi()
    {
        return view('createpemesan');
    }
    public function createpemesan(Request $request)
    {
        $this->validate($request, [
            'namapemesan' => 'required',
            'alamat' => 'required',
        ]);

        $postpemesan = Pemesan::create([
            'namapemesan' => $request->namapemesan,
            'alamat' => $request->alamat,
        ]);

        if ($postpemesan) {
            return redirect()
                ->route('createtransaksi')
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
    public function tampiltransaksi2()
    {
        $data = Barang::all();
        $data1 = Pegawai::all();
        $data2 = DB::table('pemesans')
            ->select('pemesans.*')
            ->orderByDesc('pemesans.id')
            ->limit(1)
            ->get();
        return view('createtransaksi', compact('data', 'data1', 'data2'));
    }
    public function createtransaksi(Request $request)
    {
        $this->validate($request, [
            'NoFaktur' => 'required',
            'pemesan_id' => 'required',
            'barang_id' => 'required',
            'pegawai_id' => 'required',
            'jumlahbarang' => 'required',
            'alamat' => 'required',
            'status' => 'required',
        ]);
        $posttransaksi = Transaksi::create([
            'NoFaktur' => $request->NoFaktur,
            'pemesan_id' => $request->pemesan_id,
            'barang_id' => $request->barang_id,
            'pegawai_id' => $request->pegawai_id,
            'jumlahbarang' => $request->jumlahbarang,
            'alamat' => $request->alamat,
            'status' => $request->status,
        ]);

        if ($posttransaksi) {
            return redirect()
                ->route('tampil')
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
    public function tampildatapemesan($id)
    {
        $postpemesan = Pemesan::find($id);
        return view('tcreatepemesan', compact('postpemesan'));
    }
    public function updatedatapemesan(Request $request, $id)
    {
        $postpemesan = Pemesan::find($id);
        $postpemesan->update($request->all());
        return redirect()->route('tampil')->with('sukses', 'Data Berhasil Di Update');
    }
    public function deletedatatransaksi($id)
    {
        $posttransaksi = Transaksi::find($id);
        $posttransaksi->delete();
        return redirect()->route('tampil')->with('sukses', 'Data Berhasil Di Delete');
    }
    public function tampildatatransaksi($id)
    {
        $posttransaksi = Transaksi::find($id);
        return view('tcreatetransaksi', compact('posttransaksi'));
    }
    public function updatedatastatus(Request $request, $id)
    {
        $posttransaksi = Transaksi::find($id);
        $posttransaksi->update($request->all());
        return redirect()->route('tampil')->with('sukses', 'Data Berhasil Di Update');
    }
    public function exportpdffaktur()
    {
        $postdata = DB::table('transaksis')
            ->join('pemesans', 'transaksis.pemesan_id', '=', 'pemesans.id')
            ->join('barangs', 'transaksis.barang_id', '=', 'barangs.id')
            ->join('pegawais', 'transaksis.pegawai_id', '=', 'pegawais.id')
            ->select('transaksis.id', 'pemesans.id', 'transaksis.NoFaktur', 'transaksis.jumlahbarang', 'transaksis.status', 'pemesans.alamat', 'pemesans.namapemesan', 'barangs.namabarang', 'pegawais.namapegawai')
            ->orderBy('transaksis.id', 'ASC')
            ->get();
        view()->share('postdata', $postdata);
        $pdf = PDF::loadview('faktur-pdf');
        return $pdf->download('faktur.pdf');
    }
}
