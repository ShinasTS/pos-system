@extends('layout')
@section('activep')
       active
@endsection
@section('content')
<section>
    <div class="container-fluid">
        <div >
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Add New Product</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="prosubmit">
                            @csrf
                            <div class="row mb-3">
                                <!-- Category Title -->
                                <div class="col-md-6">
                                    <label for="title" class="form-label">Product Code</label>
                                    <input type="text" name="procode" class="form-control" placeholder="" required />
                                </div>

                                <div class="col-md-6">
                                    <label for="title" class="form-label">Product Name</label>
                                    <input type="text" name="proname" class="form-control" placeholder="" required />
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
                                    <input type="text" name="details" class="form-control" placeholder="" />
                                </div> 

                                <div class="col-md-3">
                                    <label for="title" class="form-label">Qty</label>
                                    <input type="number" name="qty" class="form-control" placeholder="" value="0" required/>
                                    
                                </div> 

                                <div class="col-md-3">
                              
                                    <label for="title" class="form-label">Price</label>
                                    <input type="text" name="price" class="form-control" placeholder="" required/>
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


@endsection


@section('content1')
<section>
    <div class="container-fluid">
    <div >
    <div class="col-md-10 offset-md-1">
    <div class="card">
    <div class="card-header">
    All Products
    
    
    </div>
    <div class="card-body">
    
    
    <table class="table">
    <thead>
    <tr>
    {{-- <th>#</th> --}}
    <th>code</th>
    <th>Name</th>
    <th>category</th>
    <th>brand</th>
    <th>details</th>
    <th>qty</th>
    <th>price</th>
    <th>Action</th>
    {{-- <th>Post Body</th> --}}
    </tr>
    </thead>
    
    <tbody>
    @foreach ($pro as $p)
        <tr>
            {{-- <td>{{ $p->id }}</td> --}}
            <td>{{ $p->procode }}</td>
            <td>{{ $p->proname }}</td>
            <td>{{ $p->category->catname}}</td>
            <td>{{ $p->brand->brandname}}</td>
            <td>{{ $p->details}}</td>
            <td>{{ $p->qty}}</td>
            <td>{{ $p->price }}</td>

          
            <td>
                <a href="proedit/{{{$p->procode}}}" class='btn btn-primary'>edit</a>
                <a href="prodelete/{{{ $p->procode}}}" class='btn btn-danger'>delete</a>
    
            </td>
    
            
    
        </tr>
        <tr>
            <td></td>
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