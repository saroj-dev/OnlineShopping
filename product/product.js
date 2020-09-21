var image_to_hover = document.querySelectorAll(".img_control > img");
var img = document.querySelectorAll(".img > img")
image_to_hover.forEach(function( e , i){
e.addEventListener("mouseenter",function () {
    for(j=0; j< img.length; j++){
        img[j].style.display="none";
    }
    img[i].style.display = "block";
});
});
var add = document.querySelector(".add");
var sub = document.querySelector(".sub");
function add_sub(e){
    var input_value =  parseInt(document.querySelector(".input_container").value);

    var add_sub_val = input_value + parseInt(e) ;
    if(add_sub_val < 11 &&  add_sub_val > 0){
        document.querySelector(".input_container").value = add_sub_val;
    }
}

var img1 = document.querySelectorAll(".left > img");

img1.forEach(function (elm,i) {
    elm.addEventListener("click",function(){
        if(i==1){
            if(elm.getAttribute("src") == '../svg/heartr.svg'){
                elm.setAttribute('src' , '../svg/heart-solid.svg')
            }
            else{
                elm.setAttribute('src' , '../svg/heartr.svg')
            }

        }
        else{ 
            var Url = document.getElementById("url");
            Url.value = window.location.href;
            Url.focus();
            Url.select();  
            document.execCommand("Copy");
            alert("Link copied now You can Share the Link");
        }
    })    
})
