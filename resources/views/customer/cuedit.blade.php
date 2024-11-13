@extends('layout')
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
                        <form method="POST" action="{{route('cusupdate',$cus->id)}}">
                            @csrf
                            <div class="row mb-3">
                                <!-- Category Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">customer Name</label>
                                    <input type="text" name="cusname" class="form-control" value="{{$cus->cusname}}" placeholder="" required />
                                </div>

                                <div class="col-md-6">
                                    <label for="title" class="form-label">customer Number</label>
                                    <input type="text" name="cusnumber" class="form-control" value="{{$cus->cusnumber}}" placeholder="" required />
                                </div>

                                <div class="col-md-6">
                                    <label for="title" class="form-label">customer Place</label>
                                    <input type="text" name="cusplace" class="form-control" value="{{$cus->cusplace}}" placeholder="" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="title" class="form-label">customer Email</label>
                                    <input type="email" class="form-control" id="cusemail" name="cusemail" value="{{$cus->cusemail}}" placeholder="" required>
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