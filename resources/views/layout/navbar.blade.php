<nav class="navbar navbar-expand-lg" style="background-color:#4b6cb7">
    <div class="container-fluid">
      <h1 class="navbar-brand font-fh fw-bold ms-5 text-white">Music Bar</h1>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div>
        <ul class="navbar-nav ms-5 mb-2 mb-lg-0" style="margin-left:1000px">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/logout">Log Out</a>
          </li>
          <h5 style="margin-left:400px">User: <h5 class="text-white">{{auth()->user()->name}}</h5></h5>
        </ul>

      </div>
    </div>
  </nav>
   <style>
    .nav-item{
        background-color: #A5D7E8;
        color:black;
        border-radius:50px;
    }
    .nav-item:hover{
        background-color:#AEC2B6;
    }
   </style>
