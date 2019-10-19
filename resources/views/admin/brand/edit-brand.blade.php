@extends('admin.master')

@section('body')
    <br/>
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-body">
                    <h3 class="text-success">{{ Session::get('message') }}</h3>
                    {{ Form::open(['route'=>'update-brand', 'method'=>'POST', 'class'=>'form-horizontal']) }}
                    <div class="form-group">
                        <label class="control-label col-md-3">Brand Name</label>
                        <div class="col-md-9">
                            <input type="text" name="brand_name" value="{{ $brand->brand_name }}" class="form-control"/>
                            <input type="hidden" name="brand_id" value="{{ $brand->id }}" class="form-control"/>
                            <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Brand Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="brand_description">{{ $brand->brand_description }}</textarea>
                            <span class="text-danger">{{ $errors->has('brand_description') ? $errors->first('brand_description') : '' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Publication Status</label>
                        <div class="col-md-9 radio">
                            <label><input type="radio" name="publication_status" value="1" {{ $brand->publication_status == 1 ? 'checked' : '' }}>Published</label>
                            <label><input type="radio" name="publication_status" value="0" {{ $brand->publication_status == 0 ? 'checked' : '' }}>Unpublished</label>
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



