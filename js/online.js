  

  const fethcOnline = async ()=>{

          const call_online = await fetch(`async/show_online.php`);
          const data = await call_online.json();

          return {data:data} ;

        }


        const showOnline = ()=>{
          fethcOnline().then((result)=>{
           
            document.getElementById('online_count').textContent = result.data ;

            if(result.data > 0){
              document.getElementById('online').style.color = "white";
            }
            else{
              document.getElementById('online').style.color = "#CCCECF";
            }

         

          }).catch(error=>error)
        }


        setInterval(showOnline , 1000);