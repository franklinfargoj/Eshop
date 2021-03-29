<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               

                <div class="card-body">
                    <form>

                        <div class="row">
                        
                        <div class="column">
                             <h2>Product listing</h2>
                        </div>
                        <div class="column" style="margin-left:450px;margin-top:12px"> 
                             <a href="{{ url('add_prod') }}"> <h5>Add</h5></a>
                        </div>

                        </div>

                        @if(!empty($product_list))
                        <table>
                        <tr>                      
                            <th>Name</th>
                            <th>Category type</th>                      
                            <th>Price</th>                       
                        </tr>

                        @foreach ($product_list as $val)
                        <tr>
                            <td>{{ $val->prodname }}</td>
                            <td>{{ $val->catname }}</td>
                            <td>{{ $val->price }}</td>
                        </tr>
                        @endforeach

                        @else     
                        <td>o product exist</td>        
                        @endif

                        </table>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>