@extends('layouts.app')

@section('content')

<h2>Saran</h2>


<div class="heading">
    

    <div class="input-box">
        <textarea name="saran" style="width:500px; height:200px;" value="" placeholder="Saran kamu..."></textarea> 
    </div>

    <div class="btn">
                <button class="btn-submit" onclick="alert('Saran Terikirim')" type="submit">Save</button>
            </div>

</div>


@endsection
