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
cat_clicked = false ; 
nav_shop_by_cat.addEventListener("click",function(){
    if(cat_clicked == false){
        nav_shop_by_cat.children.item(0).style.color = "rgb(224, 130, 86)";
        nav_shop_by_cat_ch.style.display = 'block';
        nav_shop_by_cat_ch1.style.display = 'block';
        cat_clicked = true;
        
    }
    else{
        nav_shop_by_cat.children.item(0).style.color = "#fff";
        nav_shop_by_cat_ch.style.display = 'none';
        nav_shop_by_cat_ch1.style.display = 'none';
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
var nav = document.querySelector(".nav");
window.addEventListener("scroll",function(){
    nav.style.background = "rgba(255,255,255,0.5)";
    setTimeout(() => {
        nav.style.background = "#fff";
    }, 100);
    
})

 



// this is the code img slider
var slideIndex = 1;
var myTimer;
var slideshowContainer;
window.addEventListener("load",function() {
    showSlides(slideIndex);
    myTimer = setInterval(function(){plusSlides(1)}, 4000);
  
    //COMMENT OUT THE LINE BELOW TO KEEP ARROWS PART OF MOUSEENTER PAUSE/RESUME
    slideshowContainer = document.getElementsByClassName('slideshow-inner')[0];
  
    //UNCOMMENT OUT THE LINE BELOW TO KEEP ARROWS PART OF MOUSEENTER PAUSE/RESUME
    // slideshowContainer = document.getElementsByClassName('slideshow-container')[0];
  
    slideshowContainer.addEventListener('mouseenter', pause)
    slideshowContainer.addEventListener('mouseleave', resume)
})

// NEXT AND PREVIOUS CONTROL
function plusSlides(n){
  clearInterval(myTimer);
  if (n < 0){
    showSlides(slideIndex -= 1);
  } else {
   showSlides(slideIndex += 1); 
  }
  
  //COMMENT OUT THE LINES BELOW TO KEEP ARROWS PART OF MOUSEENTER PAUSE/RESUME
  
  if (n === -1){
    myTimer = setInterval(function(){plusSlides(n + 2)}, 4000);
  } else {
    myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
  }
}

//Controls the current slide and resets interval if needed
function currentSlide(n){
  clearInterval(myTimer);
  myTimer = setInterval(function(){plusSlides(n + 1)}, 4000);
  showSlides(slideIndex = n);
}

function showSlides(n){
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {
    slideIndex = 1;
  }
  if (n < 1) {slideIndex = slides.length;
 
}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
      
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }

  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

pause = () => {
  clearInterval(myTimer);
}

resume = () =>{
  clearInterval(myTimer);
  myTimer = setInterval(function(){plusSlides(slideIndex)}, 4000);
}




// thi is the code end image slider


// this is the typing animation function to type the test in the image slider.

 