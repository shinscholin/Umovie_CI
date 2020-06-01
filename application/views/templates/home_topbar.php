 <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#nduwur"><img src="http://localhost/Bioskop/aset/Img/mar.png" class="img-circle"></a>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="<=? base_url('home/'); ?>index"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li><a href="<=? base_url('home/'); ?>schedule">><span class="glyphicon glyphicon-film"></span> Schedule</a></li>
            <li>
              <a href="<=? base_url('home/'); ?>cart">
                <i class="glyphicon glyphicon-shopping-cart"></i>
                <span class="label label-danger">0</span>
              </a>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
                <li> <a href="<=? base_url('user'); ?>">rio</a> </li>
                <li><a href="<=? base_url('auth/'); logout ?>">Logout</a></li>
              </ul>          
            </div>
        </div>
      </nav>