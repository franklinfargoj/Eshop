<style>
table, th, td {
    border: 1px solid black;
  border-collapse: collapse;
}
</style>


@if (Auth::check())    
<div>

<a href="{{ url('admlogout') }}"> <h5>Logout</h5></a>
<a href="{{ url('admdashbd') }}"> <h5>Dashboard</h5></a>
</div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               

                <div class="card-body">
                    <form>

                        <div class="row">
                        
                        <div class="column">
                             <h2>Category listing</h2>
                        </div>
                        <div class="column" style="margin-left:450px;margin-top:12px"> 
                             <a href="{{ url('add_cat') }}"> <h5>Add</h5></a>
                        </div>

                        </div>



                        @if($category_list)
                        <table>
                        <tr>
                            <th>Name</th>
                        </tr>
                        @foreach ($category_list as $val)
                        <tr>
                        <td>{{ $val->name }}</td>
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