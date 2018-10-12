var subs_option = document.querySelector("#subs_option") ;
var admin_option = document.querySelector("#admin_option") ;

subs_option.onclick = function(){
    
 if(subs_option.style.color !== "blue"){
     subs_option.style.color = "blue";
     subs_option.style.textDecoration = "underline";
     
     admin_option.style.color = "inherit";
     admin_option.style.textDecoration = "none";
     
     
 }   
       
}


admin_option.onclick = function(){
    
 if(admin_option.style.color !== "blue"){
     admin_option.style.color = "blue";
     admin_option.style.textDecoration = "underline";
     
     subs_option.style.color = "inherit";
     subs_option.style.textDecoration = "none";
     
     
 }   
       
}