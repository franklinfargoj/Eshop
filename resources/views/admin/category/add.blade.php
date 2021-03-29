<div class="column" style="margin-left:450px;margin-top:12px"> 
    <a href="{{ url('show_cat') }}"> <h5>List category</h5></a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('save_cat') }}">
                        @csrf
                        Add category
                        <br>
                        <input type="text" name="category" id="category">
                        <button type="submit" class="btn btn-primary">
                                    Add
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>