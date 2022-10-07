<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">

      .center
      {
        margin: auto;
        margin-top: 40px;
        width: 80%;
        border: 2px solid #E94D09;
        text-align: center;
      }

      .h2-font
      {
        text-align: center;
        font-size: 40px;
        padding-top: 50px;
      }

      .img-size
      {
        width: 200px;
        height: 150px;
      }

      .th-color
      {
        background-color: #E94D09;
      }

      .th-design
      {
        padding: 30px;
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
          @if(session()->has('delete'))

          <div class="alert alert-danger">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('delete') }}

          </div>

            @endif
          <h2 class="h2-font">All Products</h2>
          <table class="center">
            <tr class="th-color">
            <th class="th-design">Product Title</th>
            <th class="th-design">Description</th>
            <th class="th-design">Quantity</th>
            <th class="th-design">Category</th>
            <th class="th-design">Price</th>
            <th class="th-design">Discount Price</th>
            <th class="th-design">Product Image</th>
            <th class="th-design">Edit</th>
            <th class="th-design">Delete</th>
            </tr>

            @foreach($product as $product)

            <tr>
              <td>{{ $product->title }}</td>
              <td>{{ $product->description }}</td>
              <td>{{ $product->quantity }}</td>
              <td>{{ $product->category }}</td>
              <td>{{ $product->price }}</td>
              <td>{{ $product->discount_price }}</td>
              <td>
                <img class="img-size" src="/product/{{ $product->image }}" alt="">
              </td>
              <td><a class="btn btn-success" href="{{ url('update_product', $product->id) }}">Edit</a></td>
              <td><a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')" href="{{ url('delete_product', $product->id) }}">Delete</a></td>
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
