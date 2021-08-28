@extends('admin.layouts.master')

@section('title')
    Dashboard | Admin
@endsection

@push('page-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.css"/>
@endpush

@section('header')
    Pelanggan
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
                    <table id="table_id" table table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Depan</th>
                                <th>Nama Belakang</th>
                                <th>Email</th>
                                <th>No. Handphone</th>
                                <th>Jenis Kelamin</th>
                                <th>Tanggal Lahir</th>
                                <th>Terdaftar Pada Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($pelanggan as $no => $data)
                            <tr>
                               <td>{{ $no+1 }}</td>
                               <td>{{ $data->nama_depan }}</td>
                               <td>{{ $data->nama_belakang }}</td>
                               <td>{{ $data->email }}</td>
                               <td>{{ $data->no_hp }}</td>
                               <td>{{ $data->jkl }}</td>
                               <td>{{ $data->tgl_lahir }}</td>
                               <td>{{ $data->created_at }}</td>
                               <td>
                                <a href="#" data-id="{{ $data->id }}" class="badge badge-danger swal-confirm">
                                    <form action="{{ route('pelanggan.destroy', $data->id) }}" id="delete{{ $data->id }}" method="POST">
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
                <form action="{{ route('pelanggan.store')}}" method="POST">
                    @csrf
                    <div class="row">  
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama Depan * @error('nama_depan') <b @error('nama_depan') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        Aa
                                    </div>
                                  </div>
                                  <input type="text" name="nama_depan" class="form-control currency">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Nama Belakang * @error('nama_belakang') <b @error('nama_belakang') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        aA
                                    </div>
                                  </div>
                                  <input type="text" name="nama_belakang" class="form-control currency">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Email * @error('email') <b @error('email') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
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
                                <label>Password * @error('password') <b @error('password') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-lock"></i>
                                    </div>
                                  </div>
                                  <input type="password" id="password" name="password" class="form-control currency">
                                </div>
                                <input class="mt-2" type="checkbox" id="checkbox"> Tampilkan Password
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>No. Handphone * @error('no_hp') <b @error('no_hp') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                  </div>
                                  <input type="number" name="no_hp" class="form-control currency">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Jenis Kelamin * @error('jkl') <b @error('jkl') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-venus-mars"></i>
                                    </div>
                                  </div>
                                  <select name="jkl" class="form-control" id="selectKategori">
                                    <option value="" hidden>Pilih Jenis Kelamin</option>
                                    <option name="jkl" value="Laki-Laki" @if(old('jkl') == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                    <option name="jkl" value="Perempuan" @if(old('jkl') == 'Perempuan') selected @endif>Perempuan</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Tanggal Lahir * @error('tgl_lahir') <b @error('tgl_lahir') class="text-danger" @enderror> {{ "(".$message.")" }} </b> @enderror </label>
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="far fa-calendar-check"></i>
                                    </div>
                                  </div>
                                  <input type="date" name="tgl_lahir" class="form-control currency">
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

    <script >
        $(document).ready(function() {
        $('.modal-view-image').on('click', function(){
            let id = $(this).data('id')
            $.ajax({
                url:`pelanggan/modal/${id}`,
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
 