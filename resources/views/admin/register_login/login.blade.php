<div>
    <div class="card-body">
        <a href="{{ url('adminregipage') }}"><h5>Admin Register</h5></a>

         @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="alert alert-danger">
                {{ session()->get('success') }}
            </div>
        @endif
        <form method="POST" action="{{ route('admlogin') }}">
        @csrf

        <div>
        Admin Username
        <input type='email' name="email">
        </div>
        <br>

        <div>
        Password
        <input type='password' name="password">
        </div>
        <br> <br>

        <button type="submit" >Login</button>

        </form>
    </div>
</div>