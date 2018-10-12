$(document).ready(function(){
    
    $("#checkbox").click(function(event){
        
        
        if(this.checked){
            $(".check").each(function(){
                
                this.checked = true ;
                
            });
        }
        
        else{
             $(".check").each(function(){
                
                this.checked = false ;
                
            });
            
        }
        
        
    });
    
   
});