
@extends('barangs.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Add New Barang</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('barangs.index') }}"> Back</a>
</div>
</div>
</div>
@if ($errors->any())
<div class="alert alert-danger">
<strong>Whoops!</strong> There were some problems with your input.<br><br>
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{ route('barangs.store') }}" method="POST">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Barang:</strong>
<input type="string" name="nama_barang" class="form-control" placeholder="Nama Barang">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Merek:</strong>
<select class="form-control" name="nama_merek">
    <option value"">Pilih Merek</option>
    @foreach ($nama as $merek)
    <option value="{{ $merek->nama_merek }}">{{ $merek->nama_merek }}</option>
    @endforeach
</select>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Distributor:</strong>
<select class="form-control" name="nama_distributor">
    <option value"">Pilih Distributor</option>
    @foreach ($distri as $butor)
    <option value="{{ $butor->nama_distributor }}">{{ $butor->nama_distributor}}</option>
    @endforeach
</select>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Harga Barang:</strong>
<div id="harga"></div>
<input type="number" min="0" name="harga_barang"  class="form-control" placeholder="Harga Barang">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Harga Beli:</strong>
<input type="number" min="0" name="harga_beli" class="form-control" placeholder="Harga Beli">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Stok:</strong>
<input type="number" min="0" name="stok" class="form-control" placeholder="Stok">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Tanggal Masuk:</strong>
<input type="date" name="tgl_masuk" class="form-control" placeholder="Tanggal Masuk">
</div>
</div>
<!-- <div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Petugas:</strong>
<input type="text" name="nama_petugas" class="form-control" placeholder="Nama Petugas" value="" disabled >
<select name="nama_petugas" id="" class="form-control" disabled>
    <option value="{{ Auth::User()->name }}">{{ Auth::User()->name }}</option>
</select>
</div>
</div> -->
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
<script type="text/javascript">
        $(document).ready(function() {
            $('#nama_barang').on('change', function() {
                var namaBarang = $(this).val();
                $.ajax({
                    type: 'GET',
                    url: '{{ route('getHarga') }}?nama_barang=' + namaBarang,
                    dataType: 'json',
                    success: function (response) {
                        $.each(response.hargas, function (key, item) {
                            $('#harga').empty();
                            $('#harga').append('<input class="form-control" id="harga_barang" name="harga_barang" value="'+ item.harga_barang +'" style="cursor: not-allowed;">')
                        });
                    }
                });
            })
        });
</script>
<script>
$(document).ready(function())public function getHarga(Request $request)
    {
        $hargas['nama_barang'] = Barang::where('nama_barang', $request->nama_barang)
                                ->first();
        return response()->json([
            'hargas' => $hargas,
        ]);
    }
    </script>
</form>
@endsection
