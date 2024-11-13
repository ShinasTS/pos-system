@extends('layout')
@section('activec')
       active
@endsection
@section('content')
<section>
    <div class="container-fluid">
        <div >
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Add New Category</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="catsubmit">
                            @csrf
                            <div class="row mb-3">
                                <!-- Category Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Category Title</label>
                                    <input type="text" name="catname" class="form-control" placeholder="Enter category title" required />
                                </div>
                                
                                <!-- Category Status -->
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Category Status</label>
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
    All Categorires
    
    
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
    @foreach ($cat as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->catname }}</td>
            <td>@if($c->status==1)
                True
                @else
                False
                @endif
            </td>
            <td>
                <a href="catedit/{{{$c->id}}}" class='btn btn-primary'>edit</a>
                <a href="catdelete/{{{ $c->id}}}" class='btn btn-danger'>delete</a>
    
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