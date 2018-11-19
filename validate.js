function ValidateForm(){
   var username= document.getElementById("username");
   var phoneNum= document.getElementById("phoneNum");
   var mail= document.getElementById("mail");
   var password= document.getElementById("password");
   var confirm_password= document.getElementById("confirm_password");
   removeMessage();
   var valid=true;
   if((username.value.length <3) || (username.value.length >20)){
       username.className="wrong-input";
       username.nextElementSibling.innerHTML="** too short / empty filed **";
       valid=false;
   }

   




   if(phoneNum.value.length<10){
    phoneNum.className="wrong-input";
    phoneNum.nextElementSibling.innerHTML="Contact number cannot be less than 11";
    valid=false;
   }

   if ((mail.value.charAt(mail.value.length-4)!='.')&&(mail.value.charAt(mail.value.length-4)!='.')){
    mail.className="wrong-input";
    mail.nextElementSibling.innerHTML="invalid email";
    valid=false;
   }
   
   if(password.value.length<6){
    password.className="wrong-input";
    password.nextElementSibling.innerHTML="Password cannot be less than 6";
    valid=false;
   }
   if(password.value!=confirm_password.value){
    confirm_password.className="wrong-input";
    confirm_password.nextElementSibling.innerHTML="Password does not match";
    valid=false;
   }

   return valid;
}
function removeMessage(){
   var errorinput=document.querySelectorAll(".wrong-input"); 
   [].forEach.call(errorinput, function(el){
       el.classList.remove("wrong-input"); 
   });
   
   var errorpara=document.querySelectorAll(".error"); 
   [].forEach.call(errorpara, function(el){
       el.innerHTML="";
    });
}