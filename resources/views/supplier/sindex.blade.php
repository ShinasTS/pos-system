@extends('layout')
@section('actives')
       active
@endsection
@section('content')
<section>
    <div class="container-fluid">
        <div >
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Add New Supplier</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="supsubmit">
                            @csrf
                            <div class="row mb-3">
                                <!-- Category Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Supplier Name</label>
                                    <input type="text" name="supname" class="form-control" placeholder="" required />
                                </div>

                                <div class="col-md-6">
                                    <label for="title" class="form-label">Supplier Number</label>
                                    <input type="text" name="supnumber" class="form-control" placeholder="" required />
                                </div>

                                <div class="col-md-6">
                                    <label for="title" class="form-label">Supplier Place</label>
                                    <input type="text" name="supplace" class="form-control" placeholder="" />
                                </div>
                                
                                <!-- Category Status -->
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Supplier Status</label>
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
    All Suppliers
    
    
    </div>
    <div class="card-body">
    
    
    <table class="table">
    <thead>
    <tr>
    <th>#</th>
    <th>Name</th>
    <th>Place</th>
    <th>Phone Number</th>
    <th>Status</th>
    <th>Action</th>
    {{-- <th>Post Body</th> --}}
    </tr>
    </thead>
    
    <tbody>
    @foreach ($sup as $s)
        <tr>
            <td>{{ $s->id }}</td>
            <td>{{ $s->supname }}</td>
            <td>{{ $s->supplace }}</td>
            <td>{{ $s->supnumber }}</td>
            <td>@if($s->status==1)
                True
                @else
                False
                @endif
            </td>
            <td>
                <a href="supedit/{{{$s->id}}}" class='btn btn-primary'>edit</a>
                <a href="supdelete/{{{ $s->id}}}" class='btn btn-danger'>delete</a>
    
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