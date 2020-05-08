<?php 
	include_once 'header.php';
	require_once '../controllers/babysitterAccountController.php';
	if(!isset($_SESSION['babysitter_username'])){
    header("location:login.php");
 	}
   $email = $_SESSION['babysitter_username'];
	$accountData = AccountDetails($email);
	$data = mysqli_fetch_assoc($accountData);
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <link rel="stylesheet" href="css/user_profile.css">
 </head>
 <body>
 	<h1 id="email" style="display: none"><?php echo "$email"; ?></h1>
 	<div style="margin-left: 200px">
	 	<div class="operation">
				<div class="card">
					<div style="text-align: center;">
						<h3>Total Withdraw</h3>
						<span class="money" id="Total_withdraw"><?php echo $data["total_wid"]; ?></span><span>BDT</span>
					</div>
						<input id="wid_balance" type="number" placeholder="Enter Amount For Withdraw">
						<input  id ="wid_btn"type="submit" value="Withdraw">
					</div>
					<div class="card" style="text-align: center;">
						<h3>Current Balance</h3>
						<span class="money" id="current_balance"><?php echo $data["current_balance"]; ?></span><span>BDT</span>
					</div>
				</div>	
		</div>
	</div>
	<!-- <script>
		 document.getElementById('wid_btn').addEventListener('click',doWithdraw);

		 function doWithdraw(){
		 
		 	console.log('hello');
		 	const widAmount =  parseFloat(document.getElementById('wid_balance').value);
		    const preTotalWithdraw = parseFloat(document.getElementById('Total_withdraw').innerText);
		    const preCurrentBalance = parseFloat(document.getElementById('current_balance').innerText);
		   
		   	if(widAmount)
		   	{
			        const newTotalWithdraw = preTotalWithdraw+widAmount;
			        const newCurrentBalance = preCurrentBalance - widAmount;
			        const username = <?php echo $email; ?>
       			
       			if(newCurrentBalance < 0){
       				console.log('Not enough balance');
       			}
       			else{
	       			data = {
					userName:username,
			        totalWithdraw:newTotalWithdraw,
					currentBalance:newCurrentBalance
			        };

			        var stringData = JSON.stringify(data);
		        	var xhr = new XMLHttpRequest();
		        	xhr.onreadystatechange = function (){
			            if(xhr.readyState == 4 && xhr.status == 200){
			                var data = JSON.parse(xhr.responseText);
			                var total_deposit = data[0].total_deposit;
			                var current_balance = data[0].current_balance;
			                var total_spend = data[0].total_spend;
			                console.log(total_deposit);
			                console.log(current_balance);
			                console.log(total_spend);
			                // document.getElementById('Total_deposit').innerText =total_deposit; 
			                // document.getElementById('Total_spend').innerText =total_spend; 
			                // document.getElementById('current_balance').innerText =current_balance; 
			            }
		        	}
		        	xhr.open('POST','../controllers/withdraw_process.php',true);
			        xhr.setRequestHeader("Content-Type", "application/json");
			        xhr.send(stringData);

       			}
		        
		    }else{
		    	console.log('Enter Amount First');
		    }
        }

        
	    
	   
	
			
	</script> -->
	<script src="../controllers/js/withdrawProcess.js"></script> 
	
 </body>
 </html>