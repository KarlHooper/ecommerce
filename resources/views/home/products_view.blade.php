<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            All <span>products</span>
         </h2>
      </div>
      <div class="" style="margin: auto;">
        <form action="{{ url('search_product') }}" method="get">
          @csrf

          <input style="width: 500px;" type="text" name="search" placeholder="Search for a product...">
          <input type="submit" value="Search">

        </form>
      </div>
      @if(session()->has('message'))

      <div class="alert alert-success">

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{ session()->get('message') }}

      </div>

        @endif
      <div class="row">

        @foreach($product as $products)

         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{ url('product_details', $products->id) }}" class="option1">
                     Product Details
                     </a>
                     <form class="" action="{{ url('add_cart', $products->id) }}" method="post">

                       @csrf

                       <div class="row py-3">
                         <div class="col-md-4">
                           <input type="number" name="quantity" value="1" min="1" style="width: 100px;">
                         </div>
                       <div class="col-md-4">
                         <input type="submit" name="" value="Add to cart">
                       </div>
                       </div>
                     </form>
                  </div>
               </div>
               <div class="img-box">
                  <img src="/product/{{ $products->image }}">
               </div>
               <div class="detail-box">
                  <h5>
                    {{ $products->title }}
                  </h5>

                  @if($products->discount_price != null)

                  <h6 style="color: red;">
                     ${{ $products->discount_price }}
                  </h6>

                  <h6 style="text-decoration: line-through;">
                     ${{ $products->price }}
                  </h6>
                  @else

                  <h6>
                     ${{ $products->price }}
                  </h6>
                  @endif
               </div>
            </div>
         </div>
@endforeach
<span style="padding-top: 20px;">
{!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
</span>
      </div>

   </div>
</section>