@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Edit Actions</h2><br/>
        <form method="post" action="{{action('MetrcTestController@update', $id)}}">
            @csrf
            <input name="main_id" type="text" value={{ $detail['main_id']}}>

            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="make">Template?</label>
                    <input type="text" class="form-control" name="is_template" value={{$detail->is_template}}>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="make">Avtivity</label>
                    <input type="text" class="form-control" name="name" value={{$detail->name}}>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="make">JSON Request</label>
                    <input type="text" class="form-control" name="json_block" value={{$detail->json_block}}>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="make">Comments</label>
                    <input type="text" class="form-control" name="comments" value={{$detail->comments}}>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="make">Action</label>
                    <input type="text" class="form-control" name="action" value={{$detail->action}}>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="make">Result</label>
                    <input type="text" class="form-control" name="result" value={{$detail->result}}>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="make">Verification Text</label>
                    <input type="text" class="form-control" name="verification" value={{$detail->verification}}>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="make">Date</label>
                    <input type="text" class="form-control" name="test_date" value={{$detail->test_date}}>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4" style="margin-top:60px">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">Save</button>

                    <a href="{{ route('metrc.index') }}" class="btn btn-outline-primary btn-sm" role="button"
                       aria-pressed="true">Abort</a>
                </div>
            </div>
        </form>
    </div>
@endsection