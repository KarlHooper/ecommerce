<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
      label{
        display: inline-block;
        width: 150px;
        font-size: 16px;
        font-weight: bold;
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
          <h2 style="text-align: center; font-size: 24px; padding-top: 40px;">Send Email to {{ $order->email }}</h2>
          <form class="" action="{{ url('send_user_email', $order->id) }}" method="post">

            @csrf

          <div style="padding-left: 35%; padding-top: 30px;">
            <label for="greeting">Email Greeting :</label>
            <input type="text" name="greeting" style="color: #000;">
          </div>
          <div style="padding-left: 35%; padding-top: 30px;">
            <label for="firstline">Email Firstline :</label>
            <input type="text" name="firstline" style="color: #000;">
          </div>
          <div style="padding-left: 35%; padding-top: 30px;">
            <label for="body">Email Body :</label>
            <input type="text" name="body" style="color: #000;">
          </div>
          <div style="padding-left: 35%; padding-top: 30px;">
            <label for="button">Email Button Name :</label>
            <input type="text" name="button" style="color: #000;">
          </div>
          <div style="padding-left: 35%; padding-top: 30px;">
            <label for="url">Email Url :</label>
            <input type="text" name="url" style="color: #000;">
          </div>
          <div style="padding-left: 35%; padding-top: 30px;">
            <label for="lastline">Email Lastline :</label>
            <input type="text" name="lastline" style="color: #000;">
          </div>
          <div style="padding-left: 35%; padding-top: 30px;">
            <input type="submit" value="Send Email" class="btn btn-primary">
          </div>
          </form>
        </div>
      </div>
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>
