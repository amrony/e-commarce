@extends('admin.master')

@section('body')
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="text-center text-success">Update Category</h4>
                </div>
                <div class="panel-body">
                    <h3 class="text-success">{{ Session::get('message') }}</h3>
                    <form action="{{ route('update-category') }}" method="POST" class="from-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label class="control-label col-md-4">Category Name</label>
                            <div class="col-md-8">
                                <input type="text" value="{{ $category->category_name }}" name="category_name" class="form-control"/>
                                <input type="hidden" value="{{ $category->id }}" name="category_id" class="form-control"/>
                            </div>
                        </div>
                        <label> </label>
                        <div class="form-group">
                            <label class="control-label col-md-4">Category Description</label>
                            <div class="col-md-8">
                                <textarea class="form-control" name="category_description">{{ $category->category_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-4">Publication Status</label>
                            <div class="col-md-8 radio">
                                <label><input type="radio" name="publication_status" value="1" {{ $category->publication_status == 1 ? 'checked' : '' }}>Published</label>
                                <label><input type="radio" name="publication_status" value="0" {{ $category->publication_status == 0 ? 'checked' : '' }}>Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Category Info"/>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

