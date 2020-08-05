btn = document.getElementById('tenguzao');
menuNav = document.querySelector('.header');
    btn.onclick = function(){
        if(menuNav.style.transform=="translateX(0%)"){
            menuNav.style.transform = "translateX(-110%)";
        }else{
            menuNav.style.transform = "translateX(0%)";
        }
}