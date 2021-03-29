<html>
<head>

<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td, th {  
  text-align: left;
  padding: 8px;
}

.myDiv {
    background-color: green; 
}

</style>
</head>
 
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">


    @if(session()->has('message'))
    <div class="myDiv">
        {{ session()->get('message') }}
    </div>
    @endif

                    <div class="column" style="margin-left:450px;margin-top:12px"> 
                        <h3>Hello,{{ $user->name}}</h3>
                    </div>
                    <a href="{{ route('logout') }}" > <h5>Logout</h5></a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                    </form>
                    <div class="column" style="margin-left:450px;margin-top:12px"> 
                             <a href="{{ url('eshop_list') }}"> <h5>Go to shop</h5></a>
                    </div>
                    <h2>Cart list</h2>


                    @if(count($cartItems) != 0)
                    <table>
                    <tr>
                        <th>Product name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($cartItems as $val)
                    <tr>
                        <td>{{ $val->productname }}</td>
                        <td>{{ $val->price }}</td>
                        <td>{{ $val->qty }}</td>   
                        <td><a href="{{ url('removecart', [$val->pid]) }}"> <h5>Remove</h5></a></td>
                    </tr>
                    @endforeach
                    
                    <tfoot>                        
                        <th id="total" colspan="1">Total :</th>
                        <td>Rs.{{ $total }}</td>                       
                    </tfoot>
                    </table>
                    
                    
                    <a href="{{ url('placeOrder') }}" > <h4>Place Order</h4></a>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div> 
</html>