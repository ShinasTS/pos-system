<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
    
    
    body, .a5-container {
        width: 160mm;
        height: 210mm;
        margin: 0 auto; /* Center the content */
        padding: 10mm; /* Optional: Add padding to fit content */
        box-sizing: border-box;
        font-size: 10px; /* Adjust font size to fit content within A5 */
    }

    .thara{
        display: flex;
    }
    
    /* Optional styling for printing */
   
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
        }
        .header p{
            margin: 0;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .header-left, .header-right {
            font-size: 10px;
            margin: 0%;
            padding: 0%;
        }
        .header img {
            width: 80px;
        }
        .header-center {
            /* position: absolute;
            top: 50px;    
            left: 570px; 
            text-align: center;
            justify-content: center;
            flex-grow: 1; */
            text-align: center;
            margin-left: 25px;
        }
        .header-center h1 {
            margin: 0;
            font-size: 24px;
        }
        .header-center p {
            margin: 2px 0;
            font-size: 12px;
        }
        .invoice-title {
            font-weight: bold;
            text-align: center;
            font-size: 20px;
            margin-top: 40px;
            text-decoration: underline;
        }
        .info-section {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .info-section div {
            width: 48%;
        }
.tablepos{
    display: flex;

}
.tablepos h3{
    display: flex;
    
    border: black;
}

.box{
  border: 2px solid black;      /* Border width, style, and color */
  padding-left: 5px;
  padding-right: 40px;     
  margin-top: 10px ;
  background-color: #f2f2f2;/* Padding inside the border */
    
}
.nettotal{
    margin-top: 10px;
    margin-left: 160px;
}

.nettotal h3{
    margin: 5px;
    display: flex;
    
}

        .details-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
       .total-table {
            width: 50%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .details-table th, .details-table td, .total-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size: 14px;
        }
        .details-table th {
            background-color: #f2f2f2;
        }
        .text-right {
            text-align: right;
        }
        .total-row {
            font-weight: bold;
        }
        .brands {
            display: flex;
            justify-content: center;
            margin-top: 40px;
        }
        .brands img {
            width: 50px;
            height: 30px;
            margin: 5px;
            filter: grayscale(100%);
        }
        .signatory {
            text-align: right;
            margin-top: 60px;
            font-weight: bold;
            font-size: 14px;
        }
        @media print {
        .a5-container {
            width: 148mm;
            height: 210mm;
        }
        
    }
       
    
    </style>
</head>
<body>

    <div class="header">
        <div class="header-left">
            <p>GSTIN: 32CWZPB0862K1ZV</p>
        </div>
       
        <div class="header-right">
            <p>Mobile: 9602772382</p>
            <p>Email: tharayiloptical@gmail.com</p>
        </div>
    </div>
    <div class="thara">
        <img src="{{ asset('IMG_20220618_131114_983_Original.jpg') }}" alt="logo" style="width: 90px; height:50px;"> 

    <div class="header-center">
        <h1>THARAYIL OPTICALS</h1>
        <p >(COMPUTERISED EYE TESTING)</p>
        <p >Municipal Shopping Complex, Guruvayur Road, Kunnamkulam</p>
        <p style="font-size: 10px;" >(Where no GST charged on customer / composite taxable dealer)</p>
    </div>
</div>

    <div class="invoice-title">INVOICE</div>

    <div class="info-section">
        <div>
            <p><strong>Customer Name :</strong> {{$cusname}}</p>
            <p><strong>Mobile Number :</strong> {{$cusnum}}</p>
        </div>
        <div style="text-align: right;">
            <p><strong>Invoice Number :</strong> {{$sales_id}}</p>
            <p><strong>Invoice Date :</strong> {{$od}}</p>
            <p><strong>Date of Delivery :</strong> {{$dd}}</p>
        </div>
    </div>

    <table class="details-table">
        <thead>
            <tr>
                <th>SL NO</th>
                <th>PRODUCT DETAILS</th>
                <th>QTY</th>
                <th>PRICE</th>
                <th>TOTAL</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salesDetails as $index => $detail)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $detail->product->proname }}</td>
                {{-- <td>{{ $detail->product ? $detail->product->proname : 'N/A' }}</td> --}}

                <td>{{ $detail->qty }}</td>
                <td>{{ $detail->price }}</td>
                <td class="text-right">{{ $detail->total_cost }}</td>
            </tr>
        @endforeach

            
        </tbody>
    </table>

    <div class="tablepos">
   
   
        
            
          <div class="box"> 
        
            <h2><strong><pre>Net Total   :</strong> {{ $nettotal }}</pre></h2>
            <h2><strong><pre>Advance Paid:</strong> {{ $pay }}</pre></h2>
       
            <h2><strong><pre>Balance Due :</strong> {{ $balance }}</pre></h2>

        
          

        </div> 
  <div class="nettotal">
    <h3 class="text-right"><strong>Gross Total Amount</strong> </h3>
    <h3 ><strong> {{ $total }}</strong></h3>
