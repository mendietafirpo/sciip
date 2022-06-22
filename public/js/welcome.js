var intervalID = window.setInterval(miSlider, 3600)

function miSlider(){
    if (document.getElementById("elem1").style.opacity ==""
    && document.getElementById("elem2").style.opacity =="0.2"
    && document.getElementById("elem3").style.opacity =="0.2"
    && document.getElementById("elem4").style.opacity =="0.2"
    && document.getElementById("elem5").style.opacity =="0.2"
    ){
     document.getElementById("elem1").style.opacity="0.2";
     document.getElementById("elem2").style.opacity="";
     document.getElementById("elem3").style.opacity="0.2";
     document.getElementById("elem4").style.opacity="0.2";
     document.getElementById("elem5").style.opacity="0.2";
     return;
    }
    if (document.getElementById("elem1").style.opacity =="0.2"
    && document.getElementById("elem2").style.opacity ==""
    && document.getElementById("elem3").style.opacity =="0.2"
    && document.getElementById("elem4").style.opacity =="0.2"
    && document.getElementById("elem5").style.opacity =="0.2"
    ){
     document.getElementById("elem1").style.opacity="0.2";
     document.getElementById("elem2").style.opacity="0.2";
     document.getElementById("elem3").style.opacity="";
     document.getElementById("elem4").style.opacity="0.2";
     document.getElementById("elem5").style.opacity="0.2";
     return;
    }
    if (document.getElementById("elem1").style.opacity =="0.2"
    && document.getElementById("elem2").style.opacity =="0.2"
    && document.getElementById("elem3").style.opacity ==""
    && document.getElementById("elem4").style.opacity =="0.2"
    && document.getElementById("elem5").style.opacity =="0.2"
    ){
     document.getElementById("elem1").style.opacity="0.2";
     document.getElementById("elem2").style.opacity="0.2";
     document.getElementById("elem3").style.opacity="0.2";
     document.getElementById("elem4").style.opacity="";
     document.getElementById("elem5").style.opacity="0.2";
     return;
    }
    if (document.getElementById("elem1").style.opacity =="0.2"
    && document.getElementById("elem2").style.opacity =="0.2"
    && document.getElementById("elem3").style.opacity =="0.2"
    && document.getElementById("elem4").style.opacity ==""
    && document.getElementById("elem5").style.opacity =="0.2"
    ){
     document.getElementById("elem1").style.opacity="0.2";
     document.getElementById("elem2").style.opacity="0.2";
     document.getElementById("elem3").style.opacity="0.2";
     document.getElementById("elem4").style.opacity="0.2";
     document.getElementById("elem5").style.opacity="";
     return;
    }
    if (document.getElementById("elem1").style.opacity =="0.2"
    && document.getElementById("elem2").style.opacity =="0.2"
    && document.getElementById("elem3").style.opacity =="0.2"
    && document.getElementById("elem4").style.opacity =="0.2"
    && document.getElementById("elem5").style.opacity ==""
    ){
     document.getElementById("elem1").style.opacity="";
     document.getElementById("elem2").style.opacity="0.2";
     document.getElementById("elem3").style.opacity="0.2";
     document.getElementById("elem4").style.opacity="0.2";
     document.getElementById("elem5").style.opacity="0.2";
     return;
    }

}

