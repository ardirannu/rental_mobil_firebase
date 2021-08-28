@extends('admin.layouts.master')

@section('title')
    Dashboard | Admin
@endsection

@push('page-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.css"/>
@endpush

@section('header')
    Data Pesanan
@endsection 
 
@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <hr>
              <div class="card">
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table id="table_id" table table-striped">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Kode Pesanan</th>
                                <th>ID Pelanggan</th>
                                <th>Alamat Pelanggan</th>
                                <th>Total Pembayaran</th>
                                <th>Resi Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($pesanan as $no => $data)
                            <tr>
                               <td>{{ $no+1 }}</td>
                               <td>{{ $data->kode_pesanan }}</td>
                               <td>{{ $data->pelanggan_id }}</td>
                               <td>{{ $data->alamat_pelanggan->nama_jalan }}, {{ $data->alamat_pelanggan->kota }}, {{ $data->alamat_pelanggan->provinsi }}</td>
                               <td>{{ $data->total_pembayaran }}</td>
                               <td>
                                   @if ($data->resi_pembayaran == '')
                                   @else    
                                   <img src="{{ asset('resi_pembayaran/'.$data->resi_pembayaran) }}" class="imagecheck-image" width="50" height="50">
                                   @endif
                               </td>
                               <td>{{ $data->status }}</td>
                               <td>
                                @if ($data->status == 'Pesanan Berhasil')
                                @else
                                <a href="#" data-id="{{ $data->id }}" class="badge badge-warning swal-update-status mt-2 text-dark">
                                    <form action="{{ route('pesanan.update_status', $data->id) }}" id="update_status{{ $data->id }}" method="POST">
                                    @csrf
                                    </form> 
                                    Update Status Pesanan
                                </a>
                                @endif
                                <a href="#" data-id="{{ $data->id }}" class="badge badge-primary mt-2 modal-view-resi">Lihat Resi Pembayaran</a>
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
            <h5 class="modal-title">Gambar Resi Pembayaran</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body text-center modal-data">
                
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

         // alert konfirmasi update status pesanan
         $(".swal-update-status").click(function(e){
            id = e.target.dataset.id;
            swal({
                title: "Tetapkan Pesanan Berhasil ?",
                icon: "success",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Pesanan Ditetapkan berhasil!", {
                    icon: "success",
                    });
                    $(`#update_status${id}`).submit();
                } else {

                }
            })
        }); 

    </script>

<script >
    $(document).ready(function() {
    $('.modal-view-resi').on('click', function(){
        let id = $(this).data('id')
        $.ajax({
            url:`pesanan/modal/${id}`,
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
 