<?php

namespace App\Http\Controllers;

use App\Models\pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class pesananController extends Controller
{
    public function search_trash(Request $request)
    {
        $get_nama = $request->nama;
        $datas = DB::table('pesanan')->where('deleted_at', '<>', '' )->where('id_pesanan', 'LIKE', '%'.$get_nama.'%')->get();
        return view('pesanan.trash')
        ->with('datas', $datas);
    }
    public function restore($id)
    {
        DB::update('UPDATE pesanan SET deleted_at = NULL WHERE id_pesanan = :id_pesanan', ['id_pesanan' => $id]);
        return redirect()->route('pesanan.trash')->with('success', 'Data pesanan berhasil restore');
    }
    public function trash()
    {
        $datas = DB::select('select * from pesanan where deleted_at is not null');
        return view('pesanan.trash')
            ->with('datas', $datas);
    }
    
    public function hide($id)
    {
        DB::update('UPDATE pesanan SET deleted_at=current_timestamp() WHERE id_pesanan = :id_pesanan', ['id_pesanan' => $id]);
        return redirect()->route('pesanan.index')->with('success', 'Data pesanan berhasil dihapus');
    }
    public function index() {
        $datas = DB::select('select * from pesanan where deleted_at is null');

        return view('pesanan.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('pesanan.add');
    }
    public function search(Request $request){
        $get_nama = $request->nama;
        $datas = DB::table('pesanan')->where('deleted_at', NULL)->where('id_pesanan', 'LIKE', '%' . $get_nama . '%')->get();
        return view('pesanan.index')->with('datas', $datas);
    }

    public function store(Request $request) {
        $request->validate([
            'id_pesanan' => 'required',
            'id_bus' => 'required',
            'id_penyewa' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'total_harga' => 'required',
            
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO pesanan(id_pesanan, id_bus, id_penyewa,  tanggal_mulai, tanggal_selesai, total_harga) VALUES (:id_pesanan, :id_bus, :id_penyewa,  :tanggal_mulai, :tanggal_selesai, :total_harga)',
        [
            'id_pesanan' => $request->id_pesanan,
            'id_bus' => $request->id_bus,
            'id_penyewa' => $request->id_penyewa,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'total_harga' => $request->total_harga,
        ]
        );

        // Menggunakan laravel eloquent
        // pesanan::create([
        //     'id_pesanan' => $request->id_pesanan,
        //     'nama_pesanan' => $request->nama_pesanan,
        //     'alamat' => $request->alamat,
        // ]);

        return redirect()->route('pesanan.index')->with('success', 'Data pesanan berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('pesanan')->where('id_pesanan', $id)->first();

        return view('pesanan.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_pesanan' => 'required',
            'id_bus' => 'required',
            'id_penyewa' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'total_harga' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE pesanan SET id_pesanan = :id_pesanan, id_bus = :id_bus, id_penyewa = :id_penyewa, tanggal_mulai = :tanggal_mulai, tanggal_selesai = :tanggal_selesai, total_harga = :total_harga WHERE id_pesanan = :id' ,
        [
            'id' => $id,
            'id_pesanan' => $request->id_pesanan,
            'id_bus' => $request->id_bus,
            'id_penyewa' => $request->id_penyewa,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'total_harga' => $request->total_harga,
        ]
        );

        // Menggunakan laravel eloquent
        // pesanan::where('id_pesanan', $id)->update([
        //     'id_pesanan' => $request->id_pesanan,
        //     'nama_pesanan' => $request->nama_pesanan,
        //     'alamat' => $request->alamat,
    
        // ]);

        return redirect()->route('pesanan.index')->with('success', 'Data pesanan berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM pesanan WHERE id_pesanan = :id_pesanan', ['id_pesanan' => $id]);

        // Menggunakan laravel eloquent
        // pesanan::where('id_pesanan ', $id)->delete();

        return redirect()->route('pesanan.index')->with('success', 'Data pesanan berhasil dihapus');
    }

}