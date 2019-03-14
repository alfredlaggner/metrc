@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Action</h2><br/>
        <form method="post" action="{{action('MetrcTestController@store')}}">
            @csrf
            <input name="main_id" type="hidden" value={{$main_id}}>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="make">Avtivity</label>
                    <input type="text" class="form-control" name="name" value="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-top:60px">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">Create</button>

                    <a href="{{ action('MatrcTestController@index'), $main_id }}" class="btn btn-outline-primary btn-sm" role="button"
                       aria-pressed="true">Abort</a>
                </div>
            </div>
        </form>
    </div>
@endsection