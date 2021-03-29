@if (Auth::check())    
<div>
<a href="{{ url('admlogout') }}"> <h5>Logout</h5></a>
</div>
@endif

<div>
<a href="{{ url('show_orders') }}"> <h5>Orders</h5></a>
</div>

<div>
<a href="{{ url('show_cat') }}"> <h5>Category</h5></a>
</div>

<div>
<a href="{{ url('show_prod') }}"> <h5>Products</h5></a>
</div>
