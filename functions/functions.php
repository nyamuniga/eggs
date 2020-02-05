<?php
$con = mysqli_connect("localhost","root","","eggs");
function total_items(){
   
  

      global $con;
		
	$get_items = "select * from tasks"; 
    
     $run_items = mysqli_query($con, $get_items);

      $count_items = mysqli_num_rows($run_items);

             # code...
         
         

		
		   echo $count_items; 
	 
	 
	  
	
	 	
          
   	  
	  
	  
 
}

function getsincome(){
   
	global $con;
	$total_income=0;
		$get_pro = "select * from data ";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	while ($row_pro = mysqli_fetch_array($run_pro)) {
		
	
		$net = $row_pro['net'];
		$total_income+=$net;

	}
	$net_income=$total_income-480000;
	if($net_income<=0){
	echo "<div class='alert alert-danger'>
  <center>Net loss:<strong> $net_income rwf</strong></center>
</div>";}else{
echo "<div class='alert alert-success'>
  <center>Net income:<strong> $net_income rwf</strong></center>
</div>";
}

   
}

function getstasks(){
   
	global $con;
	
	$get_pro = "select * from tasks";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	while ($row_pro = mysqli_fetch_array($run_pro)) {
		
		
		
		
		$task = $row_pro['task']; 
		$date=$row_pro['date'];
		$time=$row_pro['time'];
		
		
	echo "
	  
	  
<li  class='LI'>$task<small style='float:right;'>$date at $time</small></li>
	    ";
	}	
   
}


function getsdata(){
   
	global $con;
	
	$get_pro = "select * from data order by id DESC";
	
	$run_pro = mysqli_query($con, $get_pro);
	
	while ($row_pro = mysqli_fetch_array($run_pro)) {
		
		
		
		
		$date = $row_pro['date']; 
		$chicken = $row_pro['chicken'];
		$eggs = $row_pro['eggs'];
		$food = $row_pro['food'];
		$amount = $row_pro['amount'];
		$net = $row_pro['net'];
		
		
	echo "
	  
	  
      
 <tr>
                  <td>$date</td>
                  <td>$chicken</td>
                  <td>$eggs</td>
                  <td>$food rwf</td>
                  <td>$amount rwf</td>
                  <td>$net rwf</td>
                </tr>
	    ";
	}	
   
}
?>
