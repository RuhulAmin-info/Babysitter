
document.getElementById('dep_btn').addEventListener('click',doDeposit);


function doDeposit(){
    
    const depAmount =  parseFloat(document.getElementById('dep_balance').value);
    const preTotalDeposit = parseFloat(document.getElementById('Total_deposit').innerText);
    const preCurrentBalance = parseFloat(document.getElementById('current_balance').innerText);
    const totalSpend = parseFloat(document.getElementById('Total_spend').innerText);

    if(depAmount){
        const newTotalDeposit = preTotalDeposit+depAmount;
        const newCurrentBalance = preCurrentBalance +depAmount;
        const username = document.getElementById('email').innerText;
       
        
        data = {
			userName:username,
            totalDeposit:newTotalDeposit,
            totalSpend:totalSpend,
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
                //console.log(total_deposit);
                //console.log(current_balance);
                //console.log(total_spend);
                document.getElementById('Total_deposit').innerText =total_deposit; 
                document.getElementById('Total_spend').innerText =total_spend; 
                document.getElementById('current_balance').innerText =current_balance; 
                
            }
        }

        xhr.open('POST','../controllers/parentsAccountController.php',true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.send(stringData);
    }
    else{
        console.log('Enter amount first');
    }
}