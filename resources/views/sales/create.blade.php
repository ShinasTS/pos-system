@extends('layout')
@section('content')
@section('activesales')
       active
@endsection
<div class="container">
   

    <div class="row">
        <!-- Customer and Product Details Form -->
        <div class="col-md-8">
            <form action="" class="form-horizontal" id="frmInvoice">
                
                <!-- Customer Details -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Customer Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="cusnumber" class="form-label">Customer Number</label>
                                <input type="text" class="form-control" placeholder="Phone number" id="cusnumber" name="cusnumber" required>
                            </div>
                            <div class="col">
                                <label for="cusname" class="form-label">Customer Name</label>
                                <input type="text" class="form-control" placeholder="Name" id="cusname" name="cusname">
                            </div>
                            <div class="col">
                                <label for="cusplace" class="form-label">Place</label>
                                <input type="text" class="form-control" placeholder="Place" id="cusplace" name="cusplace">
                            </div>
                            <div class="">
                                <label for="cusemail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="cusemail" name="cusemail"  placeholder="Email" required>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>

                <!-- Product Details -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Add Products</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="barcode" class="form-label">Product Code</label>
                                <input type="text" class="form-control" placeholder="Code" id="barcode" name="barcode" required>
                            </div>
                            <div class="col">
                                <label for="pname" class="form-label">Product Name</label>
                                <input type="text" class="form-control" placeholder="Product Name" id="pname" name="pname" disabled>
                            </div>
                            <div class="col">
                                <label for="pro_price" class="form-label">Price</label>
                                <input type="text" class="form-control pro_price" placeholder="Price" id="pro_price" name="pro_price">
                            </div>
                            <div class="col">
                                <label for="qty" class="form-label">Quantity</label>
                                <input type="number" class="form-control pro_price" placeholder="Qty" id="qty" name="qty" min="1" value="1" required>
                            </div>
                            <div class="col">
                                <label for="total_cost" class="form-label">Amount</label>
                                <input type="text" class="form-control" placeholder="Total Cost" id="total_cost" name="total_cost">
                            </div>
                            <div class="col-auto align-self-end">
                                <button class="btn btn-success w-100" id="addButton" type="button" onclick="addproduct(); " disabled>Add</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product List -->
                <table class="table table-bordered" id="product_list">
                    <caption>Products</caption>
                    <thead class="table-light">
                        <tr>
                            <th style="width: 40px">Remove</th>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Unit Price</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </form>
        </div>

        <!-- Invoice Summary and Actions -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Invoice Summary</h5>

                    <div class="form-group mb-3">
                        <label for="total" class="form-label">Total</label>
                        <input type="text" class="form-control" placeholder="Total" id="total" name="total" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="discount" class="form-label">Discount</label>
                        <input type="text" class="form-control" placeholder="Discount" id="discount" name="discount">
                    </div>
                    <div class="form-group mb-3">
                        <label for="distotal" class="form-label">Discounted Total</label>
                        <input type="text" class="form-control" placeholder="Discounted Total" id="distotal" name="distotal" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="pay" class="form-label">Pay</label>
                        <input type="text" class="form-control" placeholder="Pay" id="pay" name="pay" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="balance" class="form-label">Balance</label>
                        <input type="text" class="form-control" placeholder="Balance" id="balance" name="balance" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="payment" class="form-label">Payment Method</label>
                        <select class="form-control" name="payment" id="payment" required>
                            <option value="">Please select</option>
                            <option value="cash">Cash</option>
                            <option value="card">Card</option>
                            <option value="qr">QR</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="date" class="form-label">Delivery Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    
                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" id="save" class="btn btn-info me-2" onclick="addProject()">Print Invoice</button>
                        <button type="button" id="clear" class="btn btn-warning" onclick="reset()">Reset</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>    

