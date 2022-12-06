<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class busController extends Controller
{
    public function index() {
        $datas = DB::select('select * from bus where deleted_at is null');

        return view('bus.index')
            ->with('datas', $datas);
    }

    public function create() {
        return view('bus.add');
    }
    public function trash()
    {
        $datas = DB::select('select * from bus where deleted_at is not null');
        return view('bus.trash')
            ->with('datas', $datas);
    }
    public function hide($id)
    {
        DB::update('UPDATE bus SET deleted_at=current_timestamp() WHERE id_bus = :id_bus', ['id_bus' => $id]);
        return redirect()->route('bus.index')->with('success', 'Data bus berhasil dihapus');
    }
    public function restore($id)
    {
        DB::update('UPDATE bus SET deleted_at = NULL WHERE id_bus = :id_bus', ['id_bus' => $id]);
        return redirect()->route('bus.trash')->with('success', 'Data bus berhasil restore');
    }
    public function store(Request $request) {
        $request->validate([
            'id_bus' => 'required',
            'tipe_bus' => 'required',
            'total_kursi' => 'required',
            'harga' => 'required',
            
            
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert('INSERT INTO bus(id_bus, tipe_bus, total_kursi, harga) VALUES (:id_bus, :tipe_bus, :total_kursi, :harga)',
        [
            'id_bus' => $request->id_bus,
            'tipe_bus' => $request->tipe_bus,
            'total_kursi' => $request->total_kursi,
            'harga' => $request->harga,
        ]
        );

        // Menggunakan laravel eloquent
        // bus::create([
        //     'id_bus' => $request->id_bus,
        //     'nama_bus' => $request->nama_bus,
        //     'alamat' => $request->alamat,
        // ]);

        return redirect()->route('bus.index')->with('success', 'Data bus berhasil disimpan');
    }

    public function edit($id) {
        $data = DB::table('bus')->where('id_bus', $id)->first();

        return view('bus.edit')->with('data', $data);
    }
    public function search(Request $request){
        $get_nama = $request->nama;
        $datas = DB::table('bus')->where('deleted_at', NULL)->where('tipe_bus', 'LIKE', '%' . $get_nama . '%')->get();
        return view('bus.index')->with('datas', $datas);
    }

    public function update($id, Request $request) {
        $request->validate([
            'id_bus' => 'required',
            'tipe_bus' => 'required',
            'total_kursi' => 'required',
            'harga' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update('UPDATE bus SET id_bus = :id_bus, tipe_bus = :tipe_bus, total_kursi = :total_kursi, harga = :harga WHERE id_bus = :id',
        [
            'id' => $id,
            'id_bus' => $request->id_bus,
            'tipe_bus' => $request->tipe_bus,
            'total_kursi' => $request->total_kursi,
            'harga' => $request->harga,
        ]
        );

        // Menggunakan laravel eloquent
        // bus::where('id_bus', $id)->update([
        //     'id_bus' => $request->id_bus,
        //     'nama_bus' => $request->nama_bus,
        //     'alamat' => $request->alamat,
    
        // ]);

        return redirect()->route('bus.index')->with('success', 'Data bus berhasil diubah');
    }

    public function delete($id) {
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::delete('DELETE FROM bus WHERE id_bus = :id_bus', ['id_bus' => $id]);

        // Menggunakan laravel eloquent
        // bus::where('id_bus', $id)->delete();

        return redirect()->route('bus.index')->with('success', 'Data bus berhasil dihapus');
    }

}