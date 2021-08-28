<?php

namespace App\Http\Controllers\banner;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::get();
        return view('admin.banner.index', ['banner' => $banner]);
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
            'gambar' => 'mimes:jpeg,jpg,png,gif|required|max:1000', 
            'keterangan' => 'required',
        ],

        [
            'gambar.required' => 'Silahkan Pilih Gambar Banner !',
            'keterangan.required' => 'Silahkan isi Keterangan !',
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
        $this->_validation($request);
        $current_date_time = Carbon::now()->toDateTimeString();
        
        // image upload
        $gambar   = $request->file('gambar');
        $nama_gambar = $gambar->getClientOriginalName();
        $request->file('gambar')->move('banner', $nama_gambar);

        $banner = new Banner;
        $banner->gambar = $nama_gambar;
        $banner->keterangan = $request->keterangan;
        $banner->created_at = $current_date_time;
        $banner->updated_at = $current_date_time;
        $banner->save();

        return redirect()->route('banner.index')->with('input_success','Berhasil Menambah Data !');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::destroy($id);
        return redirect()->route('banner.index');
    }
}