<script>
        const inputField = document.getElementById('barcode');
        const submitButton = document.getElementById('addButton');
        // Function to check input value and enable/disable button
        function toggleButtonState() {
            if (inputField.value.trim() !== '') {
                submitButton.disabled = false; // Enable button
            } else {
                submitButton.disabled = true; // Disable button
            }
        }
        // Event listener for input field
        inputField.addEventListener('input', toggleButtonState);




   
    let customerName = '';
    let customerPlace = '';
    let customerNumber = '';
    let customerEmail = '';
    let ownermail = 'shinasts18@gmail.com';


    function getCustomer(){

    $("#cusnumber").empty();
    $("#cusnumber").keyup(function(e){
    console.log("event is triggered");
    var q = $("#cusnumber").val();
    if($('#cusnumber').val()== ''){
        $.alert({
            title: 'Error!',
            content: "please select cusnumber ",
            type: 'red',
            autoClose: 'ok|2000'
        });
        return false;
    }
    $.ajax({
        type:"POST",
        url: '{{ route('cussearch')}}',
        dataType: "JSON",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: { cusnumber: $("#cusnumber").val() , _token: '{{csrf_token()}}'},
        success: function(data)
        {
            console.log(data);
                    
                      $('#cusname').val(data[0].cusname);
                      $('#cusplace').val(data[0].cusplace);
                      $('#cusemail').val(data[0].cusemail);
                      //$('#cusnumber').val(data[0].cusNumber);
                        
                

        },

        error: function(xhr, status , error){

        }
      });
     });

   }

   function customerupdate(){
    customerName = document.getElementById('cusname').value;
    customerPlace = document.getElementById('cusplace').value;
    customerNumber = document.getElementById('cusnumber').value;
    customerEmail = document.getElementById('cusemail').value;


    console.log("Customer Name:", customerName);
    console.log("Customer Place:", customerPlace);
    console.log("Customer Number:", customerNumber);
    console.log("Customer Email:", customerEmail);
    console.log("owner Email:", ownermail);


    }
   
  
    document.getElementById("addButton").addEventListener("click", customerupdate);

    getCustomer();

   // var isNew=true;
    var version_id=null;
    var current_stock=0;
    var product_no = 0;
    getProductcode();
    // getCategory();

    function getProductcode(){

        $("#barcode").empty();
        $("#barcode").keyup(function(e){
            console.log("event is triggered");
            var q = $("#barcode").val();
            if($('#barcode').val()== ''){
                $.alert({
                    title: 'Error!',
                    content: "please select barcode ",
                    type: 'red',
                    autoClose: 'ok|2000'
                });
                return false;
            }
            $.ajax({
                type:"POST",
                url: '{{ route('search')}}',
                dataType: "JSON",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { barcode: $("#barcode").val() , _token: '{{csrf_token()}}'},
                success: function(data)
                {
                    console.log(data);
                                $('#pname').val(data[0].proname);
                                $('#pro_price').val(data[0].price);
                                 $('#total_cost').val(data[0].price);

                },

                error: function(xhr, status , error){

                }
            });
        });

    }

    $(function(){
        $("#pro_price, #qty").on("keydown keyup click",qty);
        function qty(){
            var sum = (
                Number($("#pro_price").val()) * Number($("#qty").val())
            );
            $('#total_cost').val(sum);
            console.log(sum);
        }
    });


    $(function(){
        $("#qty , #discount").on("keydown keyup click",dis);
        function dis(){
            var sum1 = (
                Number($("#total").val()) - Number($("#discount").val())
            );
            $('#distotal').val(sum1);
            console.log(sum1);
        }
    });

    
    $(function(){
        $("#total, #pay").on("keydown keyup ",per);
        function per(){
            var totalamount = (
                Number($("#distotal").val()) - Number($("#pay").val())
            );
            $('#balance').val(totalamount);
        }
    });

    function reset(){
        $('#discount').val('');
        $('#distotal').val(total);
        $('#pay').val(''); // reset quantity to default
        $('#balance').val(''); // reset total cost
    }



     
    function addproduct(){
        var product =
        {
            barcode: $("#barcode").val(),
            pname: $("#pname").val(),
            pro_price: $("#pro_price").val(),
            qty: $("#qty").val(),
            total_cost: $("#total_cost").val(),
            button: '<button type="button" class-"btn btn-warning btn-xs")>delete</button>'


        };
        addRow(product);
        $('#barcode').val('');
        $('#pname').val('');
        $('#pro_price').val('');
        $('#qty').val(1); // reset quantity to default
        $('#total_cost').val(''); // reset total cost
    };
 var total=0;
 //var discount=0;
 var grosstotal=0;
 var qtye =0;
 var barcode = 0;
     
    function addRow(product){
    console.log(product.total_cost);
    var $tableB = $('#product_list tbody');
    var $row = $("<tr><td><Button type='button' name = 'record' class='btn btn-warning btn-xs' name='record' onclick='deleterow(this)' >Delete</td>" +
    "<td>" + product.barcode + "</td><td class=\"price\">" + product.pname + "</td><td>" + product.pro_price + "</td> <td>" + product.qty + "</td> <td>" + product.total_cost + "</td></tr>");
    $row.data("barcode", product.product_code);
    $row.data("pname", product.product_name);
    $row.data("pro_price", product.price);
    $row.data("qty", product.qty);
    $row.data("total_cost", product.total_cost);
    total += Number(product.total_cost);
    $('#total').val(total);
    $('#distotal').val(total);

    console.log(product.total_cost) ;
    qtye += Number(product.qty);

    $row.find('deleterow').click(function(event) {
       deleteRow($(event.currentTarget).parent('tr'));
    });
    $tableB.append($row);
}

