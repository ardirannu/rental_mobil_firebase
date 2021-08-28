@extends('admin.layouts.master')

@section('title')
    Dashboard | Admin
@endsection

@push('page-styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-html5-1.7.0/b-print-1.7.0/datatables.css"/>
@endpush

@section('header')
    Detail Pesanan
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
                                <th>ID Produk - Kode Produk - Harga</th>
                                <th>Kode Pesanan - Nama Pemesan - Status</th>
                                <th>Warna</th>
                                <th>Ukuran</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($pesanan_detail as $no => $data)
                            <tr>
                               <td>{{ $no+1 }}</td>
                               <td>{{ $data->produk_id }} - {{ $data->produk->kode_produk }} - Rp. {{ $data->produk->harga}}</td>
                               <td>{{ $data->pesanan->kode_pesanan }} - {{ $data->pesanan->pelanggan->nama_depan}} {{ $data->pesanan->pelanggan->nama_belakang}} - {{ $data->pesanan->status}}</td>
                               <td>{{ $data->warna }}</td>
                               <td>{{ $data->ukuran }}</td>
                               <td>{{ $data->jumlah }}</td>
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

    </script>
@endpush
 