var pic_idx = 0;
var play = true;
var x = 0;

slideShow();


    function slideShow(){
        
        var pictures = document.getElementsByClassName("slideshow_pictures")


        for (x = 0; x < pictures.length; x++) {
            pictures[x].style.display = "none";  
        }

        pic_idx++;
        if (pic_idx > pictures.length) {
                pic_idx = 1;
        }

        pictures[pic_idx-1].style.display = "block";

        if (play == true){
            setTimeout(slideShow, 3000)
        }
    }

    function start(){
        if (!play){
            play = true;
            setTimeout(slideShow, 3000)
        }   
    }

    function end(){
        if (play){
            play = false;
            pic_idx -= 1;
            setTimeout(slideShow, 100000000)
        }
    }
