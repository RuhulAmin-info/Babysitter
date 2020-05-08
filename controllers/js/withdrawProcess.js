
document.getElementById('wid_btn').addEventListener('click',doWithdraw);


function doWithdraw(){
    
    const widAmount =  parseFloat(document.getElementById('wid_balance').value);
    const preTotalWithdraw = parseFloat(document.getElementById('Total_withdraw').innerText);
    const preCurrentBalance = parseFloat(document.getElementById('current_balance').innerText);
    if(widAmount){

        
        const newTotalWithdraw = preTotalWithdraw+widAmount;
        const newCurrentBalance = preCurrentBalance - widAmount;
        const username = document.getElementById('email').innerText;
        

        if(newCurrentBalance > 0){
            data = {
             userName:username,
             totalWithdraw:newTotalWithdraw,
             currentBalance:newCurrentBalance
            };

            var stringData = JSON.stringify(data);
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function (){
                if(xhr.readyState == 4 && xhr.status == 200){
                    //console.log(xhr.responseText);
                    var data = JSON.parse(xhr.responseText);
                    // console.log(data);
                    var total_wid = data[0].total_wid;
                    var current_balance = data[0].current_balance;
                    
                    // console.log(total_wid);
                    // console.log(current_balance);
                    
                    document.getElementById('Total_withdraw').innerText =total_wid; 
                    
                    document.getElementById('current_balance').innerText =current_balance; 
                    document.getElementById('wid_balance').innerText =''; 
                    
                }
            }

            xhr.open('POST','../controllers/withdraw_process.php',true);
            xhr.setRequestHeader("Content-Type", "application/json");
            xhr.send(stringData);

        }
        else{
            console.log("Not Enough Balance");
        }
    }
    else{
        console.log('Enter amount first');
    }
}