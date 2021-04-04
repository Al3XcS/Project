@extends('product.layout')

@section('content')
<br><br><br>
<div class="row">

    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Lista Produse</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-warning btn-sm" href="{{ route('create.product') }}">Adauga Produs</a>
        </div>
    </div>
</div>
@if($message = Session::get('success'))
<div class="alert alert-success">
    <p> {{ $message }} </p>
</div>
@endif

<table class="table table-bordered">

    <tr>
        <th width="150px"> Nume Produs </th>
        <th width="50px"> Cod Produs </th>
        <th width="150px"> Descriere Produs </th>
        <th width="100px"> Poza Produs </th>
        <th width="50px"> Actiuni </th>
    </tr>

    @foreach($product as $pro)
    <tr>

        <td>{{$pro->product_name}}</td>
        <td>{{$pro->product_code}}</td>
        <td>
            {{ str_limit($pro->details, $limit = 70) }}
        </td>
        <td><img src="{{ URL::to($pro->logo) }}" height="70px;" width="80px;"></td>
        <td>
            <a class="btn btn-info btn-sm btn-block" href="{{ URL::to('show/product/'.$pro->id) }}">Info</a>
            <a class="btn btn-success btn-sm btn-block" href="{{ URL::to('edit/product/'.$pro->id) }}">Modifica</a>
            <a class="btn btn-danger btn-sm btn-block" href="{{ URL::to('delete/product/'.$pro->id) }}"
            onclick="return confirm('Esti sigur?')">Sterge</a>
        </td>
    </tr>
    @endforeach
</table>
{!! $product->links() !!}


@endsection