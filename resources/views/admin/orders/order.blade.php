<style>
table, th, td {
    border: 1px solid black;
  border-collapse: collapse;
}
</style>

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
                          
                            <td>
                            @foreach (json_decode($val->prod_quant) as $product=>$qty)
                            @foreach ($products_list as $k=>$v)

                            @if($k==$product)
                            {{ $v }}={{ $qty }},
                            @endif
                            
                            @endforeach
                            @endforeach
                            </td>
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