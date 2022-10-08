<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h2>Order Details</h2>

    Customer name :<h3>{{ $order->name }}</h3>
    Customer email :<h3>{{ $order->email }}</h3>
    Customer phone :<h3>{{ $order->phone }}</h3>
    Customer address :<h3>{{ $order->address }}</h3>
    Customer id :<h3>{{ $order->user_id }}</h3>

    Product Name :<h3>{{ $order->product_title }}</h3>
    Product Price :<h3>{{ $order->price }}</h3>
    Product Quantity :<h3>{{ $order->quantity }}</h3>
    Product Status :<h3>{{ $order->payment_status }}</h3>
    Product Id :<h3>{{ $order->product_id }}</h3>
    <br>
    <img src="product/{{ $order->image }}" width="300" height="200">
  </body>
</html>
