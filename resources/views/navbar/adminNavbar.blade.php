<nav class="navbar bg-success p-2 text-dark bg-opacity-25 ">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Shawn Group</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">{{ Auth::user()->name }}</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active text-light" aria-current="page" href="{{route('admin.dashboard')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-light" href="#">History</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-light" href="#">Cancelled Applicant</a>
            </li>
          </ul>
          <br>
          <form action="{{route('admin.logout')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        </div>
      </div>
    </div>
  </nav>
