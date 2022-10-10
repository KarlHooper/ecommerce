<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>JEK Marketing</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
      <style type="text/css">

        .center {
          margin: auto;
          width: 70%;
          text-align: center;
          padding: 30px;
        }

        .th-bg {
          padding: 10px;
          background-color: skyblue;
          font-size: 20px;
          font-weight: bold;
        }

        table, th, td {
          border: 1px solid #000;
        }

      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <div class="center">
           <table>
             <tr>
               <th class="th-bg">Product Title</th>
               <th class="th-bg">Quantity</th>
               <th class="th-bg">Price</th>
               <th class="th-bg">Payment Status</th>
               <th class="th-bg">Delivery Status</th>
               <th class="th-bg">Image</th>
               <th class="th-bg">Cancel Order</th>
             </tr>
             @foreach($order as $order)
             <tr>
               <td>{{ $order->product_title }}</td>
               <td>{{ $order->quantity }}</td>
               <td>{{ $order->price }}</td>
               <td>{{ $order->payment_status }}</td>
               <td>{{ $order->delivery_status }}</td>
               <td>
                 <img width=180 height=100 src="product/{{ $order->image }}">
               </td>
               <td>
                 @if($order->delivery_status == 'processing')
                 <a onclick="return confirm('Are you sure you want to cancel this order?')" href="{{ url('cancel_order', $order->id) }}" class="btn btn-danger">Cancel Order</a>

                 @else

                 <p style="color: red;">Not Allowed</p>

                 @endif
               </td>
             </tr>

            @endforeach
           </table>
         </div>
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2022 JEK Marketing | All Rights Reserved

         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
