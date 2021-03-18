<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="row register-form justify-content-center">
        <div class="col-md-9">

            <div class="form-group">
                <input type="email" class="form-control {{($errors->register->first('email') ? "form-error" : "")}}" name="email" placeholder="Email" value="{{ old('email') }}"/>
                {!! $errors->register->first('email', '<p class="text-danger">:message</p>') !!}

            </div>

            <div class="form-group">
                <input type="password" class="form-control  {{($errors->register->first('password') ? "form-error" : "")}}" name="password" placeholder="Password" value=""/>
                {!! $errors->register->first('password', '<p class="text-danger">:message</p>') !!}
            </div>

            <input type="submit" class="btnRegister" value="Login"/>

        </div>
    </div>
</form>
