@extends('layout')

@section('content')
<section>
    <div class="container-fluid">
        <div >
        <div class="col-md-12 offset-md-0">
        <div class="card">
        <div class="card-header">
        pending orders        
        
        </div>
        <div class="card-body">
        
        
        <table class="table">
        <thead>
        <tr>
        {{-- <th>#</th> --}}
        <th>Sales ID</th>
        <th>Customer Name</th>
        <th>Number</th>
        <th>Order Date</th>
        <th>Delivery Date</th>
       
        <th>Total value</th>
        <th>Balance</th>
        <th>Action</th>
        {{-- <th>Post Body</th> --}}
        </tr>
        </thead>
        
        <tbody> 
        @foreach ($salecomplete as $c)
            <tr>
             
                <td>{{ $c->id }}</td>
                <td>{{ $c->customer->cusname}}</td> 
                <td>{{ $c->customer->cusnumber}}</td> 
                <td>{{ $c->created_at->format('d-m-Y')}}</td>
              
                <td>{{ \Carbon\Carbon::parse($c->dd)->format('d-m-Y') }}</td>

                <td>{{ $c->disctotal }}</td>
                <td>{{ $c->balance }}</td>
    
              
                <td>
                    <a href="salecomplete/{{{$c->id}}}" target="_blank" class='btn btn-primary'>Sale completed</a>
                    <a href="viewinvoice/{{{$c->id}}}" target="_blank" class='btn btn-secondary'>view invoice</a>
                    <a href="saledelete/{{{ $c->id}}}" class='btn btn-danger'>delete</a>
        
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
        



<div class="container-fluid">
        <div >
        <div class="col-md-12 offset-md-0">
        <div class="card">
        <div class="card-header">
        sales History
        
        
        </div>
        <div class="card-body">
        
        
        <table class="table">
        <thead>
        <tr>
        {{-- <th>#</th> --}}
        <th>Sales ID</th>
        <th>Customer Name</th>
        <th>Number</th>
        <th>Order Date</th>
        <th>Delivery Date</th>
       
        <th>Total value</th>
        <th>Action</th>
        {{-- <th>Post Body</th> --}}
        </tr>
        </thead>
        
        <tbody> 
        @foreach ($sales as $c)
            <tr>
             
                <td>{{ $c->id }}</td>
                <td>{{ $c->customer->cusname}}</td> 
                <td>{{ $c->customer->cusnumber}}</td> 
                <td>{{ $c->created_at->format('d-m-Y')}}</td>
              
                <td>{{ \Carbon\Carbon::parse($c->dd)->format('d-m-Y') }}</td>

                <td>{{ $c->disctotal }}</td>
    
              
                <td>
                    {{-- <a href="salecomplete/{{{$c->id}}}" target="_blank" class='btn btn-primary'>Sale completed</a> --}}
                    <a href="viewinvoice/{{{$c->id}}}" target="_blank" class='btn btn-secondary'>view invoice</a>
                    <a href="saledelete/{{{ $c->id}}}" class='btn btn-danger'>delete</a>
        
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