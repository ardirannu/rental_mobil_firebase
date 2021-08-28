@extends('admin.layouts.master')

@section('title')
    Dashboard | Admin
@endsection 

@push('page-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.css"/>
@endpush

@section('header')
    Edit Produk
@endsection 

@section('content')
<div class="section-body">
    <div class="card">
    <div class="card-body">
    <form action="{{ route('mobil.update', $mobil->id )}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="row"> 
        <div class="col-6">
            <div class="form-group">
                <label>Nama Mobil * @error('nama') <b @error('nama') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                        Aa
                    </div>
                  </div>
                  <input type="text" name="nama" class="form-control currency" value="{{$mobil->nama}}">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Warna *  @error('warna') <b @error('warna') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                  </div>
                  <select name="warna" class="form-control" id="selectKategori">
                    <option value="" hidden>Pilih Warna</option>
                    <option name="warna" value="Putih" @if(old('warna') == 'Putih') selected @endif {{ $mobil->warna == "Putih" ? 'selected' : '' }}>Putih</option>
                    <option name="warna" value="Silver" @if(old('warna') == 'Silver') selected @endif {{ $mobil->warna == "Silver" ? 'selected' : '' }}>Silver</option>
                  </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>Gambar Mobil @error('gambar') <b @error('gambar') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-image"></i>
                    </div>
                  </div>
                  <input type="file" name="gambar" class="form-control currency" >
                </div>
            </div>
        </div> 
        <div class="col-6">
            <div class="form-group">
                <label>Tahun * @error('tahun') <b @error('tahun') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-calendar-week"></i>
                    </div>
                  </div>
                  <input type="text" name="tahun" class="form-control currency" value="{{$mobil->tahun}}">
                </div>
            </div>
        </div>
    </div>
    <div class="row"> 
        <div class="col-6">
            <div class="form-group">
                <label>No. Polisi * @error('no_polisi') <b @error('no_polisi') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                        No.
                    </div>
                  </div>
                  <input type="text" name="nomor_polisi" class="form-control currency" value="{{$mobil->nomor_polisi}}">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Harga Dalam Kota Lepas Kunci * @error('harga_dalam_kota_lepas_kunci') <b @error('harga_dalam_kota_lepas_kunci') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                  </div>
                  <input type="text" name="harga_dalam_kota_lepas_kunci" class="form-control currency" value="{{$mobil->harga_dalam_kota_lepas_kunci}}">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>Harga Dalam Kota Tidak Lepas Kunci * @error('harga_dalam_kota_tidak_lepas_kunci') <b @error('	harga_dalam_kota_tidak_lepas_kunci') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                  </div>
                  <input type="text" name="	harga_dalam_kota_tidak_lepas_kunci" class="form-control currency" value="{{$mobil->harga_dalam_kota_tidak_lepas_kunci}}">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Harga Luar Kota Lepas Kunci * @error('harga_luar_kota_lepas_kunci') <b @error('	harga_luar_kota_lepas_kunci') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                  </div>
                  <input type="text" name="	harga_luar_kota_lepas_kunci" class="form-control currency" value="{{$mobil->harga_luar_kota_lepas_kunci}}">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Harga Luar Kota Tidak Lepas Kunci * @error('harga_luar_kota_tidak_lepas_kunci') <b @error('harga_luar_kota_tidak_lepas_kunci') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                  </div>
                  <input type="text" name="harga_luar_kota_tidak_lepas_kunci" class="form-control currency" value="{{$mobil->harga_luar_kota_tidak_lepas_kunci}}">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Harga 24 Jam Dalam Kota Lepas Kunci * @error('harga24jam_dalam_kota_lepas_kunci') <b @error('harga24jam_dalam_kota_lepas_kunci') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                  </div>
                  <input type="text" name="harga24jam_dalam_kota_lepas_kunci" class="form-control currency" value="{{$mobil->harga24jam_dalam_kota_lepas_kunci}}">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Harga 24 Jam Luar Kota Lepas Kunci * @error('harga24jam_luar_kota_lepas_kunci') <b @error('harga24jam_luar_kota_lepas_kunci') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                  </div>
                  <input type="text" name="harga24jam_luar_kota_lepas_kunci" class="form-control currency" value="{{$mobil->harga24jam_luar_kota_lepas_kunci}}">
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Keterangan * @error('keterangan') <b @error('keterangan') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                        Aa
                    </div>
                  </div>
                   
                  <input type="text" name="keterangan" class="form-control currency" value="{{$mobil->keterangan}}">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label>Fasilitas *</label>
                <div class="input-group">
                  <div class="selectgroup selectgroup-pills">
                    @php 
                    $data_fasilitas = $mobil->fasilitas;  
                    @endphp
                    
                    @if (in_array('AC', $data_fasilitas))
                    <label class="selectgroup-item">
                      <input type="checkbox" name="fasilitas[]" value="AC" class="selectgroup-input" checked>
                      <span class="selectgroup-button">AC</span>
                    </label>
                    @else
                    <label class="selectgroup-item">
                      <input type="checkbox" name="fasilitas[]" value="AC" class="selectgroup-input" checked>
                      <span class="selectgroup-button">AC</span>
                    </label>
                    @endif
                    @if (in_array('Air Minum', $data_fasilitas))
                    <label class="selectgroup-item">
                      <input type="checkbox" name="fasilitas[]" value="Air Minum" class="selectgroup-input" checked>
                      <span class="selectgroup-button">Air Minum</span>
                    </label>
                    @else
                    <label class="selectgroup-item">
                      <input type="checkbox" name="fasilitas[]" value="Air Minum" class="selectgroup-input">
                      <span class="selectgroup-button">Air Minum</span>
                    </label>
                    @endif
                    @if (in_array('Makanan', $data_fasilitas))
                    <label class="selectgroup-item">
                      <input type="checkbox" name="fasilitas[]" value="Makanan" class="selectgroup-input" checked>
                      <span class="selectgroup-button">Makanan</span>
                    </label>
                    @else
                    <label class="selectgroup-item">
                      <input type="checkbox" name="fasilitas[]" value="Makanan" class="selectgroup-input">
                      <span class="selectgroup-button">Makanan</span>
                    </label>
                    @endif
                  </div>
                </div>
            </div>
        </div>
        <div class="card-footer right">
          <div class="text-right">
          <a class="btn btn-primary" href="{{ route('mobil.index')}}">Kembali</a>
          <button type="submit" class="btn btn-warning">Update</button>
        </div>
        </div>
    </div>
    </div>
    </form>
  </div>
</div>
</div>
@endsection

@push('after-scripts')
<script>
     // select option hidden jika select kategori = celana
     $('#selectKategori').change(function(){
            if ($(this).val() == 'Celana'){ // or this.value == 'Celana'
                $('#ukuranCelana').removeAttr('hidden');
                $('#ukuranBaju').attr('hidden','');
            }
            if ($(this).val() == 'Kaos' || $(this).val() == 'Hoodie' || $(this).val() == 'Kemeja' || $(this).val() == 'Sweater' || $(this).val() == 'Jaket'){ // or this.value == 'Celana'
                $('#ukuranBaju').removeAttr('hidden');
                $('#ukuranCelana').attr('hidden','');
            }
        });
</script>
@endpush