@extends('admin.layouts.master')

@section('title')
    Dashboard | Admin
@endsection

@push('page-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.css"/>
@endpush

@section('header')
    Data Mobil
@endsection 
 
@section('content')
    <div class="section-body">
        @if (session('input_success'))
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>x</span>
                </button>
                {{ session('input_success')}}
            </div>  
        </div>
        @endif
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah Data</button>
            </div>
            <div class="col-12">
                <hr>
              <div class="card">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table id="table_id" class="table table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Mobil</th>
                                <th>Warna</th>
                                <th>Gambar</th>
                                <th>Tahun</th>
                                <th>Nomor Polisi</th>
                                <th>Harga Dalam Kota (Lepas Kunci)</th>
                                <th>Harga Dalam Kota (Tidak lepas Kunci)</th>
                                <th>Harga Luar Kota (lepas Kunci)</th>
                                <th>Harga Luar Kota (Tidak Lepas Kunci)</th>
                                <th>Harga 24 Jam Dalam Kota (Lepas Kunci)</th>
                                <th>Harga 24 Jam Luar Kota (Lepas Kunci)</th>
                                <th>Fasilitas</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($mobil as $no => $data)
                            <tr>
                                <td>{{ $no+1 }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->warna }}</td>
                                <td><img src="{{ asset('image/'.$data->gambar) }}" class="imagecheck-image" width="50" height="50"></td>
                                <td>{{ $data->tahun }}</td>
                                <td>{{ $data->nomor_polisi }}</td>
                                <td>{{ $data->harga_dalam_kota_lepas_kunci }}</td>
                                <td>{{ $data->harga_dalam_kota_tidak_lepas_kunci }}</td>
                                <td>{{ $data->harga_luar_kota_lepas_kunci }}</td>
                                <td>{{ $data->harga_luar_kota_tidak_lepas_kunci }}</td>
                                <td>{{ $data->harga24jam_dalam_kota_lepas_kunci }}</td>
                                <td>{{ $data->harga24jam_luar_kota_lepas_kunci }}</td>
                                <td>  
                                    @foreach($data->fasilitas as $value)
                                    {{$value}},
                                    @endforeach
                                </td>
                                <td>{{ $data->keterangan }}</td>
                                <td class="text-left">
                                    <a href="{{ route('mobil.edit', $data->id )}}" class="badge badge-warning mb-2">Edit</a>
                                    <a href="#" data-id="{{ $data->id }}" class="badge badge-danger swal-confirm">
                                        <form action="{{ route('mobil.destroy', $data->id )}}" id="delete{{ $data->id }}" method="POST">
                                        @csrf
                                        @method('delete') 
                                        </form> 
                                        Hapus
                                    </a>
                                 </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
    </div>
    </div>
@endsection

@section('modal')
    <!-- Modal Image Produk View-->
    <div class="modal fade" tabindex="-1" role="dialog" id="imageView">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Preview Gambar Produk</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body text-center modal-data">
                
            </div>
            <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            </div>
        </div>
        </div>
    </div>
    
    {{-- Modal create data --}}
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="createModal">
        <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('mobil.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                                   
                                  <input type="text" name="nama" class="form-control currency">
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
                                    <option name="warna" value="Putih" @if(old('warna') == 'kaos') selected @endif>Putih</option>
                                    <option name="warna" value="Silver" @if(old('warna') == 'kemeja') selected @endif>Silver</option>
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
                                  <input type="file" name="gambar" class="form-control currency">
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
                                  <input type="text" name="tahun" class="form-control currency">
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
                                  <input type="text" name="nomor_polisi" class="form-control currency">
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
                                  <input type="text" name="harga_dalam_kota_lepas_kunci" class="form-control currency">
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
                                  <input type="text" name="	harga_dalam_kota_tidak_lepas_kunci" class="form-control currency">
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
                                  <input type="text" name="	harga_luar_kota_lepas_kunci" class="form-control currency">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Harga Luar Kota Tidak Lepas Kunci * @error('harga_luar_kota_tidak_lepas_kunci') <b @error('	harga_luar_kota_tidak_lepas_kunci') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                  </div>
                                  <input type="text" name="	harga_luar_kota_tidak_lepas_kunci" class="form-control currency">
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
                                  <input type="text" name="harga24jam_dalam_kota_lepas_kunci" class="form-control currency">
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
                                  <input type="text" name="harga24jam_luar_kota_lepas_kunci" class="form-control currency">
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
                                   
                                  <input type="text" name="keterangan" class="form-control currency">
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Fasilitas *</label>
                                <div class="input-group">
                                  <div class="selectgroup selectgroup-pills">
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="fasilitas[]" value="AC" class="selectgroup-input">
                                      <span class="selectgroup-button">AC</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="fasilitas[]" value="Air Minum" class="selectgroup-input">
                                      <span class="selectgroup-button">Air Minum</span>
                                    </label>
                                    <label class="selectgroup-item">
                                      <input type="checkbox" name="fasilitas[]" value="Makanan" class="selectgroup-input">
                                      <span class="selectgroup-button">Makanan</span>
                                    </label>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer bg-whitesmoke br">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@push('page-scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('after-scripts')
    <script>
        $(document).ready( function () {
            $('#table_id').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'pdf', 'excel', 'print'
            ]
        } );
        } );
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.js"></script>

    <script>
        // alert konfirmasi hapus data
        $(".swal-confirm").click(function(e){
            id = e.target.dataset.id;
            swal({
                title: "Anda yakin ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Data berhasil dihapus!", {
                    icon: "success",
                    });
                    $(`#delete${id}`).submit();
                } else {

                }
            })
        });

        $(".swal-update-status").click(function(e){
            id = e.target.dataset.id;
            swal({
                title: "Tetapkan sebagai produk Terjual ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Produk ditetapkan Terjual!", {
                    icon: "success",
                    });
                    $(`#update-status${id}`).submit();
                } else {

                }
            })
        });

        @if($errors->any())
            $('#createModal').modal('show')
        @endif

    </script>

    <script >
        $(document).ready(function() {
        $('.modal-view-image').on('click', function(){
            let id = $(this).data('id')
            $.ajax({
                url:`produk/modal/${id}`,
                method:"GET",
                success: function(data){
                    $('#imageView').find('.modal-data').html(data)
                    $('#imageView').modal('show')
                },
                error: function(error){
                    console.log(error)
                }
            })
        })
    });
    </script> 
    

@endpush
 