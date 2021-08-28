<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\models\Keranjang;
use App\Pelanggan;
use App\Models\Pesanan;
use App\models\Produk;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     $produk = Produk::count();
    //     $pelanggan = Pelanggan::count();
    //     $keranjang = Keranjang::count();
    //     $admin = User::count();
    //     $pesanan_berhasil = Pesanan::where('status', 'Pesanan Berhasil')->count();
    //     $pesanan_gagal = Pesanan::where('status', 'Pesanan Gagal')->count();
    //     $pesanan_berhasil_rupiah = Pesanan::where('status', 'Pesanan Berhasil')->sum('total_pembayaran');
    //     return view('admin.index', ['produk' => $produk, 'pelanggan' => $pelanggan, 'keranjang' => $keranjang, 'admin' => $admin, 'pesanan_berhasil' => $pesanan_berhasil, 'pesanan_gagal' => $pesanan_gagal, 'pesanan_berhasil_rupiah' => $pesanan_berhasil_rupiah ]);
    // }
}
