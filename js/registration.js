var subs_option = document.querySelector("#subs_option") ;
var admin_option = document.querySelector("#admin_option") ;

subs_option.onclick = function(){
    
 if(subs_option.style.color !== "blue"){
     subs_option.style.color = "blue";
     subs_option.style.textDecoration = "underline";
     
     admin_option.style.color = "inherit";
     admin_option.style.textDecoration = "none";
     
    var subs_form = document.querySelector("#subs_form");
    var admin_form = document.querySelector("#admin_form"); 
     
    subs_form.style.display = "inherit"; 
    admin_form.style.display = "none";  
     
     
 }   
       
}


admin_option.onclick = function(){
    
 if(admin_option.style.color !== "blue"){
     admin_option.style.color = "blue";
     admin_option.style.textDecoration = "underline";
     
     subs_option.style.color = "inherit";
     subs_option.style.textDecoration = "none";
     
    var subs_form = document.querySelector("#subs_form");
    var admin_form = document.querySelector("#admin_form"); 
     
    subs_form.style.display = "none"; 
    admin_form.style.display = "inherit";  
     
     
     
 }   
       
}

// EMPTY FIELDS JAVASCRIPT VALIDATION 


        const firstname = document.querySelector("#firstname");
        const lastname = document.querySelector("#lastname") ;
        const email = document.querySelector("#email") ;
        const password = document.querySelector("#password") ;
//        const username = document.querySelector("#username") ;

        var isEmpty = function(){

            var empty = 1 ;

            if(firstname.value == ""){
                firstname.style.borderColor = "#DC3545";
                empty = 0;
            }
            else{
                firstname.style.borderColor = "#CED4DA";
            }



            if(lastname.value == ""){
                lastname.style.borderColor = "#DC3545";
                empty = 0;
            }
            else{
                lastname.style.borderColor = "#CED4DA";
            }



            if(username.value == ""){
                username.style.borderColor = "#DC3545";
                empty = 0 ;
            }
            else{
                username.style.borderColor = "#CED4DA";
            }




            if(email.value == ""){
                email.style.borderColor = "#DC3545";
                empty = 0;
            }
            else{
                email.style.borderColor = "#CED4DA";
            }



            if(password.value == ""){
                password.style.borderColor = "#DC3545";
                empty = 0;
            }
            else{
                password.style.borderColor = "#CED4DA";
            }



            //RETURNING THE VALUE
            if(empty){
                return true ;
            }
            else{
                return false;
            }

        }



        
        
          //VALIDATION FOR LOGIN FORM IN JS
        const l_email = document.querySelector("#l_email");
        const city = document.querySelector("#city") ;
        const state = document.querySelector("#state") ;
        const l_password = document.querySelector("#l_password") ;
        const l_username = document.querySelector("#l_username") ;
        const reason = document.querySelector("#reason") ;
        const country = document.querySelector("#country") ;
        const number = document.querySelector("#number") ;
      

        var isEmpty_req = function(){

            var empty = 1 ;

            if(l_email.value == ""){
                l_email.style.borderColor = "#DC3545";
                empty = 0;
            }
            else{
                l_email.style.borderColor = "#CED4DA";
            }



            if(city.value == ""){
                city.style.borderColor = "#DC3545";
                empty = 0;
            }
            else{
                city.style.borderColor = "#CED4DA";
            }



            if(l_username.value == ""){
                l_username.style.borderColor = "#DC3545";
                empty = 0 ;
            }
            else{
                l_username.style.borderColor = "#CED4DA";
            }




            if(state.value == ""){
                state.style.borderColor = "#DC3545";
                empty = 0;
            }
            else{
                state.style.borderColor = "#CED4DA";
            }



            if(l_password.value == ""){
                l_password.style.borderColor = "#DC3545";
                empty = 0;
            }
            else{
                l_password.style.borderColor = "#CED4DA";
            }
            
            
            if(country.value == ""){
                country.style.borderColor = "#DC3545";
                empty = 0;
            }
            else{
                country.style.borderColor = "#CED4DA";
            }
            
            
            if(number.value == ""){
                number.style.borderColor = "#DC3545";
                empty = 0;
            }
            else{
                number.style.borderColor = "#CED4DA";
            }



            //RETURNING THE VALUE
            if(empty){
                return true ;
            }
            else{
                return false;
            }

        }
        
        
        //AJAX UNIQUE USERNAME VALIDATION
        
       




