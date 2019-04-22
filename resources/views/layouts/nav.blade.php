<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 20px 0;">
    <div class="container">
        <a class="navbar-brand" href="#">CRUD APPLICATION</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
                </li> 
                <li class="nav-item active">
                    <a class="nav-link" href="#">My Profile </a>
                </li>
            </ul>
            <div class=" my-2 my-lg-0">
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <button type="submit" class="btn btn-outline-success my-2 my-sm-0" style="border:solid 1px #fff;color: #fff;" type="submit">Sign Out</button>
                </form>
            </div>
        </div>
    </div>
</nav>