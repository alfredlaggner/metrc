@extends('layouts.app')
@section('content')
    <div class="container">
        <br/>
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br/>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
                <th>Date</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($details as $detail)
                @php
                        @endphp

                <tr>
                    <td>{{$detail['id']}}</td>
                    <td>{{$detail['name']}}</td>
                    <td>{{$detail['action']}}</td>
                    <td>{{$detail['test_date']}}</td>

                    <td><a href="{{action('MetrcTestController@edit', $detail['id'])}}" class="btn btn-warning">Edit</a>
                    <td>
                        <form action="{{action('MetrcTestController@destroy', $detail['id'])}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <form action="{{action('MetrcTestController@create')}}" method="get">
            @csrf
            <input name="_method" type="hidden" value="CREATE">

            <button class="btn btn-primary" type="submit">Add Detail</button>

            <a href="{{ route('go-home') }}" class="btn btn-outline-primary btn-sm" role="button"
               aria-pressed="true">Back to Overview</a>
        </form>

    </div>
@endsection
