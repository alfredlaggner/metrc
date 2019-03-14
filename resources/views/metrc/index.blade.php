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
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($mains as $main)
                @php
                        @endphp

                <tr>
                    <td>{{$main['id']}}</td>
                    <td>{{$main['name']}}</td>

                    <td>
                        <a href="{{action('MetrcMainController@edit', $main['id'])}}" class="btn btn-warning">Edit</a>
                    </td>
                    <td>
                        <a href="{{action('MetrcTestController@index', $main['id'])}}" class="btn btn-warning">View</a>
                    </td>
                    <td>
                        <form action="{{action('MetrcMainController@destroy', $main['id'])}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <form action="{{action('MetrcMainController@create')}}" method="get">
            @csrf
            <input name="_method" type="hidden" value="CREATE">
            <button class="btn btn-primary" type="submit">Add Activity</button>
 {{--           <a href="{{ route('metrctests'), [$main['id']] }}" class="btn btn-outline-primary btn-sm" role="button"
               aria-pressed="true">Home</a>
--}}
        </form>

    </div>
@endsection
