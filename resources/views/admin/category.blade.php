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

    .center {
      margin: auto;
      width: 50%;
      text-align: center;
      margin-top: 40px;
      border: 3px solid #E94D09;
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

            @if(session()->has('delete'))

            <div class="alert alert-danger">

              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
              {{ session()->get('delete') }}

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

          <table class="center">
            <tr>
              <td>Category Name</td>
              <td>Action</td>
            </tr>

            @foreach($data as $data)

            <tr>
              <td>{{ $data->category_name }}</td>
              <td><a onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger" href="{{ url('delete_category', $data->id) }}">Delete</a></td>
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
