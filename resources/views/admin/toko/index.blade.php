@extends('admin.layouts.master')

@section('title')
    Dashboard | Admin
@endsection

@push('page-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.css"/>
@endpush

@section('header')
    Toko
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
            @can('tombol_superadmin')
            <div class="col-12 col-md-6 col-lg-6">
                <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Tambah Data</button>
            </div>
            @endcan
            <div class="col-12">
                <hr>
              <div class="card">
                <div class="card-body p-0">
                  <div class="table-responsive">
                      @can('table_superadmin')
                      <table id="table_id" table table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Toko</th>
                                <th>Alamat</th>
                                <th>Nama Rekening</th>
                                <th>No. Rekening</th>
                                <th>Nama Bank</th>
                                <th>Email</th>
                                <th>Call Center</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($toko as $no => $data)
                            <tr>
                               <td>{{ $no+1 }}</td>
                               <td>{{ $data->nama_toko }}</td>
                               <td>{{ $data->alamat }}</td>
                               <td>{{ $data->nama_rekening }}</td>
                               <td>{{ $data->no_rekening }}</td>
                               <td>{{ $data->nama_bank }}</td>
                               <td>{{ $data->email }}</td>
                               <td>{{ $data->call_center }}</td>
                               <td>
                                <a href="#" data-id="{{ $data->id }}" class="badge badge-danger swal-confirm">
                                    <form action="{{ route('toko.destroy', $data->id) }}" id="delete{{ $data->id }}" method="POST">
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
                    @endcan
                </div>
            </div>
        </div>
    </div> 
    </div>
    </div>
@endsection

@section('modal')
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
                <form action="{{ route('toko.store')}}" method="POST">
                    @csrf
                    <div class="row">  
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama Toko <b class="text-danger">*</b> @error('nama_toko') <b @error('nama_toko') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Aa
                                    </div>
                                  </div>
                                  <input type="text" name="nama_toko" class="form-control currency">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Alamat <b class="text-danger">*</b> @error('alamat') <b @error('alamat') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-map-marked-alt"></i>
                                    </div>
                                  </div>
                                  <input type="text" name="alamat" class="form-control currency">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama Rekening <b class="text-danger">*</b> @error('nama_rekening') <b @error('nama_rekening') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Aa
                                    </div>
                                  </div>
                                  <input type="text" name="nama_rekening" class="form-control currency">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>No. Rekening <b class="text-danger">*</b> @error('no_rekening') <b @error('no_rekening') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                    </div>
                                  </div>
                                  <input type="number" name="no_rekening" class="form-control currency">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama Bank <b class="text-danger">*</b> @error('nama_bank') <b @error('nama_bank') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-money-check-alt"></i>
                                    </div>
                                  </div>
                                  <input type="text" name="nama_bank" class="form-control currency">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Email <b class="text-danger">*</b> @error('email') <b @error('email') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope-open-text"></i>
                                    </div>
                                  </div>
                                  <input type="text" name="email" class="form-control currency">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Call Center <b class="text-danger">*</b> @error('call_center') <b @error('call_center') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                  </div>
                                  <input type="number" name="call_center" class="form-control currency">
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

    <script>
    $(document).ready(function(){
        $('#checkbox').on('change', function(){
            $('#password').attr('type',$('#checkbox').prop('checked')==true?"text":"password"); 
        });
    });
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

        @if($errors->any())
            $('#createModal').modal('show')
        @endif
    </script>

@endpush
 