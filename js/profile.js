
const all_post_link = document.querySelector("#all_post_link") ;
const add_post_link = document.querySelector("#add_post_link") ;
const settings_link = document.querySelector("#settings_link") ;

const all_post = document.querySelector("#all_post") ;
const add_post = document.querySelector("#add_post") ;
const settings = document.querySelector("#settings") ;

all_post_link.onclick = ()=>{

all_post.style.display = "flex";
add_post.style.display = "none" ;
settings.style.display = "none" ;

all_post_link.style.color = "white" ;
add_post_link.style.color = "#DADCDE";
settings_link.style.color = "#DADCDE" ;

}

add_post_link.onclick = ()=>{

add_post.style.display = "inherit";
all_post.style.display = "none" ;
settings.style.display = "none" ;

add_post_link.style.color = "white" ;
all_post_link.style.color = "#DADCDE";
settings_link.style.color = "#DADCDE" ;



}


settings_link.onclick = ()=>{

add_post.style.display = "none";
all_post.style.display = "none" ;
settings.style.display = "inherit" ;

add_post_link.style.color = "#DADCDE" ;
all_post_link.style.color = "#DADCDE";
settings_link.style.color = "white" ;



}



