
@extends('transaksis.layout')
@section('content')
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Add New Transaksi</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('transaksis.index') }}"> Back</a>
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
<form action="{{ route('transaksis.store') }}" method="POST">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Nama Barang:</strong>
<select class="form-control" name="nama_barang" id="nama_barang">
    <option value="">Pilih Barang</option>
    @foreach ($bar as $ang)
    <option data-id="{{ $ang->harga_barang }}">{{ $ang->nama_barang}}</option>
    @endforeach
</select>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Harga Barang:</strong>
<!-- <select class="cek form-control" name="harga_barang" id="harga_barang" onekeyup="sum()">
    <option value="">Pilih Harga Barang</option>
    @foreach ($harga as $barang)
    <option value="{{ $barang->harga_barang }}">{{ $barang->harga_barang}}</option>
    @endforeach
</select> -->
<input type="text" id="harga_barang" name="harga_barang">
</div>
</div> 
 <div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Total Barang:</strong>
<input type="number" name="total_barang" class="cek form-control" id="totalbarang" onekey="sum()" placeholder="Total Barang">
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Total Harga:</strong>
<input type="number" name="total_harga" class="total form-control" id="totalharga" onekey="sum()" placeholder="Total Harga">
</div>
</div> 
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Total Bayar:</strong>
<input type="number" name="total_bayar" class="form-control" id="totalbayar" onekey="sum()" placeholder="Total Bayar">
</div>
</div>
<!-- <div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Kembalian:</strong>
<input type="number" name="kembalian" class="form-control" id="kembalian" onekey="sum()" placeholder="Kembalian">
</div> -->
</div> 
<!-- <div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Tanggal Beli:</strong>
<input type="date" name="tgl_beli" class="form-control" placeholder="Tanggal Beli">
</div>
</div> -->
<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</div>
</form>

<script>    
   $('#nama_barang').on('change',function(){
    let harga = $(this).find('option:selected').attr('data-id');

    $('#harga_barang').val(harga);
   });
</script>

<!-- <script>
    function sum(){
        var txtFirstNumberValue = document.getElementById('hargabarang').value;
        var txtSecondNumberValue = document.getElementById('totalbarang').value;
        var result = parseInt(txtFirstNumberValue) * parseInt('txtSecondNumberValue');
        if (!isNaN(result)) {
            document.getElementById('totalharga').value-result;
        }
   }
</script> -->
 <script>
    $('.form-group').on('input','.cek',function(){
        let totalSum = 0;

        var selector = $(this).closest('.row');
        selector.find('.cek').each(function(){
            const inputVal = $(this).val();
            if ($.isNumeric(inputVal)) {
            totalSum += parseFloat(inputVal);
            }
        });
        selector.find('.total').text(totalSum);
    });
</script> 
@endsection
