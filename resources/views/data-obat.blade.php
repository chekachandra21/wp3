@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Obat
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
                            <th>Kode obat</th>
                            <th>Nama obat</th>
                            <th>Nama obat</th>
                            <th>stok</th>
                            <th>harga</th>
                            <th>Proses</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($Obat as $data)
                          <tr>
                            <td>{{$data->prdcd}}</td>
                            <td>{{$data->nis}}</td>
                            <td>{{$data->nama_obat}}</td>
                            <td>{{$data->stok}}</td>
                            <td>{{$data->harga}}</td>
                            <td>
                              <form action="{{route('obat.destroy', $data->prdcd)}}" method="post" class="form-inline" accept-charset="utf-8">
                                <a href="{{route('obat.edit', $data->prdcd)}}" class="btn btn-default">Edit</a>
                                  {{csrf_field()}}
                                  <input type="hidden" name="_method" value="delete">
                                  <input type="submit" value="Hapus" class="btn btn-danger">
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
