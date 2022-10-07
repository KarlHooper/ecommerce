<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">

    .div-center
    {
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
    }
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- admin sidebar section -->
      @include('admin.sidebar')
      <!-- admin header section -->
      @include('admin.header')
      <!-- category body section -->
      <div class="main-panel">
        <div class="content-wrapper">

          @if(session()->has('message'))

          <div class="alert alert-success">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session()->get('message') }}

          </div>

            @endif
          <div class="div-center">
            <h2 class="h2-font">Add Category</h2>

            <form action="{{ url('/add_category') }}" method="POST">

              @csrf

              <input type="text" class="input-color" name="category" placeholder="Add category name">
              <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
            </form>
          </div>
        </div>
      </div>
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>
