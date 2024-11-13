@extends('layout')
@section('content')

<div class="container-fluid">
    <div >
        <div class="col-md-10 offset-md-1">
            <div class="card">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">edit product details</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('proupdate',$pro->procode)}}">
                        @csrf
                        <div class="row mb-3">
                            <!-- Category Title -->
                            <div class="col-md-6">
                                <label for="title" class="form-label">Product Code</label>
                                <input type="text" name="procode" class="form-control" value="{{$pro->procode}}" placeholder="" required />
                            </div>

                            <div class="col-md-6">
                                <label for="title" class="form-label">Product Name</label>
                                <input type="text" name="proname" class="form-control" value="{{$pro->proname}}" placeholder="" required />
                            </div>

                            
                            
                            <!-- Category Status --> 
                           
                            <div class="col-md-6">
                                <label for="category">Category</label>
                                <select name="cat_id" id="category" class="form-control" required>
                                    <option value="">Select a Category</option>
                                    @foreach($cat as $id => $catname)
                                        <option value="{{ $id }}">{{ $catname }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="brand">Brand</label>
                                <select name="brand_id" id="brand" class="form-control" required>
                                     <option value="">Select a Brand</option>
                                    @foreach($brand as $id => $brandname)
                                        <option value="{{ $id }}">{{ $brandname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="title" class="form-label">details</label>
                                <input type="text" name="details" class="form-control" placeholder="" value="{{$pro->details}}"/>
                            </div> 

                            <div class="col-md-3">
                                <label for="title" class="form-label">Qty</label>
                                <input type="number" name="qty" class="form-control" placeholder="" value="{{$pro->qty}}" required/>
                                
                            </div> 

                            <div class="col-md-3">
                                <label for="title" class="form-label">Price</label>
                                <input type="text" name="price" class="form-control" value="{{$pro->price}}" placeholder="" />
                            </div> 

                            {{-- <div class="col-md-6">
                                <label for="title" class="form-label">specifications</label>
                                <input type="text" name="supplace" class="form-control" placeholder="" />
                            </div>  --}}




                        </div>
                        <button type="submit" class="btn btn-success w-25">Submit</button>
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