<div>
<div class="card-body">

<a href="{{ url('adminloginpage') }}"><h5>Admin Login</h5></a>


    @if($errors->any())
        {!! implode('', $errors->all('<div>:message</div>')) !!}
    @endif

    <form method="POST" action="{{ route('admregister') }}">
    @csrf

    <div>
    Name
    <input type='text' name="username" value='Admin' disabled>
    </div>
    <br>

    <div>
    Admin Email
    <input type='email' name="email">
    </div>
    <br>

    <div>
    Password
    <input type='password' name="password">
    </div>
    <br>

    <div>
    Confirm password
    <input type='password' name="password_confirmation">
    </div>
    <br><br>


    <button type="submit" >Register</button>

    </form>
</div>
</div>