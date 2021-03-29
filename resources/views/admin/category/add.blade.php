<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('save_cat') }}">
                        @csrf
                        Add category

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