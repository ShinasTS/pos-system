@extends('layout')
@section('activecus')
       active
@endsection
@section('content')
<section>
    <div class="container-fluid">
        <div >
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Add New customer</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="cussubmit">
                            @csrf
                            <div class="row mb-3">
                                <!-- Category Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">customer Name</label>
                                    <input type="text" name="cusname" class="form-control" placeholder="" required />
                                </div>

                                <div class="col-md-6">
                                    <label for="title" class="form-label">customer Number</label>
                                    <input type="text" name="cusnumber" class="form-control" placeholder="" required />
                                </div>

                                <div class="col-md-6">
                                    <label for="title" class="form-label">customer Place</label>
                                    <input type="text" name="cusplace" class="form-control" placeholder="" />
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="form-label">customer Email</label>
                                    <input type="email" class="form-control" id="cusemail" name="cusemail" placeholder="" required>
                                </div>
                                
                                <!-- Category Status -->
                                {{-- <div class="col-md-6">
                                    <label for="status" class="form-label">customer Status</label>
                                    <select class="form-control" name="status" required>
                                        <option value="1" selected>True</option>
                                        <option value="2">False</option>
                                    </select>
                                </div> --}}
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
    All customers
    
    
    </div>
    <div class="card-body">
    
    
    <table class="table">
    <thead>
    <tr>
    <th>#</th>
    <th>Name</th>
    <th>Place</th>
    <th>Phone Number</th>
    <th>Email</th>
    {{-- <th>Status</th> --}}
    <th>Action</th>
    {{-- <th>Post Body</th> --}}
    </tr>
    </thead>
    
    <tbody>
    @foreach ($cus as $c)
        <tr>
            <td>{{ $c->id }}</td>
            <td>{{ $c->cusname }}</td>
            <td>{{ $c->cusplace }}</td>
            <td>{{ $c->cusnumber }}</td>
            <td>{{ $c->cusemail }}</td>
            {{-- <td>@if($s->status==1)
                True
                @else
                False
                @endif
            </td> --}}
            <td>
                <a href="cusedit/{{{$c->id}}}" class='btn btn-primary'>edit</a>
                <a href="cusdelete/{{{ $c->id}}}" class='btn btn-danger'>delete</a>
    
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