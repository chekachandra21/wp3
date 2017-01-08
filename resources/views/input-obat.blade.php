@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Obat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Input Obat</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
  		<!-- /.content-wrapper -->
		      <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="{{route('obat.store')}}" method="post">
              {{csrf_field()}}
                <!-- text input -->
                <div class="form-group">
                  <div class="col-md-10">
                  	<label>Kode Suplier</label>
                    <div class="form-inline">
                      <select class="form-control" name="ks">
                        <option>PILIHLAH SALAH SATU</option>
                      @foreach($Suplier as $data)
                        <option value="{{$data->nis}}">{{$data->nis}}</option>
                      @endforeach
                      </select>
                    </div>
                    <br>
                    <label>Nama Obat</label>
                    <div class="form-inline">
                  	 <input type="text" name="no" class="form-control" placeholder="Masukan Nama Obat ...">
                    </div>
                    <br>
                    <label>Stok</label>
                    <div class="form-inline">
                     <input type="text" name="stok" class="form-control" placeholder="Masukan Stok Obat ...">
                    </div>
                    <br>
                    <label>Harga Obat</label>
                    <div class="form-inline">
                     <input type="text" name="ho" class="form-control" placeholder="Masukan Harga Obat ...">
                    </div>
                    <br>
                  	<input type="submit" name="" value="Simpan" class="btn btn-primary">
                  </div>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
      </div>
    </section>
@endsection
