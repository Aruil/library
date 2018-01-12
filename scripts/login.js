function toggle_login(div1, div2){
    var e1 = document.getElementById(div1);
    var e2 = document.getElementById(div2);
    e1.style.opacity = 0;
    e1.style.pointerEvents = "none";
    e2.style.opacity = 1;
    e2.style.pointerEvents = "auto";
};