</div>
</div>
    <div class="signatory">
        AUTHORIZED SIGNATORY
    </div>

    <div class="brands">
        <!-- Replace each image src with the correct brand logo paths -->
        <img src="https://media.designrush.com/inspiration_images/136105/conversions/_1513769874_870_Ray_Ban2_e2d9df9d8fe6-mobile.jpg" alt="Ray-Ban">
        <img src="https://banner2.cleanpng.com/20180625/jzi/aaz9zrjgn.webp" alt="Vogue">
        <img src="data:image/png;base64,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" alt="Vogue">
        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAQsAAAC8CAMAAABYM3sZAAAAvVBMVEUbHUv////UHzYeIE0jJVEVF0jn5+zj4+k/QWUWHErBMUlBHkk6LVXEIDlISWvWHjTtq7LVJDoAAEAXGUkSFEYAAD0JDEOGh5wND0T29viwsb8NEEhhYn+jpLSrrLy4ucbJydLY2N8vMFkAAEVOUG8AADpzc4uPkaNaW3rx8fQfIFNrbIXT09x8fZSam6w0NVzBwc0AAC1ERWssLlyCg5saG1E9OV7Wn6rFJDxPUHQxNF87PWUAADIAAEddXnvWHc06AAAM60lEQVR4nO2da5eiOhaGceRizaXOnAQiqCha3ihRmdLqM3ad6f//s4Yk4CaQILZ1cXryfuheFXJ92NnZCa4Vw9QqZHQNLa6uZnGWZgF6RxbY9QkhrvVe9X26aiwwonqqKUskWF2P76HXl9Fyu1kfnhZNGZkIrU8GzaNNqWkO6WNX1rzqQZcVIZVUzAZY7WWVBX61Y5WSg2qMvrEJp51c9mA5qzZeGVKU1Rbt62N2+7T1tWxQVCgM4tg51R/7GyeOg2O9VeuFDaePxFQzoaljMVXCIuio5ChYWIt1KpQKkiXyFeOhGjJuYa3rZB7TByNVWTShj9NutRuu6dAHK1QvQkL6JH4TqkQs0X6sQH0HFv7boJ43WTfA4Cw6lbdlWHs2pAYWvKHq+8TdtKNigYeMX7Ivdd3rs+zr6ruosXhWoujYMxkLckhkmeONpxhRNibOwn4UBv0wHHdasQgqVSM+NikLw31jtrZbQMqBpYxr/av5TmsXFhrTMvH5z7AvW3L8uZOTSlejl95pOZjmNFZKyyB5lums7DLQqtOORSeel3OQUV6uamdc3oZZ+qYogg8R/bs+0yRrKmELCfIQMmmX0wXyPJ4k66L1yq0iCB9dz3ddl5BZ38lfn7RvJRadsPRucmfRhkUnKq0B7qyoTc7CcJl3mL7l3sHbsc691BtpiC8wayRVDYjnMflUjQ6LsyPKFqwwf32KBeHMonM898jdnxMvs+iEZ4PCOC0SFSwwYq8rQg/0L59ZUbCVzOAbWaAt68XkIIwaW9zc04ss7F4xbjQu0tqwAJtDx3M5BQvDXzOL29LHOfKBLN9tLCzuhtJq3PSw4O5sKY8zGIuE2Wpicmv3Gb3p7jKL+Ejnf9zjnH3mDeJj3MDCQEtmpiNiPBBmRdNanEV1GwvCRlBbqLOyBlvKoqG8GGPxyt7QjhkreWRQN/0WLJ6ZdaQGHY5r8krWjSxyAskT5nYcbKTv6CYW+BvzkjIf6Zo2bVQ+LMZiih7twnQt7v9WizYsTMzmf4jOzmJCRkETi6x+VmSMRgz5UZ7xJhZkwwyuvjpl8pj/3ElfAGcx9NnI7SwmJMxZRHmkcIHFgY88GHl5/vgNXWCRuQxmD8vci8rj55tYeGwIK2lQ5bIlMpFyyllg7i+TmVdAIa1YYO/Ip6b3g41whPxLLAyvCF6yhnsKl34TC7ZYxT+kVWOTPZRswM4sspiQzbHdC/fzmX20Y5FPjZTHNqFrXGaBzahgsVFVfwsL/ErH4Jhyi+N2L91zFiyK+Ir9Q+OuliyK+CouLP4yi9yB0XYWqiw3sTjQHkSKnvM1RrqqnllA3M3j8bYsck/FeNB4vAULg2wDPiOVhyu3sLB6tPKJIgNhy1df5kyABXYnfEh8n9aaBUBk+7Q2LPId/4v6aOUmFi+NLFiAI907AgvD7XHT5eNoz6KY/wNWrh0LFsgd1KdmN7H43sji2IaFgX7QYYz522rPInMZFGLEnVU7FmyVV57N3egvTOYv5LFl7i+2zf7C4NtIJ19urmDB5mCQ7/6uYfExdmEguiSqTv78gXJcAguM0nieE7uGBbX5Yrf59XZheFFHuTPn8UUgjWsEFpnLGBX9u4oFNjdm/uAO7IIfi8jjbHdNu9cYdxZ/WmdeV7Ew8DnfHdgFX+UTX7ofYZzGDXsziZ+5jgXoDuyC5+jIzoj4kasiPv9SFh9kF4bPXv50XxvxA4/AE/lL+BXtInNffEvQrTaQh4U/Gs61fjW7yGO5LFQSum95Sxb7p4p2f0m7KM7yOsmjd+4hJjN+juuoDgp+TbvIfCTfT9ir54VHfJ94i6ct86jKk9/8G+K7stjcgV3QU9v8u1kQrZajH8v+ID8nCBSnikYTi9XHs7jBLqILLOAjIu1nDF+m++qPy1/K4ga7uMjCIOa4/m0+OjWUu42F5DDmXuyCxtDLyqd2ZzW7+PuLn2URKFlIzwdKpW+yi9R27EHzT2y4iLceT/P5ETuTDfLU9DMNacUTCQt/62RS/i7H29mOM5Wcr7rrqePY0vOBUidXWWnVrpqq8bdr+95bb984KugNmc2X/dWqv1zvh/5Dc2asrNjsZWp4O1m5nuxJt5c9MWVP2pQuKmligS3LaoeCZnYJ/W0Cke7UahVjRcVZiw0/BFR3qLkctNqUSf++E6RZgLrcvL5a+OEO1DV696Bvf78HGc4dyP7jr/cgoxYyfoX++dsd6Pd7YfGXr5dmAdIsQJoFSLMAaRYgzQKkWYA0C5BmAdIsQJoFSLMAaRYgzQKkWYA0C5BmAdIsQJoFSLMAaRYgzQKkWYA0C5BmAdIsQJoFSLMAaRYgzQKkWYA0C5BmAdIsQJoFSLMAaRYgzQKkWYA0C5BmAdIsQJoFSLMAaRYgzQKkWYA0C5BmAdIsQJoFSLMAaRYgzQKkWYA0C5BmAdIsQJoFSLMAaRYgzQKkWYA0C5BmAdIsQJoFSLMAaRYgzQKkWYA0C5BmAdIsQJoFSLMAaRYgzQKkWYA0C5BmAdIsQJoFSLMAaRYgzQKkWYA0C5BmAdIszvrtd8O+B/3xjzvQv43He9C3v92D2B1AX66vvoaFSd/RA9IsQJoFSMICu65bvUSMptWuBmufWH5YUiUfTVKVtIg39IeE1HoGRctSNNt8BVqdBd6fTqfKpXR4lqX1Kt1QJc5Pb4rr3vDb+jQHrcXC+JQVld5dh5H3fRlO0nTcXw89Uq+9exIqPp3EivfrE9Pj96dFwz2NdRbs1uixeM0ioVcJp5Xrtsk2S0wqtxqy22BTxev1BmKElZbfE57R+xRlF9/7+/70XCZOl7MqDfexGrt9L+fwwnO6PRlh5b18Eha0ZCiOm91fOZGxiK5iMRZ7PCnnwzO70wnqLLA3mgqlgun2WRxPjUUg3ACJwtKjeIxUM+UaFpUrOcnyM1hYZsWYqAZi965hkfVOcukoU50FKxlW5ojULm5nIc4RGQs8LFDYSZQUN/hOrmcROI4T86e7ykAKqezi41iET89nCaOWscCY3/PtrL6jxWKBntfhVMEiPkC94hxiLMYLD6HvIcPxJu/f57NYebiQOGwZC7TldtAj3ISwT/bbRM5iaGF5zYwFvRP3wUUbWt1Kfuns57PYKW4ClrFw5+w99lEpFXtouxMHw1m8qhaIM4tMCzrlEnl8ed8sfOYsQlQZpV+JQjiL5zYs2OLn9KRLyV2z8NfM71+82/cKFv4oszRbFsXcFYtDjQVfAOQdL+v/gAWzlM5YsQKW9D87R1S3qNdZ+CMalStvawdd4ztpFxLJtebGl7BYkFxDIVudBdsFKfotqBUL1lE0Z8HWdWvqvxZl/dl/PxbOYFLoKMSddbugq8jkorcoWKCFl2sh9pTHWn/SWG3DIteXq2ItGzrM5Lwfi5LSZhZGpH6HgngMPk0KTcV5yFg4g8Ekslmz44W8GgULmT5gPyLszaossJnQOKvEAvuFLuxTxa5W9mbRvvXe7BNZNNtFjQXubQqJW80ai4GaRTx4Us26z2dhT1Km7L/+dSz8Y1BoLYbqNbsQZoHAYoKUDkjlL0R3MZm+H4sVuGWhwrq/6Fb8BaubS8IiCHeFwo2wDjMWcZpO6RJdPbK7zCJcDMtCXxJfWGmnWAuhbiWL+D+IriEo25p7lc1uyOzBN7fMd25VMNrFF96XxJ2sJwm4Bn9rx7Ydq1g0xxdjYmB0oOthsFEsTfccg5MjHSKkPMzY6bnzUyxY3Ek2dJok1X1vrntm4fZisSv0O4ffnSpYtNmPIDbN7v8spx5rDanztA9iqG7ewgK7tPTd7M3U5xdxlQVhJ3IT4cjuNhaG/4PamnzvewuLn/s+csVZDp7RcXeO5WjhRhZ8kxM8ywzjrllkpsdCgn7pQ6iaxcV1hMkyqWEMZAcBH8JiQkqfeUs9vJrFg88+CQTjV49vQSx/4arWkaG80QqLPPKaS2B8CIuo+OkRXQNLO6GrWWRvMWGxVTwevT27brc32k1V8cWp1Oqs9q3oHLNZe1pDJOnFh7AISr9Ki0ufI69nkQ0z/1YWOFEaJU6gjDs75d/CHcuvXfAXRfi6rq+rH/JtWdAAxv4TLAwyi6o11j+j1L6zl3f6VRYYUcOY1nfuChbjr2BRW1P5QGe1jXOyrWS5wGLXEfY1Hg+4auuqlEUgmSNBiWyeuMwSo4oPylgEgsos0DgrodybZXYRxJLTeuztw2JuZG5hOj55lWFQFkKbIgtvlzU7BhbYjLKE4K26rtZZWI/L5fJRzId7Wdq8Uha/ZYnraiLNWda2VMyd16sudWWzXG6kvwdwydtmNUijaBL2R3tS/4mGWW1U+MUPG9G8lOI+Hqt5WAfqv9eyCCHV/uIsrd4FVaKgcg5Z1SCfEF8RI2AfeezEA8lzVBsVM1nVjlr1PIb+HV9ZmgVIswBpFqCMhVYu87+UqqpLgfs+fgAAAABJRU5ErkJggg==" alt="Tommy">
        <img src="data:image/jpeg;base64,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" alt="Crizal">
        <img src="data:image/png;base64,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" alt="Bausch & Lomb">
        <img src="data:image/png;base64,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" alt="Nova">
        <img src="data:image/png;base64,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" alt="Oakley">
        <img src="data:image/png;base64,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" alt="Zeiss">
    </div>

    

</body>

</html>
