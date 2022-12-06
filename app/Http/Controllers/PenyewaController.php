<?php

namespace App\Http\Controllers;

use App\Models\penyewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class penyewaController extends Controller
{
    public function index() {
        $datas = DB::select('select * from penyewa where deleted_at is null');

        return view('penyewa.index')
            ->with('datas', $datas);
    }
    public function restore($id)
    {
        DB::update('UPDATE penyewa SET deleted_at = NULL WHERE id_penyewa = :id_penyewa', ['id_penyewa' => $id]);
        return redirect()->route('penyewa.trash')->with('success', 'Data penyewa berhasil restore');
    }
    public function create() {
        return view('penyewa.add');
    }
    public function trash()
    {
        $datas = DB::select('select * from penyewa where deleted_at is not null');
        return view('penyewa.trash')
            ->with('datas', $datas);
    }
    public function hide($id)
    {
        DB::update('UPDATE penyewa SET deleted_at=current_timestamp() WHERE id_penyewa = :id_penyewa', ['id_penyewa' => $id]);
        return redirect()->route('penyewa.index')->with('success', 'Data kamar berhasil dihapus');
    }
    public function search(Request $request){
        $get_nama = $request->nama;
        $datas = DB::table('penyewa')->where('deleted_at', NULL)->where('nama_penyewa', 'LIKE', '%' . $get_nama . '%')->get();
        return view('penyewa.index')->with('datas', $datas);
    }

    public function store(Request $request) {
        $request->validate([
            'id_penyewa' => 'required',
            'nama_penyewa' => 'required',
            'kontak' => 'required',
            'email' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO penyewa(id_penyewa, nama_penyewa, kontak, email ) VALUES (:id_penyewa, :nama_penyewa, :kontak, :email )',
        [
            'id_penyewa' => $request->id_penyewa,
            'nama_penyewa' => $request->nama_penyewa,
            'kontak' => $request->kontak,
            'email' => $request->email,
            
        ]
        );

        // Menggunakan laravel eloquent
        // penyewa::create([
        //     'id_penyewa' => $request->id_penyewa,
        //     'nama_penyewa' => $request->nama_penyewa,
        //     'email' => $request->email,
        // ]);

        return redirect()->route('penyewa.index')->with('success', 'Data penyewa berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('penyewa')->where('id_penyewa', $id)->first();

        return view('penyewa.edit')->with('data', $data);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_penyewa' => 'required',
            'nama_penyewa' => 'required',
            'kontak' => 'required',
            'email' => 'required',
            
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE penyewa SET id_penyewa = :id_penyewa, nama_penyewa = :nama_penyewa, kontak = :kontak, email = :email  WHERE id_penyewa = :id',
        [
            'id' => $id,
            'id_penyewa' => $request->id_penyewa,
            'nama_penyewa' => $request->nama_penyewa,
            'kontak' => $request->kontak,
            'email' => $request->email,
            
        ]
        );

        // Menggunakan laravel eloquent
        // penyewa::where('id_penyewa', $id)->update([
        //     'id_penyewa' => $request->id_penyewa,
        //     'nama_penyewa' => $request->nama_penyewa,
        //     'email' => $request->email,
    
        // ]);

        return redirect()->route('penyewa.index')->with('success', 'Data penyewa berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM penyewa WHERE id_penyewa = :id_penyewa', ['id_penyewa' => $id]);

        // Menggunakan laravel eloquent
        // penyewa::where('id_penyewa', $id)->delete();

        return redirect()->route('penyewa.index')->with('success', 'Data penyewa berhasil dihapus');
    }
    

}