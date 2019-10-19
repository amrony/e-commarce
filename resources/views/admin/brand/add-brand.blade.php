@extends('admin.master')

@section('body')
    <br/>
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h2 class="text-success text-center">Add Brand</h2>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{ Session::get('message') }}</h3>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    {{ Form::open(['route'=>'new-brand', 'method'=>'POST', 'class'=>'form-horizontal']) }}
{{--                    @csrf--}}
{{--                    @method('patch')--}}
                    <div class="form-group">
                        <label class="control-label col-md-3">Brand Name</label>
                        <div class="col-md-9">
                            <input type="text" name="brand_name" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Brand Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" rows="10" name="brand_description"></textarea>
                            <span class="text-danger">{{ $errors->has('brand_description') ? $errors->first('brand_description') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Publication Status</label>
                        <div class="col-md-9 radio">
                            <label><input type="radio" checked name="publication_status" value="1">Published</label>
                            <label><input type="radio" name="publication_status" value="0">Unpublished</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Brand Info"/>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection



