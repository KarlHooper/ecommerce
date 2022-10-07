<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')
    <style type="text/css">

      .div-center{
        text-align: center;
        padding-top: 50px;
      }

      .h2-font
      {
        font-size: 40px;
        padding-bottom: 40px;
      }

      .input-color
      {
        color: black;
        padding-bottom: 20px;
      }

      label
      {
        display: inline-block;
        width: 200px;
      }

      .inputs
      {
        padding-bottom: 20px;
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
          <div class="div-center">
            <h2 class="h2-font">Update Product</h2>
            <form class="" action="{{ url('/update_product_confirm', $product->id) }}" method="post" enctype="multipart/form-data">

              @csrf
            <div class="inputs">
            <label for="title">Product Title :</label>
            <input class="input-color" type="text" name="title" placeholder="Add a title" required value="{{ $product->title }}">
          </div>
          <div class="inputs">
            <label for="description">Product Description :</label>
            <input class="input-color" type="text" name="description" placeholder="Add a description" required value="{{ $product->description }}">
          </div>
          <div class="inputs">
            <label for="price">Product Price :</label>
            <input class="input-color" type="number" name="price" placeholder="Add a price" required value="{{ $product->price }}">
          </div>
          <div class="inputs">
            <label for="discount_price">Discount Price :</label>
            <input class="input-color" type="number" name="discount_price" placeholder="Add a discount price" value="{{ $product->discount_price }}">
          </div>
          <div class="inputs">
            <label for="quantity">Product Quantity :</label>
            <input class="input-color" type="number" min="0" name="quantity" placeholder="Add a quantity" required value="{{ $product->quantity }}">
          </div>
          <div class="inputs">
            <label for="category">Product Category :</label>
            <select class="input-color" name="category" required>


              @foreach($category as $category)

              <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>

              @endforeach

            </select>
          </div>
          <div class="inputs">
            <label>Update Product Image :</label>
            <img src="/product/{{ $product->image }}" height="100" width="200" style="margin:auto;">
          </div>

          <div class="inputs">
            <label for="title">Update Product Image :</label>
            <input type="file" name="image">
          </div>
          <div class="inputs">
            <input type="submit" value="Update Product" class="btn btn-primary">
          </div>
          </form>
        </div>
      </div>
      </div>
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>
