@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Pengiriman Obat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data obat</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="col-md-12">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Kode Tran</th>
                            <th>Kode obat</th>
                            <th>Nis</th>
                            <th>Nama Obat</th>
                            <th>Qty</th>
                            <th>Tanggal Transaksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($dpb as $data)
                          <tr>
                            <td>{{$data->kode_tran}}</td>
                            <td>{{$data->prdcd}}</td>
                            <td>{{$data->nis}}</td>
                            <td>{{$data->nama_obat}}</td>
                            <td>{{$data->qty}}</td>
                            <td>{{$data->created_at}}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <a href="{{ url('/cetak-pengiriman') }}" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Cetak</a>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </section>
  <!-- /.content-wrapper -->
@endsection
