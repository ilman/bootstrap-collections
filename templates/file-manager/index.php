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

		<div class="file-manager-app" id="file-manager-app">
			<nav class="navbar navbar-default navbar-fixed-top" id="navbar">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle Navigation</span>
							<span class="fa fa-bars"></span>
						</button>
						<a class="navbar-brand" href="#">File Manager</a>
					</div>
					<div class="collapse navbar-collapse navbar-left">

						<div class="btn-group" role="group">
							<button class="navbar-btn btn btn-default btn-file" title="Upload">
								<i class="fa fa-upload"></i><input id="file-upload" type="file" name="files" multiple="">
							</button>
							<button class="navbar-btn btn btn-default" title="New File"><i class="fa fa-file"></i></button>
							<button class="navbar-btn btn btn-default" title="New Folder"><i class="fa fa-folder"></i></button>
						</div>

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
								<button class="btn btn-default" title="All Files" value=""><i class="fa fa-file"></i></button>
								<button class="btn btn-default" title="Image" value="image"><i class="fa fa-picture-o"></i></button>
								<button class="btn btn-default" title="Audio" value="audio"><i class="fa fa-music"></i></button>
								<button class="btn btn-default" title="Video" value="video"><i class="fa fa-film"></i></button>
								<button class="btn btn-default" title="Archive" value="archive"><i class="fa fa-archive"></i></button>
								<button class="btn btn-default" title="Document" value="document"><i class="fa fa-file-o"></i></button>
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
					<div class="col-sm-9" id="col-file-main">
						<ul class="file-grid" id="file-grid">
							<li>
								no_content
							</li>
						</ul>
					</div>
					<!-- col -->
					<div class="col-sm-3 file-details" id="col-file-sidebar">
						&nbsp;
					</div>
					<!-- col -->
				</div>
				<!-- row -->
				

			</div>
			<!-- container -->

			<script type="text/javascript">
				var file_path = "http:\/\/localhost\/project-lv\/falcon-calc\/uploads\/media\/admin";
				var file_list = [{"id":60,"file_name":"question5-05-1.png","file_size":6482,"file_thumb":"question5-05-1_thumb.png","created_date":"2016-05-12 16:50:43","type":"audio"},{"id":59,"file_name":"question7-03-1.png","file_size":11802,"file_thumb":"question7-03-1_thumb.png","created_date":"2016-05-12 16:50:43","type":"video"},{"id":58,"file_name":"question6-05-1.png","file_size":8183,"file_thumb":"question6-05-1_thumb.png","created_date":"2016-05-12 16:50:43","type":"document"},{"id":57,"file_name":"question5-03-1.png","file_size":6206,"file_thumb":"question5-03-1_thumb.png","created_date":"2016-05-12 16:50:43","type":"archive"},{"id":56,"file_name":"question1-02-1.png","file_size":8758,"file_thumb":"question1-02-1_thumb.png","created_date":"2016-05-12 16:50:42","type":"image"},{"id":55,"file_name":"question1-06-1.png","file_size":6728,"file_thumb":"question1-06-1_thumb.png","created_date":"2016-05-12 16:50:42","type":"image"},{"id":54,"file_name":"question1-04-1.png","file_size":7725,"file_thumb":"question1-04-1_thumb.png","created_date":"2016-05-12 16:50:33","type":"image"},{"id":53,"file_name":"falconbg2.jpg","file_size":217509,"file_thumb":"falconbg2_thumb.jpg","created_date":"2016-05-12 15:53:52","type":"image"},{"id":52,"file_name":"untitled-4-03-03.png","file_size":8424,"file_thumb":"untitled-4-03-03_thumb.png","created_date":"2016-01-12 12:42:34","type":"image"},{"id":51,"file_name":"untitled-4-03.png","file_size":11490,"file_thumb":"untitled-4-03_thumb.png","created_date":"2016-01-12 12:42:34","type":"image"},{"id":50,"file_name":"untitled-4-03-02.png","file_size":10357,"file_thumb":"untitled-4-03-02_thumb.png","created_date":"2016-01-12 12:42:34","type":"image"},{"id":49,"file_name":"dom-rep.jpg","file_size":4465150,"file_thumb":"dom-rep_thumb.jpg","created_date":"2015-12-09 23:08:01","type":"image"},{"id":48,"file_name":"dest-turkey.jpg","file_size":150015,"file_thumb":"dest-turkey_thumb.jpg","created_date":"2015-08-14 22:14:01","type":"image"},{"id":47,"file_name":"dest-tenerife.jpg","file_size":107383,"file_thumb":"dest-tenerife_thumb.jpg","created_date":"2015-08-14 22:05:09","type":"image"}];
			</script>

			<script type="text/template" id="file_grid_item">
				<li class="item" data-key="<%= key %>">
					<div class="file-block block">
						<div class="block-thumb">
							<img src="<%= window.file_path + '/' + file_thumb %>" alt="<%= file_name %>">
						</div>
						<div class="block-action">
							<input type="checkbox" name="select_files" value="<%= file_name %>">
						</div>
					</div>
					<!-- file block -->
				</li>
			</script>
			<!-- script -->

			<script type="text/template" id="file_detail">
				<h4>File Details</h4>
				<p id="file-preview" class="file-preview"><img src="<%= window.file_path + '/' + file_thumb %>"></p>
				
				<p>
					<a class="text-danger js-delete-file" data-id="<%= id %>" data-key="<%= key %>" href="<%= window.site_url+'admin/file/delete/'+id  %>">
						<i class="fa fa-remove"></i> label.btn_delete_file		</a>
				</p>

				<div class="list-dl-horizontal">
					<dl>
						<dt>File Name</dt>
						<dd><%= file_name %></dd>
					</dl>
					<dl>
						<dt>Upload Date</dt>
						<dd><%= created_date %></dd>
					</dl>
					<dl>
						<dt>File Size</dt>
						<dd><%= (file_size/1024).toFixed(2) %>KB</dd>
					</dl>
				</div>
			</script>
			<!-- script -->


		<script type="text/template" id="files_selected">
				<div class="file-block block">
					<div class="block-thumb">
						<img src="<%= window.file_path + '/' + file_thumb %>" alt="<%= file_name %>">
					</div>
					<div class="block-body">
						<h5><%= file_name %></h5>
						<p class="file-meta">
							<span><%= created_date %></span> 
							<span><%= (file_size/1024).toFixed(2) %>KB</span>
						</p>
					</div>
					<div class="block-action">
						<a class="text-danger unselect" data-id="<%= id %>" data-key="<%= key %>">
							<i class="fa fa-remove"></i>
						</a>
					</div>
				</div>
				<!-- file block -->
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
		<script src="../../bower_components/blueimp-file-upload/js/vendor/jquery.ui.widget.js"></script>
		<script src="../../bower_components/blueimp-file-upload/js/jquery.fileupload.js"></script>

		<script src="assets/js/file-manager.js"></script>
	</body>
</html>
