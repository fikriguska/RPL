@extends('layouts.app')

@section('content')

@if(count($produk) > 0)
    @foreach($produk as $p)
        <h2> <a href="/produk/{{$p->id}}"> {{ $p->nama }} </a> </h2>
    @endforeach
@else
    <h2> Daftar Produk Kosong? Hubungi Admin! </h2>
@endif

@endsection