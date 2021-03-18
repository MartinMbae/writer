<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="row register-form justify-content-center">
        <div class="col-md-9">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" value=""/>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" value=""/>
            </div>

            <input type="submit" class="btnRegister" value="Login"/>

        </div>
    </div>
</form>
