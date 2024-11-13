<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS - Tharayil Opticals</title>
    @include('libraries.style')
    
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-dark" >
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/"><h3>Tharayil Opticals</h3></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                                <a class="nav-link @yield('activec')" aria-current="page" href="{{ url('category/catcreate') }}">Category</a>
                                <a class="nav-link @yield('activeb')" href="{{ url('brand/brandcreate') }}">Brand</a>
                                {{-- <a class="nav-link @yield('actives')" href="{{ url('supplier/supcreate') }}">Suppliers</a> --}}
                                <a class="nav-link @yield('activecus')" href="{{ url('customer/cuscreate') }}">Customers</a>
                                <a class="nav-link @yield('activep')" href="{{url('product/procreate')}}">Product</a>
                                <a class="nav-link @yield('activesales')" href="{{url('sales')}}">Sales</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                
                                <a href="{{ route('logout') }}" class="btn btn-danger" style="margin-left: 10px"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                
                        </div>
                    </div>
                </nav>
            </div>
            <div class="content-section">
                @yield('content')
                @yield('content1')
            </div>
        </div>
    </div>
 
    @include('libraries.scripts')

    



</body>
</html>
