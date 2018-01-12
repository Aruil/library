function toggle_search(search1, search2){
    var e1 = document.getElementById(search1);
    var e2 = document.getElementById(search2);
    e1.style.opacity = 0;
    e1.style.pointerEvents = "none";
    e2.style.opacity = 1;
    e2.style.pointerEvents = "auto";
};
