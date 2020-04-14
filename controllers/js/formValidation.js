const form = document.getElementById("submit_button");
const phone = document.getElementById('phone');
const nid = document.getElementById('nid');
const dob = document.getElementById('dob');
const address = document.getElementById('address');
const about = document.getElementById('about');



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
       }
       else{
           showSuccess(input);
       }
    })
}

function checkPhone(input,len){
    if(input.value.length<len){
        showError(input,`${getErrorName(input)} is not valid ${min}`);
    }
  
   else{
       showSuccess(input);
   }
}

function getErrorName(input){
    return input.id.charAt(0).toUpperCase() + input.id.slice(1);
}
form.addEventListener('click',function(e){
	e.preventDefault();
    
    checkRequire([phone,nid,dob,address,about]);
    checkPhone(phone,11);

    
    if(phone.value=='' || nid.value==''||dob.value==''||address.value==""||about.value.trim()==''){
    	
    }
   

   
    
})