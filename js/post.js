   
      const like = document.querySelector("#like") ;
      const like_alert = document.querySelector("#like_alert");
     
      const noOfLike = document.querySelector("#noOfLike");

       const sendLike = async (id)=>{
       
           const call = await fetch(`async/like.php?p_id=${id}`);
           const data = await call.json();

           return {data: data};

       }

       const liked = ()=>{

        sendLike(p_id).then((result)=>{
         
         if(result.data.flag==="true"){
          like.style.color = "blue" ;
          like_alert.style.display = "none";
          noOfLike.textContent = result.data.noOfLike ;
           document.querySelector(`#verify_alert`).style.display = "none";
         }

         else if(result.data.flag === "false"){
          like.style.color = "#6C757D";
          like_alert.style.display = "none";
           noOfLike.textContent = result.data.noOfLike ;
            document.querySelector(`#verify_alert`).style.display = "none";
         }
         else if(result.data.flag==="not_verified"){
       
           document.querySelector(`#verify_alert`).style.display = "block";

         }


         else{
          like_alert.style.display = "block";
           document.querySelector(`#verify_alert`).style.display = "none";
         }

       

        }).catch(error=>error)
       }



      like.onclick = ()=>{
           liked();
      }