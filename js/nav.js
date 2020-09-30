var open = document.querySelector(".open");
var clicked =  false ;
var move_img = true;
var indEXMV = 0;
var click_svg = document.querySelector(".open > svg");
slide = document.querySelector(".side_slide_nav");
open.addEventListener("click" , function(){
    if( clicked == false){
        click_svg.children.item(0).removeAttribute("d");
        click_svg.children.item(0).setAttribute("d","M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z");
        slide.style.left = "0px"

        clicked = true;
    }
    else{
        click_svg.children.item(0).removeAttribute("d");
        click_svg.children.item(0).setAttribute("d","M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z");
        slide.style.left = "-450px"
        clicked = false;
        
    
    }

});

var nav_shop_by_cat = document.querySelector(".shop");
var nav_shop_by_cat_ch = document.querySelectorAll(".cat")[0];
var nav_shop_by_cat_ch1 = document.querySelectorAll(".cat")[1];
var nav_shop_by_cat_ch2 = document.querySelectorAll(".cat")[2];
// var nav_shop_by_cat_ch3 = document.querySelectorAll(".cat")[3];
cat_clicked = false ; 
nav_shop_by_cat.addEventListener("click",function(){
    if(cat_clicked == false){
        nav_shop_by_cat.children.item(0).style.color = "rgb(224, 130, 86)";
        nav_shop_by_cat_ch.style.display = 'block';
        nav_shop_by_cat_ch1.style.display = 'block';
        nav_shop_by_cat_ch2.style.display = 'block';
        // nav_shop_by_cat_ch3.style.display = 'block';
        cat_clicked = true;
        
    }
    else{
        nav_shop_by_cat.children.item(0).style.color = "#fff";
        nav_shop_by_cat_ch.style.display = 'none';
        nav_shop_by_cat_ch1.style.display = 'none';
        nav_shop_by_cat_ch2.style.display = 'none';
        // nav_shop_by_cat_ch3.style.display = 'none';
        cat_clicked = false;
    }
});


document.querySelectorAll(".nav_ko").forEach( function(element , ind) {
    
    element.addEventListener("click",function(){
        document.querySelectorAll(".nav_ko")[ind].classList.toggle("active_nav_cat");
        document.querySelectorAll(".nav_ko").forEach(function(elm ,  i ){
            if (i != ind ){
                document.querySelectorAll(".nav_ko")[i].classList.remove("active_nav_cat");
            }
        })
    });
    
}); 
