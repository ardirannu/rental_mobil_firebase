<?php

namespace App\Http\Controllers\toko;

use App\Http\Controllers\Controller;
use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toko = Toko::get();
        return view('admin.toko.index', ['toko' => $toko]);
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
            'nama_toko' => 'required',
            'alamat' => 'required',
            'nama_rekening' => 'required',
            'no_rekening' => 'required',
            'nama_bank' => 'required',
            'email' => 'required|email',
            'call_center' => 'required',
        ],

        [
            'nama_toko.required' => 'Silahkan isi Nama Toko !',
            'alamat.required' => 'Silahkan isi Alamat !',
            'nama_rekening.required' => 'Silahkan isi Nama Rekening !',
            'no_rekening.required' => 'Silahkan isi No. Rekening !',
            'nama_bank.required' => 'Silahkan isi Nama Bank !',
            'email.required' => 'Silahkan isi Email !',
            'email.email' => 'Format Email Salah !',
            'call_center.required' => 'Silahkan isi Call Center !',
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

        Toko::create($request->all());  
        return redirect()->route('toko.index');
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
        //
    }
}
