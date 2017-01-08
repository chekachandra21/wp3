@extends('layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Obat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Obat</li>
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
              <form role="form" action="{{route('obat.update',$Prodmast->prdcd)}}" method="post">
              {{csrf_field()}}
                <!-- text input -->
                <div class="form-group">
                  <div class="col-md-10">
                    <label>Kode Obat</label>
                    <div class="form-inline">
                    	<input type="text" name="ko" class="form-control" value="{{$Prodmast->prdcd}}" placeholder="Masukan Kode Obat ...">
                      <input type="hidden" name="_method" value="put">
                    </div>
                    <br>
                  	<label>Kode Suplier</label>
                    <div class="form-inline">
                      <select class="form-control" name="ks">
                        <option value="{{$Prodmast->nis}}">{{$Prodmast->nis}}</option>
                      </select>
                    </div>
                    <br>
                    <label>Nama Obat</label>
                    <div class="form-inline">
                  	 <input type="text" name="no" class="form-control" value="{{$Prodmast->nama_obat}}" placeholder="Masukan Nama Obat ...">
                    </div>
                    <br>
                    <label>Harga Obat</label>
                    <div class="form-inline">
                     <input type="text" name="ho" class="form-control" value="{{$Prodmast->harga}}" placeholder="Masukan Harga Obat ...">
                    </div>
                    <br>
                  	<input type="submit" name="" value="Update" class="btn btn-primary">
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
