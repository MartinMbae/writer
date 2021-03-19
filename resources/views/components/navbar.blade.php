<nav class="navbar navbar-expand-lg navbar-dark bg-custom">

    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{asset('assets/imgs/logo.png')}}" width="30" height="30" alt=""> Qualityresearch101.com
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav  ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ url("/") }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ url('about') }}">About Us</a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="{{ url('contact_us') }}">Contact Us</a>
            </li>
        </ul>
    </div>
</nav>
