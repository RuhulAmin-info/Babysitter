const form = document.getElementById("submit_button");
const phone = document.getElementById('phone');
const nid = document.getElementById('nid');
const dob = document.getElementById('dob');
const address = document.getElementById('address');
const about = document.getElementById('about');
let error = false;



function showError(input,message){
    const formGroup = input.parentElement;
    formGroup.className = 'form-group fault';
    const small = formGroup.querySelector('small');
    small.innerText = message;

}

function showSuccess(input){
    const formGroup = input.parentElement;
    formGroup.className = 'form-group success'; 
}

function checkRequire(inputArr){
    inputArr.forEach(function(input){
       if(input.value.trim()===''){
           showError(input,`${getErrorName(input)} is require`);
           error = true;
       }
       else{
           showSuccess(input);
           error = false;
       }
    })
}



function getErrorName(input){
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}


form.addEventListener('click',function(e){
    
    checkRequire([phone,nid,dob,address,about]);
    if(phone.value.length < 11 || phone.value.length > 11){
       
        var message = 'Phone number must be 11 numbers';
        showError(phone,message);
        
        error = true;
    }
    if(nid.value.length < 10 || nid.value.length > 10){
       
        var message = 'Nid must be 10 numbers';
        showError(nid,message);
        error = true;
    }
   
    if(error){
        e.preventDefault();
    }
   
    
})