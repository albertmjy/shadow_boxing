<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>Print the ticket</title>
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/main.css" />
		
	</head>

	<body>
		<main>
		<header>
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">
							<div class="center-block">Shadow Boxing</div>
						</a>
					</div>

				</div>
			</nav>
		</header>
		<article>
			<section class="container ">
				<form class="form-horizontal form-group-sm">
					<div class="col-sm-3">
						<!--<div class="input-group">
					      <div class="input-group-addon">C</div>
					      <input type="text" class="form-control" id="" placeholder="Campaign">
					    </div>-->
					    <input type="text" class="form-control" placeholder="Campaign"/>
					</div>
					<div class="col-sm-3">
						<!--<input type="text" class="form-control" placeholder="3rd Party"/>-->
						<select class="form-control">
							<option>FuseClick</option>
							<option>Portal</option>
							<option>AppcoachM</option>
						</select>
					</div>
					<div class="col-sm-2">
						<div class="input-group">
							<!--<input type="" class="form-control" placeholder=""/>-->
							<select class="form-control">
								<option>Both</option>
								<option>IOS</option>
								<option>Android</option>
							</select>
						</div>
						
					</div>
					<div class="col-sm-1 col-sm-pull-1">
						<button class="btn btn-primary btn-sm" type="submit">Search</button>
					</div>
					<div class="col-sm-1 col-sm-push-2">
						<button class="btn btn-danger btn-sm" type="button" data-toggle="modal" data-target="#myModal">Create</button>
					</div>
				</form>
				
			</section>
			
			<!--<hr />-->
			
			<div class="container">
				<hr />
				<table class="table table-striped table-hover">
					<thead class="">
						<tr>
							<th></th>
							<th>#</th>
							<th>Campagin</th>
							<th>3rd Party</th>
							<th>Platform</th>
							<th>Tracking Url</th>
						</tr>
					</thead>
					<tbody class="">
						<tr>
							<td>* +</td>
							<td>1</td>
							<td>dfasfs</td>
							<td>dfasfs</td>
							<td>dfasfs</td>
							<td>dfasfsjkhnkjnbhjbhjbhbjhdfbdfgbdfgbdfgbdf</td>
						</tr>
						<tr>
							<td>* +</td>
							<td>2</td>
							<td>dfasfs</td>
							<td>dfasfs</td>
							<td>dfasfs</td>
							<td>dfasfs</td>
						</tr>
						<tr>
							<td>* +</td>
							<td>3</td>
							<td>dfasfs</td>
							<td>dfasfs</td>
							<td>dfasfs</td>
							<td>dfasfs</td>
						</tr>
					</tbody>
					
				</table>
				
			</div>
			
			
		</article>

		<footer>

		</footer>
		</main>
		
		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">New Tracking Url</h4>
		      </div>
		      <div class="modal-body">
		        <form class="form-horizontal">
					
		        		<div class="row">
			        		<label class="col-sm-2 ">Campaign</label>
			        		<div class="col-sm-10">
			        			<input type="text" class=" form-control" placeholder="" />
			        		</div>
		        		</div>
		        		
		        		<div class="row">
		        		<div class="col-sm-2 ">
		        			<label class="">3rd Party</label>
		        		</div>
		        		<div class="col-sm-10">
		        			<input type="text" class=" form-control" placeholder="" />
		        		</div>
		        		</div>
		        		
		        		<div class="radio-inline">
					  <label>
					    <input type="radio" name="platform" id="ios" value="ios" checked> IOS
					  </label>
					</div>
		        		<div class="radio-inline">
					  <label>
					    <input type="radio" name="platform" id="android" value="android"> Android
					  </label>
					</div>
		        		
		        		
					<div class="panel">
						<textarea style="width: 100%;" class="form-control" placeholder="Tracking URL"></textarea>
					</div>
		        </form>
		      </div>
		      <div class="modal-footer">
		        <button type="submit" class="btn btn-default" data-dismiss="modal">Save</button>
		      </div>
		    </div>
		
		  </div>
		  </div>
	</body>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<script type="text/javascript" src="js/main.js"></script>

</html>