<?php

namespace App\Http\Controllers\mobil;

use App\Http\Controllers\Controller;
use App\models\Mobil;
use Carbon\Carbon;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Stringable; 

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Mobil::get();
        return view('admin.mobil.index', ['mobil' => $mobil]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    private function _validation(Request $request){
        // validasi inputan dari form
        $validated = $request->validate([
            'nama' => 'required|unique:produk',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'ukuran' => 'required',
            'harga' => 'required',
            'gambar_produk' => 'mimes:jpeg,jpg,png,gif|required|max:1000', 
            'gambar_produk_2' => 'mimes:jpeg,jpg,png,gif|required|max:1000', 
            'gambar_produk_3' => 'mimes:jpeg,jpg,png,gif|required|max:1000', 
            'gambar_produk_4' => 'mimes:jpeg,jpg,png,gif|required|max:1000', 
        ],

        [
            'nama.required' => 'Silahkan isi Nama Produk !',
            'nama.unique' => 'Data sudah ada !',
            'kategori.required' => 'Silahkan Pilih Kategori !',
            'deskripsi.required' => 'Silahkan isi Deskripsi Produk !',
            'ukuran.required' => 'Silahkan Pilih Ukuran !',
            'harga.required' => 'Silahkan isi Harga Produk !',
            'gambar_produk.required' => 'Silahkan Pilih Gambar Produk !',
            'gambar_produk_2.required' => 'Silahkan Pilih Gambar Produk !',
            'gambar_produk_3.required' => 'Silahkan Pilih Gambar Produk !',
            'gambar_produk_4.required' => 'Silahkan Pilih Gambar Produk !',
        ]);
    }

    private function _validation_update(Request $request){
        // validasi inputan dari form
        $validated = $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'gambar_produk' => 'mimes:jpeg,jpg,png,gif|max:1000', 
            'gambar_produk_2' => 'mimes:jpeg,jpg,png,gif|max:1000', 
            'gambar_produk_3' => 'mimes:jpeg,jpg,png,gif|max:1000', 
            'gambar_produk_4' => 'mimes:jpeg,jpg,png,gif|max:1000', 
        ],

        [
            'nama.required' => 'Silahkan isi Nama Produk !',
            'deskripsi.required' => 'Silahkan isi Deskripsi Produk !',
            'harga.required' => 'Silahkan isi Harga Produk !',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->_validation($request);

        $current_date_time = Carbon::now()->toDateTimeString();

        // image upload
        $gambar   = $request->file('gambar');
        $nama_gambar   = $gambar->getClientOriginalName();
        $request->file('gambar')->move('image', $nama_gambar);

        $mobil = new Mobil;
        $mobil->nama = $request->nama;
        $mobil->warna = $request->warna;
        $mobil->gambar = $nama_gambar;
        $mobil->tahun = $request->tahun;
        $mobil->nomor_polisi = $request->nomor_polisi;
        $mobil->harga_dalam_kota_lepas_kunci = $request->harga_dalam_kota_lepas_kunci;
        $mobil->harga_dalam_kota_tidak_lepas_kunci = $request->harga_dalam_kota_tidak_lepas_kunci;
        $mobil->harga_luar_kota_lepas_kunci = $request->harga_luar_kota_lepas_kunci;
        $mobil->harga_luar_kota_tidak_lepas_kunci = $request->harga_luar_kota_tidak_lepas_kunci;
        $mobil->harga24jam_dalam_kota_lepas_kunci = $request->harga24jam_dalam_kota_lepas_kunci;
        $mobil->harga24jam_luar_kota_lepas_kunci = $request->harga24jam_luar_kota_lepas_kunci;
        $mobil->fasilitas = $request->fasilitas;
        $mobil->keterangan = $request->keterangan;
        $mobil->created_at = $current_date_time;
        $mobil->updated_at = $current_date_time;
        $mobil->save();

        return redirect()->route('mobil.index')->with('input_success','Berhasil Menambah Data !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil = Mobil::find($id);
        return view('admin.mobil.edit', ['mobil' => $mobil]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { 
         // $this->_validation($request);

        $current_date_time = Carbon::now()->toDateTimeString();

        $gambar = Mobil::find($id);

        if ($request->file('gambar') != ''){
            $gambar   = $request->file('gambar');
            $nama_gambar   = $gambar->getClientOriginalName();
            $request->file('gambar')->move('image', $nama_gambar);
            unlink(public_path('image/'.$gambar->gambar));
        }elseif ($request->file('gambar') == ''){
            $nama_gambar = $gambar->gambar;
        }

        $mobil = Mobil::find($id);
        $mobil->nama = $request->nama;
        $mobil->warna = $request->warna;
        $mobil->gambar = $nama_gambar;
        $mobil->tahun = $request->tahun;
        $mobil->nomor_polisi = $request->nomor_polisi;
        $mobil->harga_dalam_kota_lepas_kunci = $request->harga_dalam_kota_lepas_kunci;
        $mobil->harga_dalam_kota_tidak_lepas_kunci = $request->harga_dalam_kota_tidak_lepas_kunci;
        $mobil->harga_luar_kota_lepas_kunci = $request->harga_luar_kota_lepas_kunci;
        $mobil->harga_luar_kota_tidak_lepas_kunci = $request->harga_luar_kota_tidak_lepas_kunci;
        $mobil->harga24jam_dalam_kota_lepas_kunci = $request->harga24jam_dalam_kota_lepas_kunci;
        $mobil->harga24jam_luar_kota_lepas_kunci = $request->harga24jam_luar_kota_lepas_kunci;
        $mobil->fasilitas = $request->fasilitas;
        $mobil->keterangan = $request->keterangan;
        $mobil->created_at = $current_date_time;
        $mobil->updated_at = $current_date_time;
        $mobil->save();

        return redirect()->route('mobil.index')->with('input_success','Berhasil Menambah Data !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gambar = Mobil::find($id);
        unlink(public_path('image/'.$gambar->gambar));
        Mobil::destroy($id);
        return redirect()->route('mobil.index');
    }
    
}
