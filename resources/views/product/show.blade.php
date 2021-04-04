@extends('product.layout')

@section('content')

<br><br><br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Informatii Produs</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success btn-sm" href="{{ route('product.index') }}">Inapoi</a>
        </div>
    </div>
</div>

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nume Produs</strong>
            {{ $data->product_name }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Cod Produs</strong>
            {{ $data->product_code }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Descriere Produs</strong>
            {{ $data->details }}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Poza Produs</strong><br>
            <img src="{{ URL::to($data->logo) }}" height="200px;" width="200px;">
        </div>
    </div>

</div>







@endsection