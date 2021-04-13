<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.82.0">
    <title>Sidebars · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <style>
      body
      {
        min-height: 100vh;
        background-color: #fff;/* es gay*/
        background-color: #000;
        /*sss*/
      }

      .navbar
      {
        width:250px;
        height:100vh;
        position: fixed;
        background-color: #222;
        transition: 0.4s;
      }

      .nav-link
      {
        font-size: 1.25em;
      }

      .nav-link:active,
      .nav-link:focus,
      .nav-link:hover
      {
        background-color: rgba(121, 255, 255, 1);
        -webkit-text-fill-color: black;
      }

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      #menu-btn
      {
        transition: 0.4s;    
      }

      
      .active-nav
      {
        margin-left:0;
      }

      .active-cont
      {
        margin-left: 250px;
      }
      
      #menu-btn:hover
      {
        fill: rgba(121, 255, 255, 1);
      }

      #sidebar2
      {
        margin-left: -180px;
        transition-delay: 0.2s;
        transition: 0.2s;
      }
      </style>
      <script>
        function closeSidebar()
        {
          var sidebar = document.getElementById("sidebar");
          var sidebar2 = document.getElementById("sidebar2");
          var button = document.getElementById("menu-btn");

          if(sidebar.style.marginLeft == "-250px")
          {        
            //abrir
            sidebar.style.marginLeft = "0px";
            button.style.transform.transitionDuration = "2s";
            button.style.transform = "translateX(0px)";
            
          }
          else
          {
            //fechar
            sidebar.style.marginLeft = "-250px";
            button.style.transform.transitionDuration = "2s";
            button.style.transform = "translateX(-250px) rotate(180Deg)";
          }
        }
      </script>
    
    <!-- Custom styles for this template -->
    <link href="./css/sidebars.css" rel="stylesheet">
  </head>
  <body>
      <nav class="navbar navbar-expand d-flex flex-column align-item-start" id="sidebar">
        <a href="#" class="navbar-brand text-light">
          <div class="display-5 font-weight-bold">
            <div class="row">
              <div class="col">
              GOD
              </div>
            </div>       
          </div>
        </a>
        <hr style="width:100%;text-align:left;margin-left:0;margin-bottom:0;color:#fff">
        <ul class="navbar-nav d-flex flex-column w-100">
          <li class="nav-item w-100">
            <a href="#" class="nav-link text-light ps-3">Criar Ocorrência</a>
          </li>
        </ul>
      </nav>

    <button class="btn text-dark shadow-none" id="menu-btn" style="position:relative;left:250px;width:50px;height:50px" onclick="closeSidebar()">
    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	    width="30px" height="30px" viewBox="0 0 451.846 451.847" style="enable-background:new 0 0 451.846 451.847;">
      <g>
        <path d="M97.141,225.92c0-8.095,3.091-16.192,9.259-22.366L300.689,9.27c12.359-12.359,32.397-12.359,44.751,0
          c12.354,12.354,12.354,32.388,0,44.748L173.525,225.92l171.903,171.909c12.354,12.354,12.354,32.391,0,44.744
          c-12.354,12.365-32.386,12.365-44.745,0l-194.29-194.281C100.226,242.115,97.141,234.018,97.141,225.92z"/>
      </g>
    </svg>
    </button>

    <!--
      <div class="d-flex flex-column p-3 text-white bg-dark h-100 vh-100" style="width: 280px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-4">G.O.D</span>
        </a>

        <button type="button" class="navbar-toggler border-0" data-toggle="collapse" data-target="#nav">a</button>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item nav-item-dark">
            <a href="#" class="nav-link text-white hoverChanger" style="font-weight:bold">
              • Home
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-white hoverChanger">
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-white hoverChanger">
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-white hoverChanger">
              Products
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link text-white hoverChanger">
              Customers
            </a>
          </li>
        </ul>
        <hr>
        <div class="dropup">
          <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle me-2">
            <strong>mdo</strong>
          </a>
          <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
    -->
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="./js/sidebars.js"></script>
  </body>
</html>
