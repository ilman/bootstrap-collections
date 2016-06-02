<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="description" content="">
		<meta name="author" content="">

		<title></title>

		<!-- Bootstrap core CSS -->
		<link href="../../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="../../bower_components/font-awesome/css/font-awesome.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="assets/css/file-manager.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

		<div class="pos-app" id="pos-app">
			<nav class="navbar navbar-default navbar-fixed-top" id="navbar">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle Navigation</span>
							<span class="fa fa-bars"></span>
						</button>
						<a class="navbar-brand" href="#">Pos App</a>
					</div>
					<div class="collapse navbar-collapse navbar-left">

						<div class="btn-group" role="group">
							<button class="navbar-btn btn btn-default" title="Grid View"><i class="fa fa-grid"></i></button>
							<button class="navbar-btn btn btn-default" title="List View"><i class="fa fa-list"></i></button>
							<button class="navbar-btn btn btn-default" title="Column View"><i class="fa fa-star"></i></button>
						</div>

						
						<!-- sort by name, date, size, type -->

					</div>
					<!-- nav-collapse -->

					<div class="navbar-right">
						<div class="navbar-text">Filter: </div>
						<form class="navbar-form navbar-left" role="search">
							
							<div class="btn-group" id="filter-type">
								<button class="btn btn-default" title="All" value="">A</button>
								<button class="btn btn-default" title="Foods" value="image">F</button>
								<button class="btn btn-default" title="Beverages" value="audio">B</button>
								<button class="btn btn-default" title="Deserts" value="video">D</button>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="filter" placeholder="Search">
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>			
					</div>
					<!-- navbar-right -->
					
				</div>
			</nav>
			<!-- nav -->

			<div class="container">
				<div class="row">
					<div class="col-sm-8" id="col-pos-main">
						<ul class="pos-grid" id="pos-grid">
							<li>
								no_content
							</li>
						</ul>
					</div>
					<!-- col -->
					<div class="col-sm-4 pos-details" id="col-pos-sidebar">
						<h2>Invoice</h2>

						<table class="table table-striped">
							<tbody>
								<?php for($i=0; $i<3; $i++): ?>
									<tr>
										<td>
											<h5>Blackforest</h5>
											<p class="no-margin"><small>@ Rp 10.000</small></p>
										</td>
										<td>
											<input type="number" class="form-control" value="1" style="width:64px" />
											<!-- <div class="btn-group" role="group">
												<button class="btn btn-default" title="Plus">+</button>
												<button class="btn btn-default" title="Minus">-</button>
											</div> -->
										</td>
										<td>Rp 10.000</td>
									</tr>
								<?php endfor ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="2" class="text-right">
										Total
									</td>
									<td class="value-total">Rp 100.000</td>
								</tr>
								<tr>
									<td colspan="2" class="text-right">
										Customer Paid
									</td>
									<td class="value-paid">Rp 100.000</td>
								</tr>
								<tr>
									<td colspan="2" class="text-right">
										Change
									</td>
									<td class="value-change">0</td>
								</tr>
							</tfoot>
						</table>
						<p><button type="button" class="btn btn-danger btn-block js-reset-selection">Reset</button></p>
						<p><button type="button" class="btn btn-primary btn-block js-print">Print</button></p>
					</div>
					<!-- col -->
				</div>
				<!-- row -->
				
			</div>
			<!-- container -->

			<script type="text/javascript">
				var file_path = "http:\/\/localhost\/project-lv\/falcon-calc\/uploads\/media\/admin";
				var product_list = [
					{"id":60,"product_name":"Blackforest","product_thumb":"question5-05-1_thumb.png","product_price":10000,"cat_name":"desert"},
					{"id":59,"product_name":"Red Velvet","product_thumb":"question7-03-1_thumb.png","product_price":20000,"cat_name":"desert"},
					{"id":58,"product_name":"Cheese Cake","product_thumb":"question6-05-1_thumb.png","product_price":15000,"cat_name":"desert"},
					{"id":57,"product_name":"Banana Cake","product_thumb":"question5-03-1_thumb.png","product_price":10000,"cat_name":"desert"},
					{"id":56,"product_name":"Pan Cake","product_thumb":"question1-02-1_thumb.png","product_price":10000,"cat_name":"desert"},
					{"id":55,"product_name":"Oreo Cheese Cake","product_thumb":"question1-06-1_thumb.png","product_price":10000,"cat_name":"desert"},
					{"id":54,"product_name":"Cola","product_thumb":"question1-04-1_thumb.png","product_price":10000,"cat_name":"beverage"},
					{"id":53,"product_name":"Fresh Tea","product_thumb":"falconbg2_thumb.jpg","product_price":10000,"cat_name":"beverage"},
					{"id":52,"product_name":"Milk Shake","product_thumb":"untitled-4-03-03_thumb.png","product_price":10000,"cat_name":"beverage"},
					{"id":51,"product_name":"Pudding","product_thumb":"untitled-4-03_thumb.png","product_price":10000,"cat_name":"beverage"},
					{"id":50,"product_name":"Yogurt","product_thumb":"untitled-4-03-02_thumb.png","product_price":10000,"cat_name":"beverage"},
					{"id":49,"product_name":"Coffee","product_thumb":"dom-rep_thumb.jpg","product_price":10000,"cat_name":"beverage"},
					{"id":48,"product_name":"Mineral Water","product_thumb":"dest-turkey_thumb.jpg","product_price":10000,"cat_name":"beverage"},
					{"id":47,"product_name":"Juice","product_thumb":"dest-tenerife_thumb.jpg","product_price":10000,"cat_name":"beverage"}
				];
			</script>

			<script type="text/template" id="pos_grid_item">
				<li class="item" data-key="<%= key %>">
					<div class="product-block block">
						<div class="block-thumb">
							<img src="<%= window.file_path + '/' + product_thumb %>" alt="<%= product_name %>">
						</div>
						<div class="block-action">
							<input type="checkbox" name="select_files" value="<%= product_name %>">
						</div>
					</div>
					<!-- product block -->
				</li>
			</script>
			<!-- script -->


			<script type="text/template" id="product_selected">
				<tr>
					<td>
						<h5><%= product_name %></h5>
						<p class="no-margin"><small>@ Rp <%= product_price %></small></p>
					</td>
					<td>
						<input type="number" class="form-control qty" value="<%= qty %>" style="width:64px" />
					</td>
					<td>Rp <%= product_price * qty %></td>
				</tr>
			</script>
			<!-- script -->

		</div>
		<!-- app -->


		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="../../bower_components/bootstrap/assets/js/vendor/jquery.min.js"><\/script>')</script>
		<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		
		<script src="../../bower_components/underscore/underscore-min.js"></script>

		<script src="assets/js/pos-app.js"></script>
	</body>
</html>
