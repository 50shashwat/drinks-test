<!DOCTYPE html>
<html ng-app>
    <head>
        <title>Kalpvaig Technologies</title>
        <script src = "/js/angular.min.js"></script>

        <link rel="stylesheet" type="text/css" href="/css/materialize.min.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>

    	<nav>
    	    <div class="nav-wrapper">
              <a href="#" class="brand-logo">Kalpvaig Drinks</a>
              <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li class="active"><a href="/orders">Orders</a></li>
              </ul>

               <ul class="side-nav" id="mobile-demo">
                <li><a href="/">Home</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/orders">Orders</a></li>
              </ul>
            </div>
      	</nav>

        @yield('body')

    	 <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Drinks</h5>
                <p class="grey-text text-lighten-4">A place for Easy Booking.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Contact Kalpvaig</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="http://kalpvaig.com/app">App Development</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://kalpvaig.com/web">Web Development</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            &copy; 2017 Copyright Kalpvaig | <a href="http://kalpvaig.com">Kalpvaig Technologies </a>
            </div>
          </div>
        </footer>


    	<script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
      	<script type="text/javascript" src="/js/materialize.min.js"></script>
        
        @yield('script')
    </body>
</html>