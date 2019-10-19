@extends('admin.master')

@section('body')
    <br/>
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h2 class="text-center text-success">Add Category</h2>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{ Session::get('message') }}</h3>
                    <form action="{{ route('new-category') }}" method="POST" class="from-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-4">Category Name</label>
                            <div class="col-md-8">
                                <input type="text" name="category_name" class="form-control"/>
                                <span class="text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : '' }}</span>
                            </div>
                        </div>
                        <label> </label>
                        <div class="form-group">
                            <label class="control-label col-md-4">Category Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="10" name="category_description"></textarea>
                                <span class="text-danger">{{ $errors->has('category_description') ? $errors->first('category_description') : '' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Publication Status</label>
                            <div class="col-md-8 radio">
                                <label><input type="radio" checked name="publication_status" value="1">Published</label>
                                <label><input type="radio" name="publication_status" value="0">Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Category Info"/>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

