<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Product;

use App\Models\Order;

use PDF;

use Notification;

use App\Notifications\MyFirstNotification;

class AdminController extends Controller
{
    public function view_category()
    {
      $data = category::all();
      return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
      $data = new category;

      $data->category_name = $request->category;

      $data->save();

      return redirect()->back()->with('message', 'Category added successfully!');
    }

    public function delete_category($id)
    {
      $data = category::find($id);

      $data->delete();

      return redirect()->back()->with('delete', 'Category deleted successfully!');
    }

    public function add_product()
    {
      $category = category::all();
      return view('admin.product', compact('category'));
    }

    public function new_product(Request $request)
    {
      $product = new product;

      $product->title = $request->title;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->quantity = $request->quantity;
      $product->discount_price = $request->discount_price;
      $product->category = $request->category;

      $image = $request->image;
      $imagename = time().'.'.$image->getClientOriginalExtension();
      $request->image->move('product', $imagename);
      $product->image = $imagename;
      $product->save();

      return redirect()->back()->with('message', 'Product added successfully!');
    }

    public function view_products()
    {
      $product = product::all();
      return view('admin.view_products', compact('product'));
    }

    public function delete_product($id)
    {
      $product = product::find($id);

      $product->delete();

      return redirect()->back()->with('delete', 'Product deleted successfully!');
    }

    public function update_product($id)
    {

      $product = product::find($id);

      $category = category::all();

      return view('admin.update_product', compact('product', 'category'));

    }

    public function update_product_confirm(Request $request, $id)
    {

      $product = product::find($id);

      $product->title = $request->title;
      $product->description = $request->description;
      $product->price = $request->price;
      $product->quantity = $request->quantity;
      $product->discount_price = $request->discount_price;
      $product->category = $request->category;

      $image = $request->image;
      if($image)
      {

      $imagename = time().'.'.$image->getClientOriginalExtension();
      $request->image->move('product', $imagename);
      $product->image = $imagename;

      }
      $product->save();

      return redirect()->back()->with('message', 'Product updated successfully!');

    }

    public function orders()
    {

      $order = order::all();

      return view('admin.orders', compact('order'));

    }

    public function delivered($id)
    {

      $order = order::find($id);

      $order->delivery_status = "delivered";

      $order->payment_status = "paid";

      $order->save();

      return redirect()->back()->with('message', 'Product delivered successfully!');

    }

    public function print_pdf($id)
    {

      $order = order::find($id);

      $pdf = PDF::loadView('admin.pdf', compact('order'));

      return $pdf->download('order_details.pdf');

    }

    public function send_email($id)
    {

      $order = order::find($id);

      return view('admin.email_info', compact('order'));

    }

    public function send_user_email(Request $request, $id)
    {

      $order = order::find($id);

      $details = [
        'greeting'=>$request->greeting,
        'firstline'=>$request->firstline,
        'body'=>$request->body,
        'button'=>$request->button,
        'url'=>$request->url,
        'lastline'=>$request->lastline,
      ];

      Notification::send($order, new MyFirstNotification($details));

      return redirect()->back()->with('message', 'Email has been sent successfully!');

    }

}
