<!DOCTYPE html>
<html ng-app="my-app">
<head>
	<title>Kalpvaig Technologies</title>
	<script src = "js/angular.min.js"></script>
	<script src = "js/app-angular.js"></script>
    
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>

<body>

	<nav>
	    <div class="nav-wrapper">
	      <a href="#" class="brand-logo">Kalpvaig Drinks</a>
	      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
	      <ul id="nav-mobile" class="right hide-on-med-and-down">
	        <li class="active"><a href="/dashboard">Home</a></li>
	        <li><a href="/about">About</a></li>
	        <li><a href="/orders">Orders</a></li>
	      </ul>

	       <ul class="side-nav" id="mobile-demo">
	        <li><a href="/">Home</a></li>
	        <li><a href="/about">About</a></li>
	        <li><a href="/orders">Orders</a></li>
	      </ul>
	    </div>
  	</nav>
	<div class="container">
		<div class="col s12 ">
		<h4>New Orders</h4>
			<div ng-controller = "DashboardController">
				<div class="card" ng-click="showData(x.orderid)" ng-repeat="x in helloTo">
					<div class="card-content">
						<b>#{{x.orderid}}</b> <i><b>Table number : {{x.tableno}}</b></i>
						<table class="striped">
					        <thead>
					          <tr>
					              <th data-field="name">Drink Name</th>
					              <th data-field="Quantity">Quantity</th>
					          </tr>
					        </thead>

					        <tbody>
						
					          <tr ng-repeat="drinkdetail in x.drinkdetails">
					            <td>{{drinkdetail.drinkname}}</td>
					            <td>{{drinkdetail.quantity}}</td>
					          </tr>
					  
					        </tbody>
						</table>
						<button class="waves-effect waves-light btn green" ng-click="completeOrder(x.orderid)">Complete Order</button>
					</div>
				</div>
			</div>
		</div>
		<div class="col s12 m6">
			<div ng-repeat="detail in details">
				{{detail.name}} 
			</div>
		</div>
	</div>


	 <footer class="page-footer">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">Drinks</h5>
            <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
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


	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
  	<script type="text/javascript" src="js/materialize.min.js"></script>
    
</body>
</html>