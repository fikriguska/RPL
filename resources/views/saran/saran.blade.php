@extends('layouts.app')

@section('content')

<h2>Saran</h2>


<div class="heading">
    

    <!-- <div class="input-box">
        <textarea name="saran" style="width:500px; height:200px;" value="" placeholder="Saran kamu..."></textarea> 
    </div> -->
    {!! Form::open(['route' => 'create_saran', 'method' => 'POST']) !!}
        <div class="input-box">
            {{ Form::textarea('pesan', '', ['placeholder'=> "saran kamu..."])}}
        </div>
        {{ Form::submit('submit', ['class'=>'btn btn-primary', 'onclick' => 'alert("Saran Terkirim")'])}}
    {!! Form::close() !!}

    <!-- <div class="btn"> -->
                <!-- <button class="btn-submit" onclick="alert('Saran Terikirim')" type="submit">Save</button> -->
    <!-- </div> -->

</div>


@endsection
