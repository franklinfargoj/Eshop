<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               
                <div class="card-body">
                    <form>

                        <div class="row">
                        <div class="column">
                             <h2>Order listing</h2>
                        </div>
                        </div>

                        @if($order_list)
                        <table>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer name</th>
                            <th>Items</th>
                            <th>Total amount</th>
                        </tr>


                        @foreach ($order_list as $val)
                        <tr>
                            <td>{{ $val->order_id }}</td>
                            <td>{{ $val->customer }}</td> 
                            <td>{{ $val->customer }}</td> 

                            @foreach (json_decode($val->prod_quant) as $product=>$qty)
                            @foreach ($products_list as $k=>$v)

                            @if($k==$product)
                            <td>{{ $v }}={{ $qty }}</td>
                            @endif
                            
                            @endforeach
                            @endforeach

                            <td>{{ $val->total_amt }}</td>
                        </tr>
                        @endforeach
                        </table>
                        @endif

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>