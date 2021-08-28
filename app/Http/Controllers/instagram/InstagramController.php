<?php

namespace App\Http\Controllers\instagram;

use App\Http\Controllers\Controller;
use App\Models\Instagram;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InstagramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instagram = Instagram::get();
        return view('admin.instagram.index', ['instagram' => $instagram]);
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
            'gambar' => 'mimes:jpeg,jpg,png,gif|required|max:2000', 
            'link_post_ig' => 'required',
        ],

        [
            'gambar.required' => 'Silahkan Pilih Gambar Banner !',
            'link_post_ig.required' => 'Silahkan isi Link Post Instagram !',
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
        $request->file('gambar')->move('instagram', $nama_gambar);

        $ig = new Instagram;
        $ig->gambar = $nama_gambar;
        $ig->link_post_ig = $request->link_post_ig;
        $ig->created_at = $current_date_time;
        $ig->updated_at = $current_date_time;
        $ig->save();

        return redirect()->route('instagram.index')->with('input_success','Berhasil Menambah Data !');
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
        Instagram::destroy($id);
        return redirect()->route('instagram.index');
    }
}
