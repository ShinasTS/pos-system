@extends('layout')
@section('activeb')
       active
@endsection
@section('content')
<section>
    <div class="container-fluid">
        <div >
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Add New Brand</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="brandsubmit">
                            @csrf
                            <div class="row mb-3">
                                <!-- Category Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Brand Name</label>
                                    <input type="text" name="brandname" class="form-control" placeholder="Enter category title" required />
                                </div>
                                
                                <!-- Category Status -->
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Brand Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1" selected>True</option>
                                        <option value="2">False</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success w-25">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection


@section('content1')
<section>
    <div class="container-fluid">
    <div >
    <div class="col-md-10 offset-md-1">
    <div class="card">
    <div class="card-header">
    All Brands
    
    
    </div>
    <div class="card-body">
    
    
    <table class="table">
    <thead>
    <tr>
    <th>#</th>
    <th>Title</th>
    <th>Status</th>
    <th>Action</th>
    {{-- <th>Post Body</th> --}}
    </tr>
    </thead>
    
    <tbody>
    @foreach ($brand as $b)
        <tr>
            <td>{{ $b->id }}</td>
            <td>{{ $b->brandname }}</td>
            <td>@if($b->status==1)
                True
                @else
                False
                @endif
            </td>
            <td>
                <a href="brandedit/{{{$b->id}}}" class='btn btn-primary'>edit</a>
                <a href="branddelete/{{{ $b->id}}}" class='btn btn-danger'>delete</a>
    
            </td>
    
            
    
        </tr>
    @endforeach
    
    
    </tbody>
    </table>
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    </div>
    
    </section>

    @endsection
</body>
</html>