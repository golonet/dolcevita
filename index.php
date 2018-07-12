<?php 


?>
<!DOCTYPE html>
<html lang="he">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/jquery-ui.min.css" rel="stylesheet">

	<style type="text/css">
		.flex{
			display: flex;	
			border-radius: 15px; background-color: #efefef;		
		}
		
		.column{
			padding: 10px;		
		    background-color: #ccc;
		}
		
		.column1 {
		    flex: 70%;
		}
		.column2 {
		    flex: 20%;
		    text-align: center;
		    background-color: #333;
    		color: #83feff;
		}
		
		td:nth-child(1),th:nth-child(1) {  
		 text-align: center;
		}
		
		.deleteBtn,.editBtn,.saveBtn{
			padding: 7px;
		    text-align: center;
		    color: #fff;
		    border-radius: 50px;
		    width: 36px;
		    font-size: 14px;
		    margin-left: 8px;
		    margin-right: 7px;		    
		}		
		
		.disabled{
		    background-color: #ccc;
		}
		
		/*
		tbody td:last-of-type{
			max-width: 120px;
		}
		*/
		
		tbody tr:hover{
		    background-color: #efefef;
		    cursor: pointer;
		}
		
		tbody tr:hover >td span.editBtn{
		    background-color: green;
		    cursor: pointer;
		}

		tbody tr:hover >td span.deleteBtn{
		    background-color: #dc4646;
		    cursor: pointer;
		}	
		
		tbody tr:hover >td span.saveBtn{
		    background-color: #5bc0de;
		    cursor: pointer;
		}	
		
		input{
			line-height: 15px;
		}		

	</style>

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
    <script type="text/javascript" src="script.js"></script>    
  </body>
</html>