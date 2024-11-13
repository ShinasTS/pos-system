@extends('layout')
@section('content')

<section>
    <div class="container">
    <div class="row">
    <div class="col-md-6 offset-md-3">
    <div class="card">
    <div class="card-header">
    Edit category
    </div>
    <div class="card-body">
    
    </div>
    
    <form method="POST" action="{{route('catupdate',$cat->id)}}">
    @csrf
    <input type="hidden" name="id" value="{{$cat->id}}"/>
    <div class="form-group">
    <label for="title">Blog Post Title</label>
    <input type="text" name="catname" class="form-control" value="{{$cat->catname}}" placeholder=""/>
    </div>
    <div class="form-group">
        <label for="body"> category status</label>
        <select class="form-control" name="status" >
            <option selected value="1">True</option>
           
            <option value="2">False</option>
        </div>
    <input type="submit" class="btn btn-success" value="Update">
    </form>
    
    </div>
    
    
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    </section>

    @endsection