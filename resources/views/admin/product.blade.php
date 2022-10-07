<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
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
            <h2 class="h2-font">Add Product</h2>
            <form class="" action="{{ url('/new_product') }}" method="post" enctype="multipart/form-data">

              @csrf
            <div class="inputs">
            <label for="title">Product Title :</label>
            <input class="input-color" type="text" name="title" placeholder="Add a title" required>
          </div>
          <div class="inputs">
            <label for="title">Product Description :</label>
            <input class="input-color" type="text" name="description" placeholder="Add a description" required>
          </div>
          <div class="inputs">
            <label for="title">Product Price :</label>
            <input class="input-color" type="number" name="price" placeholder="Add a price" required>
          </div>
          <div class="inputs">
            <label for="title">Discount Price :</label>
            <input class="input-color" type="number" name="discount_price" placeholder="Add a discount price">
          </div>
          <div class="inputs">
            <label for="title">Product Quantity :</label>
            <input class="input-color" type="number" min="0" name="quantity" placeholder="Add a quantity" required>
          </div>
          <div class="inputs">
            <label for="title">Product Category :</label>
            <select class="input-color" name="category" required>
              <option value="" selected>Add a category</option>

              @foreach($category as $category)

              <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>

              @endforeach
            </select>
          </div>
          <div class="inputs">
            <label for="title">Product Image :</label>
            <input type="file" name="image" required>
          </div>
          <div class="inputs">
            <input type="submit" value="Add Product" class="btn btn-primary">
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