function deleterow(e){
   var product_total_cost = parseInt($(e).parent().parent().find('td:last').text(), 10);
   total -= product_total_cost; // Deducting the deleted row's total cost from the total
   $('#total').val(total);
   $('#distotal').val(total);

   $(e).parent().parent().remove(); // Remove the row
}

function deleteRow(row) {
   var product_total_cost = parseInt($(row).find('td:last').text(), 10);
   total -= product_total_cost; // Deducting the row's total cost from the total
   $('#total').val(total);
   $('#distotal').val(total);

   $(row).remove(); // Remove the row
}

function addProject() {
 var table_data =[];
 $('#product_list tbody tr').each(function (row, tr) {
    var sub = {
      'barcode': $(tr).find('td:eq(1)').text(),
      'pname': $(tr).find('td:eq(2)').text(),
      'pro_price': $(tr).find('td:eq(3)').text(),
      'qty': $(tr).find('td:eq(4)').text(),
      'total_cost': $(tr).find('td:eq(5) ').text(),
    };
    table_data.push(sub);
});    



var total = $("#total").val();
var pay = $("#pay").val();
var balance = $("#balance").val();
var discount = $("#distotal").val();
var payment = $("#payment").val();
var date = $("#date").val();

$.ajax({
    
   type:"POST",
   url: '{{route('sales_add' ) }}', 
   datatype: "JSON", 
   headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   },     
   data: {
        
        total: total, 
        pay: pay, 
        balance: balance,
        discount: discount,
        payment: payment,
        date: date,
        customerName: customerName,
        customerNumber: customerNumber,
        customerPlace: customerPlace,
        customerEmail: customerEmail,
        products: table_data,_token: '{{csrf_token()}}'
   },
   success: function (data){
  
      alert("sales added");

       sentemail(data.last_id);
      //resetall();
    
      
   if(data.last_id)
   {
    // 
    var url = "{{ route('print.form', ':last_id') }}".replace(':last_id', data.last_id);
    window.open(url, '_blank');
   }else{
    console.error("last id is not valid")
   }
  //location.reload();
   //resetall();
  // location.reload();

  
},
error: function(xhr , status , error){
    alert(xhr.response);
    console.log(xhr.responseText);
}    


});
}


function resetall(){
        $('#cusname').val('');
        $('#cusnum').val('');
        $('#cusplace').val('');
        $('#discount').val('');
        $('#distotal').val(0);
        $('#pay').val(''); // reset quantity to default
        $('#balance').val(''); // reset total cost
        
    }


    

    function sentemail(last_id){
    console.log('email function');

    // Ensure all variables have valid values
    let emailData = {
         total: $("#total").val() || '',  // Ensure fallback if undefined
         pay: $("#pay").val() || '', 
         balance: $("#balance").val() || '',
         discount: $("#distotal").val() || '',
         date: $("#date").val() || '',
         payment: $("#payment").val() || '',
         customerName: customerName,  // Use the customerName obtained from getElementById
         customerPlace: customerPlace,  // Added customerPlace to the data
         customerNumber: customerNumber, // Use the customerNumber obtained from getElementById
         customerEmail: customerEmail,
         last_id: last_id,
         ownermail: ownermail,
         _token: '{{csrf_token()}}'
    };

    console.log(emailData);

    $.ajax({
        type: "POST",
        url: '{{ route('sentemail') }}',
        datatype: "JSON", 
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: emailData,
        success: function (data) {
        },
        error: function(xhr, status, error) {
            console.error("Error in sending email:", xhr.responseText);
            alert("Failed to send email.");
        }
    });
}
</script>
@endsection