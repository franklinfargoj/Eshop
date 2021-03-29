<head>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}"/>
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">

                    <div class="column" style="margin-left:450px;margin-top:12px"> 
                        <h3>Hello,{{ $user->name}}</h3>
                    </div>
                    <a href="{{ route('logout') }}" > <h5>Logout</h5></a>


                    <div class="column" style="margin-left:450px;margin-top:12px"> 
                        <a href="{{ url('cart') }}"> <h5>Go to cart</h5></a>
                    </div>

                    <form>
                    @if(count($product_list) != 0)
                    @foreach ($product_list as $val)
                    <div class="card-body">

                    {{ $val->prodname }}
                    <img src="/images/{{$val->img}}" width="100" height="100" />                         
                    <br>
                    Rs.<span id=price_{{ $val->id }}>{{ $val->price }}</span>
                    <a id="add_to_cart" href="javascript:void(0);" class="btn btn-default add-to-cart" data-value={{ $val->id }}>
                    <span>Add to cart</span>
                    </a>
                    
                    </div>
                    </br></br>
                    @endforeach
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function () { 

    $('.add-to-cart').click(function () {
            var product_id = $(this).attr('data-value');
            var price = $('#price_'+product_id).text();
            var quantity = 1;
            add_productto_cart(product_id,price,quantity);
    });

    function add_productto_cart(product_id, price, quantity) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }   
        });
        var formData = {
            quantity: quantity,
            price: price,
            product_id: product_id
        };
        var type = "POST";
        $.ajax({
                type: type,
                url: "{{ url('addcart') }}",
                data: formData,
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    alert('Product added!');
                },
                error: function (data) {

                    alert('error');
                    console.log(data);
                }
        });
    }


});
</script>
