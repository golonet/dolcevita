<?php ?>
<!DOCTYPE html>
<html lang="he">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Tasks</title>

    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet" />
	<link type="text/css" href="css/jquery-ui.min.css" rel="stylesheet" />
	<link type="text/css" href="css/my_style.css" rel="stylesheet" />

  </head>
  <body>
  <header>
  
  </header>
	<div class="container">
		<div class="row">
			<br/>
			<div class="col-md-12">
				<div class="col-md-3 flex">					
				  <div class="column column1">
				    <span>Total Tasks</span>
				  </div>
				  <div class="column column2">
				    <span id="total_tasks" style="color: #83feff;"> </span>
				  </div>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-3 flex" >					
				  <div class="column column1">
				    <span>Tasks Completed</span>
				  </div>
				  <div class="column column2">
				    <span id="comleted_tasks" style="color: #84ff83;"> </span>
				  </div>
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-3 flex">					
				  <div class="column column1">
				    <span>Tasks Remaning</span>
				  </div>
				  <div class="column column2">
				    <span id="open_tasks" style="color: #ef3c4b;"> </span>
				  </div>
				</div>
									
			</div>
		</div>	
		<div class="row">
			<br/><br/>
			<div class="col-md-12">
			<button class="btn btn-info btn-sm actionBtn" data-action-type="add">Add New Task <span class="glyphicon glyphicon-plus"></span></button>
				<div class="table-responsive" style="border-radius: 8px; border: 1px solid #333; ">
					<table id="tasksDataTable" class="table table-bordered" style="margin-bottom: 0px;"> 
						<thead>
							<tr style="background-color: #333;color:#fff;">
								<th>#</th> <th>Task Name</th> <th>Date</th>  <th>Status</th><th>Actions</th>  
							</tr>
						</thead>
					    <tbody>
													
						</tbody> 
					</table> 
				</div>			
			</div>
		</div>	


		
	</div>
	<footer>
	
	</footer>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/my_script.js"></script>    
    
    

    
    
  </body>
</html>