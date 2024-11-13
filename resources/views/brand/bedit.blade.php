@extends('layout')
@section('content')

<section>
    <div class="container">
    <div class="row">
    <div class="col-md-6 offset-md-3">
    <div class="card">
    <div class="card-header">
    Edit Brand
    </div>
    <div class="card-body">
    
    </div>
    
    <form method="POST" action="{{route('brandupdate',$brand->id)}}">
    @csrf
    <input type="hidden" name="id" value="{{$brand->id}}"/>
    <div class="form-group">
    <label for="title">Brand Title</label>
    <input type="text" name="brandname" class="form-control" value="{{$brand->brandname}}" placeholder=""/>
    </div>
    <div class="form-group">
        <label for="body"> Brand status</label>
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