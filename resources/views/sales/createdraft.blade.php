@extends('layout')
@section('content')
    <div class="container">
        <h3 align="center" class="mt-5">pos</h3>
        <div class="row">
        
            <div class="col-sm-8">
                <form action="" class="form-horizontal" id="frmInvoice">

                    <table class="table table-bordered">
                        <caption> Customer details</caption>
                        <tr>
                            <th>Customer Number</th>
                            <th>Customer name</th>
                            <th>Place</th>
                           
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" placeholder="phone number" id="cusnumber" name="cusnumber" size="25px" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" placeholder="name" id="cusname" name="cusname" size="50px" >
                            </td>
                            <td>
                                <input type="text" class="form-control" placeholder="place" id="cusplace" name="cusplace" size="50px" >
                            </td>
                            
                        </tr>


                    </table>



                    <table class="table table-bordered">
                        <caption> Add products</caption>
                        <tr>
                            <th>Product code</th>
                            <th>product name</th>
                            <th>price</th>
                            <th>qty</th>
                            <th>amount</th>
                            <th>option</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" class="form-control" placeholder="code" id="barcode" name="barcode" size="25px" required>
                            </td>
                            <td>
                                <input type="text" class="form-control" placeholder="Productname" id="pname" name="pname" size="50px" disabled>
                            </td>
                            <td>
                                <input type="text" class="form-control pro_price" placeholder="price" id="pro_price" name="pro_price" size="25px">
                            </td>
                            <td>
                                <input type="number" class="form-control pro_price" placeholder="qty" id="qty" name="qty" min="1" value="1" size="10px" required >
                            </td>
                            <td>
                                <input type="text" class="form-control " placeholder="total_cost" id="total_cost" name="total_cost" size="35px">
                            </td>
                            <td>
                                <button class="btn btn-success" type="button" onclick="addproduct(); customerupdate();">Add</button>
                            </td>
                        </tr>


                    </table>
                </form>

                <table class="table table-bordered" id="product_list">
                    <caption> products </caption>
                    <thead>
                        <tr>
                            <th style="width: 40px">Remove</th>
                            <th>product code</th>
                            <th>product Name</th>
                            <th>unit price</th>
                            <th>qty</th>
                            <th>amount</th>
                        </tr>
                    </thead>
                    <tbody></tbody>

                </table>

            </div>

        
       

    <div class="col-sm-4">
        <div class="col s12 m6 offset-m4">
            <div class="form-group" align="left">
                <label for="" class="form-label">Total</label>
                <input type="text" class="form-control" placeholder="total" id="total" name="total" size="30px" required>
            </div>
            <div class="form-group" align="left">
                <label for="" class="form-label">pay</label>
                <input type="text" class="form-control" placeholder="pay" id="pay" name="pay" size="30px" required>
            </div>
            <div class="form-group" align="left">
                <label for="" class="form-label">balance</label>
                <input type="text" class="form-control" placeholder="balance" id="balance" name="balance" size="30px" required>
            </div>
            {{-- <div class="form-group" align="left">
                <label for="" class="col-sm-2 control-label">status</label>
                <select class="form-control" name="payment" id="payment" placeholder="status" required>
                 <option value="">please select</option>
                 <option value="1">cash</option>
                 <option value="2">card</option>
                </select>
            </div> --}}

            <div class="card" align="right">
               <button type="button" id="save" class="btn btn-info" onclick="addProject()">Update invoice</button>
                {{-- <button type="button" id="clear" class="btn btn-warning" onclick="reset()">reset</button>
                <button type="button" id="clear" class="btn btn-warning" onclick="addnew()">save</button> --}}
            </div>
        </div>
        </form>
    </div>
</div>

</div> 

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>    

<script>

    getCustomer();
    let customerName = '';
    let customerPlace = '';
    let customerNumber = '';


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
                      //$('#cusnumber').val(data[0].cusNumber);
                        
                

        },

        error: function(xhr, status , error){

        }
      });
     });

   }

   function customerupdate(){
    console.log(customerName)
    console.log(customerNumber)
    console.log(customerPlace)
   }



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


    // $(function(){
    //     $("#qty , #discount").on("keydown keyup click",discount);
    //     function discount(){
    //         var sum1 = (
    //             Number($("#qty").val()) * Number($("#discount").val())
    //         );
    //         console.log(sum1);
    //     }
    // });

    
    $(function(){
        $("#total, #pay").on("keydown keyup ",per);
        function per(){
            var totalamount = (
                Number($("#pay").val()) - Number($("#total").val())
            );
            $('#balance').val(totalamount);
        }
    });


     
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
   $(e).parent().parent().remove(); // Remove the row
}

function deleteRow(row) {
   var product_total_cost = parseInt($(row).find('td:last').text(), 10);
   total -= product_total_cost; // Deducting the row's total cost from the total
   $('#total').val(total);
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

console.log(table_data);

var total = $("#total").val();
var pay = $("#pay").val();
var balance = $("#balance").val();
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
        products: table_data,_token: '{{csrf_token()}}'
   },
   success: function (data){
     console.log(data);
      alert("sales added");
     // console.log(data);
// Handle success, update UI or redirect if necessary
// For example, you can redirect to the print page if isnew is true
   if(data.last_id)
   {
    var url = "{{ route('print.form', ':last_id') }}".replace(':last_id', data.last_id);
     window.location.href = url; 
   }else{
    console.error("last id is not valid")
   }
},
error: function(xhr , status , error){
    alert(xhr.response);
    console.log(xhr.responseText);
}    
});
}

</script>
@endsection