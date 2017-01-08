@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Permintaan Obat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Permintaan obat</li>
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
                      <table id="" class="table table-bordered table-striped">
                        <thead>
                          <tr>
                            <th>Kode obat</th>
                            <th>Nis</th>
                            <th>Nama obat</th>
                            <th>stok</th>
                            <th>harga</th>
                            <th>Proses</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($Permintaan as $data)
                          <tr>
                            <td>{{$data->prdcd}}</td>
                            <td>{{$data->nis}}</td>
                            <td>{{$data->nama_obat}}</td>
                            <td>{{$data->stok}}</td>
                            <td>{{$data->harga}}</td>
                            <td>
                              <form action="{{route('pesan.store')}}" method="post" class="form-inline" accept-charset="utf-8">
                                {{csrf_field()}}
                                <input type="hidden" name="ko" value="{{$data->prdcd}}">
                                <input type="hidden" name="ks" value="{{$data->nis}}">
                                <input type="text" name="qty" value="" placeholder="Masukan Qty">
                                <input type="submit" value="Proses" class="btn btn-primary">
                              </form>
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
    </section>
  <!-- /.content-wrapper -->
@endsection
