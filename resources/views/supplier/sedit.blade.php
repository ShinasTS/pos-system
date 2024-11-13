@extends('layout')
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
                        <form method="POST" action="{{route('supupdate',$sup->id)}}">
                            @csrf
                            <div class="row mb-3">
                                <!-- Category Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Supplier Name</label>
                                    <input type="text" name="supname" class="form-control" value="{{$sup->supname}}" placeholder="" required />
                                </div>

                                <div class="col-md-6">
                                    <label for="title" class="form-label">Supplier Number</label>
                                    <input type="text" name="supnumber" class="form-control" value="{{$sup->supnumber}}" placeholder="" required />
                                </div>

                                <div class="col-md-6">
                                    <label for="title" class="form-label">Supplier Place</label>
                                    <input type="text" name="supplace" class="form-control" value="{{$sup->supplace}}" placeholder="" required />
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
                            <button type="submit" class="btn btn-success w-25">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    </section>

    @endsection