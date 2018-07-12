
$(document).ready(function() {
	
	
	var TableData = "";
	
	// app render //
	
	function appRender(){
		
		$("#tasksDataTable tbody").html("");
		
		 $.ajax({
			  type: "POST",
			  url: "parts/getTableData.php",
			  success: function(result) {
			  
				 TableData = JSON.parse(result);								 							   			    
			     
			     // set general info
			     var allTasks 		= TableData.generalInfo.allTasks;			     
			     var completedTasks = TableData.generalInfo.completedTasks;
			     var openTasks 		= TableData.generalInfo.openTasks;
			     
			     $("#total_tasks").text(allTasks);			     
			     $("#comleted_tasks").text(completedTasks);
			     $("#open_tasks").text(openTasks);
			     
			     			     
			     ///// set table data /////
			    var tableRow = "";
		 		$.each(TableData.tasks, function(i, val) {
		 			
		 			
			 	tableRow="<tr id="+val.id+">"+ 
							"<th class='tIndex' scope='row'>"+i+"</th>" +
							"<td class='tName'>"+val.info+"</td>" +
							"<td class='tDate'>"+val.date+"</td>" +
							"<td class='tStatus'>"+val.status+"</td>"+
							"<td class='actionBar' style='text-align: center;'>"+
								"<span class='actionBtn deleteBtn disabled' data-action-type='delete' ><span class='glyphicon'>&#xe014;</span></span>"+
								"<span class='actionBtn editBtn disabled' data-action-type='edit' ><span class='glyphicon glyphicon-edit'></span></span>"+		
							"</td>"+
						 "</tr>";
			 			 	
			 	 		$("#tasksDataTable tbody").append(tableRow);
		 		});	

		      },error : function(error){
		    	  console.log(error);		    	 
		      }
		}); 
	}
	

	appRender();	
	
	// actions //		
	$(document).on('click', '.actionBtn', function(e) {
		
		var actionType = $(this).attr("data-action-type");		
		var rowId 	   = "";
					
		switch (actionType) { 
			case 'add': 
				addRow();	
				break;
			case 'delete': 
				rowId = $(this).parents("tr").attr("id");
				deleteRow(rowId);
				break;
			case 'edit': 
				rowId = $(this).parents("tr").attr("id");
				editCurrentRow(rowId);
				break;	
			case 'save': 		
				saveRows();
				break;		
			case 'update': 		
				updateRows();
				break;					
			default:
			
		}		
	
		
	});	

	// add //
	function addRow(){
		var tableRow;
		var dNow = new Date();

		var localdate= dNow.getDate() + '-' +  (dNow.getMonth()+1) + '-' + dNow.getFullYear() + ' ' + dNow.getHours() + ':' + dNow.getMinutes();
		
	 	tableRow="<tr class='addedRow'>"+ 
					"<th scope='row'>-</th> <td><input type='text' name='task_name' /></td>" +
					"<td><input type='text' disabled value='"+localdate+"' name='task_date'><span class='glyphicon glyphicon-calendar'></span></td>" +
					"<td>Open</td>"+
					"<td class='actionBar' style='text-align: center;'>"+
						"<span class='actionBtn saveBtn disabled glyphicon glyphicon-floppy-saved' data-action-type='save' data-action-type='saveRows'></span>"+		
					"</td>"+
				 "</tr>";
	 			 	
	 	$("#tasksDataTable tbody").append(tableRow);
		
	};
	
	
	// save //
	function saveRows(){
		
		var rowsToAdd = $(document).find(".addedRow");
		var tasks=[];
		
			$.each(rowsToAdd, function(i, row) {
				// todo: validate
				  var taskname = $(row).find("input[name=task_name]").val();
				  var taskdate = $(row).find("input[name=task_date]").val();
				  
				   var task={
					        "name" : taskname,
					        "date" : taskdate
					    }   

				   tasks.push(task);
			});	
			
			// save all new rows
			tasks = JSON.stringify(tasks);
			var myData ={"tasks":tasks,"actionType":"add"}	 
			 $.ajax({
					  type: "POST",
					  url: "parts/actionHandler.php",
					  data:myData,
					  dataType: 'json',
					  success: function(result) {
						  
						  appRender();							 							   
					    
				      },error : function(error){
				    	  console.log(error);
				      }
				}); 
	}
	
	
	// delete //
	function deleteRow(id){
		var myData ={"id":id,"actionType":"delete"}	 
		 $.ajax({
				  type: "POST",
				  url: "parts/actionHandler.php",
				  data:myData,
				  success: function(result) {
					  
					  appRender();							 							   
				    
			      },error : function(error){
			    	  console.log(error);
			      }
			}); 
		
	};
	
	
	
	// update //	
	function editCurrentRow(id){
		
		var tIndex = $("#"+id).find(".tIndex").html();
		tIndex = parseInt(tIndex);
		var rowData = TableData.tasks[tIndex];

		$("#"+id).addClass("rowToUpdate");
		$("#"+id).find(".actionBar").html('<span class="actionBtn saveBtn disabled glyphicon glyphicon-floppy-saved" data-action-type="update"></span>');		
		$("#"+id).find(".tName").html("<input class='tName' type='text' value='"+rowData.info+"' />");
		$("#"+id).find(".tDate").html("<input class='tDate ngDatepicker' type='text' value='"+rowData.date+"' />");
		
		var selectStatus = "<select class='tStatus'>" +			
								"<option selected='selected' style='background-color:#ccc;'>"+rowData.status+"</option>" +
								"<option>Open</option>" +
								"<option>Complete</option>" +
							"</select>";
		$("#"+id).find(".tStatus").html(selectStatus);
	};	

	
	
	function updateRows(){
		
		var rowToUpdate = $(document).find(".rowToUpdate");
		
		var tasksU=[];
		
		$.each(rowToUpdate, function(i, row) {
			// todo: validate
			  var taskname 	 = $(row).find("input[class=tName]").val();
			  var taskdate	 = $(row).find("input[class*=tDate]").val();
			  var taskStatus = $(row).find("select[class=tStatus]").val();
			  
			  var taskid = $(row).attr("id");
			   var task={
					    "id" : taskid,			   
				        "name" : taskname,
				        "date" : taskdate,
				        "status" : taskStatus
				    }   

			   tasksU.push(task);
		});	
		
		// save all new rows
		tasksU = JSON.stringify(tasksU);
		var myData ={"tasks":tasksU,"actionType":"update"}	 
		 $.ajax({
				  type: "POST",
				  url: "parts/actionHandler.php",
				  data:myData,
				  dataType: 'json',
				  success: function(result) {
					  
					  appRender();							 							   
				    
			      },error : function(error){
			    	  console.log(error);
			      }
			}); 
	}
	

	
	// datepicker //
	$(document).on('click focus', '.ngDatepicker', function(e) {
		var dt = new Date();
		var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
	
		  $(this).datepicker({
				inline: true,  
				dateFormat: "dd-mm-yy "+time,
				
		   });		
	});	
	

});	