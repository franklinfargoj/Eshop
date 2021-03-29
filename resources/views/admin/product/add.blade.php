<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
               

                <div class="card-body">
                    <form method="POST" action="{{ route('save_prod') }}" enctype="multipart/form-data">
                        @csrf
                        <h2>Add product</h2>

                        <div class="column" style="margin-left:450px;margin-top:12px"> 
                             <a href="{{ url('show_prod') }}"> <h5>Product list</h5></a>
                        </div>

                        <div class="row">

                        <div class="col-xs-9 col-md-7">
                        <label for="title">Product name</label>
                        <input type="text" name="title" id="title">                     
                        </div>

                        <div class="col-xs-9 col-md-7">
                        <label>Choose Category:</label>
                        <select id="category_id" name="category_id">
                        @foreach ($category_list as $val)
                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                        @endforeach
                        </select>                        
                        </div>

                        <div class="col-xs-9 col-md-7">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description">
                        </div>

                        <div class="col-xs-9 col-md-7">
                        <label for="myfile">Select product image:</label>
                        <input type="file" id="myfile" name="myfile">
                        </div>

                        <div class="col-xs-9 col-md-7">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price">
                        </div>

                        <div class="col-xs-9 col-md-7">
                        <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>