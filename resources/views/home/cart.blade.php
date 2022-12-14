<!DOCTYPE html>
<html>
   <head>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

        table, th, td {
          border: 1px solid grey;
        }

        .th-design {
          font-size: 24px;
          padding: 5px;
          background-color: #e94d09;
          color: #fff;
        }

        .img-design {
          width: 200px;
          height: 150px;
        }

        .total-design {
            font-size: 20px;
            padding: 20px;
        }

      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         @if(session()->has('message'))

         <div class="alert alert-success">

           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
           {{ session()->get('message') }}

         </div>

           @endif
       <div class="center">
         <table>
           <tr>
             <th class="th-design">Product Title</th>
             <th class="th-design">Product Quantity</th>
             <th class="th-design">Price</th>
             <th class="th-design">Image</th>
             <th class="th-design">Action</th>
           </tr>

           <?php $totalprice = 0; ?>

           @foreach($cart as $cart)

           <tr>
             <td>{{ $cart->product_title }}</td>
             <td>{{ $cart->quantity }}</td>
             <td>${{ $cart->price }}</td>
             <td><img  class="img-design" src="/product/{{ $cart->image }}" ></td>
             <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{ url('remove_cart', $cart->id) }}">Remove Product</a></td>
           </tr>

           <?php $totalprice = $totalprice + $cart->price; ?>

           @endforeach


         </table>
         <div class="">
           <h2 class="total-design">Total Price : ${{ $totalprice }}</h2>
         </div>

         <div class="">
           <h2>Proceed to Order</h2>
           <a href="{{ url('cash_order') }}" class="btn btn-danger">Cash On Delivery</a>
           <a href="{{ url('stripe', $totalprice) }}" class="btn btn-danger">Pay Using Card</a>
         </div>

       </div>

      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">?? 2022 JEK Marketing | All Rights Reserved

         </p>
      </div>
      <script type="text/javascript">
        function confirmation(ev) {
          ev.preventDefault();
          var urlToRedirect = ev.currentTarget.getAttribute('href');
          console.log(urlToRedirect);
          swal({
            title: "Are you sure you want to remove this product?",
            text: "You will not be able to revert this",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willCancel) => {
            if(willCancel) {
              window.location.href = urlToRedirect;
            }

        });
      }
      </script>
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
