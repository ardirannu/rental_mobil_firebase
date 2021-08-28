@extends('admin.layouts.master')

@section('title')
    Dashboard | Admin
@endsection

@section('header')
    Dashboard
@endsection 

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="fas fa-tshirt"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Produk</h4>
          </div>
          <div class="card-body">
            {{ $produk }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-check-square"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Pesanan Berhasil</h4>
          </div>
          <div class="card-body">
            {{ $pesanan_berhasil }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="fas fa-times-circle"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Pesanan Gagal</h4>
          </div>
          <div class="card-body">
            {{ $pesanan_gagal }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
            <i class="fas fa-dollar-sign"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Penjualan (Rp)</h4>
          </div>
          <div class="card-body">
            {{ $pesanan_berhasil_rupiah }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
            <i class="fas fa-users"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Pelanggan</h4>
          </div>
          <div class="card-body">
            {{ $pelanggan }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
            <i class="fas fa-key"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Admin</h4>
          </div>
          <div class="card-body">
            {{ $admin }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

 