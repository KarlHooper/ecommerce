<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">

      .title {
        text-align: center;
        font-size: 24px;
        padding-top: 50px;
        font-weight: bold;
      }

      .table-design {
        border: 1px solid #fff;
        margin: auto;
        width: 70%;
        margin-top: 30px;
      }

      .table-header {
        background-color: red;
      }

      .image-size {
        width: 100px;
        height: 100px;
      }

      td, th {
        text-align: center;
      }


    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- admin sidebar section -->
      @include('admin.sidebar')
      <!-- admin header section -->
      @include('admin.header')
      <div class="main-panel">
        <div class="content-wrapper">
          @if(session()->has('message'))

          <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}

          </div>

            @endif
          <h2 class="title">All Orders</h2>
          <table class="table-design">
            <tr class="table-header">
              <th style="padding: 10px;">Name</th>
              <th style="padding: 10px;">Email</th>
              <th style="padding: 10px;">Address</th>
              <th style="padding: 10px;">Phone</th>
              <th style="padding: 10px;">Product Title</th>
              <th style="padding: 10px;">Quantity</th>
              <th style="padding: 10px;">Price</th>
              <th style="padding: 10px;">Payment Status</th>
              <th style="padding: 10px;">Delivery Status</th>
              <th style="padding: 10px;">Image</th>
              <th style="padding: 10px;">Delivered</th>
              <th style="padding: 10px;">Send Email</th>
              <th style="padding: 10px;">Print PDF</th>
            </tr>

            @foreach($order as $order)

            <tr>
              <td>{{ $order->name }}</td>
              <td>{{ $order->email }}</td>
              <td>{{ $order->address }}</td>
              <td>{{ $order->phone }}</td>
              <td>{{ $order->product_title }}</td>
              <td>{{ $order->quantity }}</td>
              <td>{{ $order->price }}</td>
              <td>{{ $order->payment_status }}</td>
              <td>{{ $order->delivery_status }}</td>
              <td>
                <img class="image-size" src="/product/{{ $order->image }}">
              </td>
              <td>
                @if($order->delivery_status == 'processing')

                  <a onclick="return confirm('Are you sure this product is delivered?')" href="{{ url('delivered', $order->id) }}" class="btn btn-primary">Delivered</a>
               @else

               <p style="color: green; text-align: center;">Delivered</p>

                @endif
              </td>
              <td>
                <a href="{{ url('send_email', $order->id) }}" class="btn btn-info">Send Email</a>
              </td>
              <td>
                <a href="{{ url('print_pdf', $order->id) }}" class="btn btn-secondary">Print PDF</a>
              </td>

            </tr>

            @endforeach
          </table>

        </div>
      </div>
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>
