botoes = document.querySelectorAll(".search");
rarelist = document.getElementById("rarelisthere");
for(var i=0;i<botoes.length;i++){
    botoes[i].onclick = function(e){
        type = e.target.id;
         obj = new XMLHttpRequest();
            obj.onreadystatechange = () => {
                if (obj.readyState == 4) {
                    rarelist.innerHTML = obj.responseText;

                    btns = document.querySelectorAll(".itemsCheck")
                    for(var i=0;i<btns.length;i++){
                        btns[i].onclick = function(e){
                             idItem = e.target.id;
                             obj = new XMLHttpRequest();
                                obj.onreadystatechange = () => {
                                    if (obj.readyState == 4) {
                                        //rarelist.innerHTML = obj.responseText;
                                    }
                                }
                            obj.open("POST","../php/update.php",true);
                            obj.setRequestHeader('Content-type',"application/x-www-form-urlencoded")
                            obj.send("idItem="+idItem+"&tela=myprogress");  
                        }
                    }

                    btnsName = document.querySelectorAll(".itemsName");
                    for(var i=0;i<btnsName.length;i++){
                        btnsName[i].onclick = function(e){
                            itemName = e.target.innerText;
                             obj = new XMLHttpRequest();
                                obj.onreadystatechange = () => {
                                    if (obj.readyState == 4) {
                                        blackscreen = document.getElementsByClassName("blackscreen")[0];
                                        blackscreen.innerHTML = obj.responseText;
                                        blackscreen.style.display = "block";
                                        window.onclick = function(event) {
                                            if (event.target == blackscreen) {
                                              blackscreen.style.display = "none";
                                            }
                                          }
                                        document.getElementsByClassName("close")[0].onclick = function(){
                                            blackscreen.style.display = "none";
                                        }
                                    }
                                }
                            obj.open("POST","../php/searchDetails.php",true);
                            obj.setRequestHeader('Content-type',"application/x-www-form-urlencoded");
                            obj.send("itemName="+itemName); 
                        }
                    } 


                }
            }
        obj.open("POST","../php/search.php",true);
        obj.setRequestHeader('Content-type',"application/x-www-form-urlencoded")
        obj.send("type="+type+"&tela=myprogress");   
    }
}
executeBtns = function(){
    btns = document.querySelectorAll(".itemsCheck")
        for(var i=0;i<btns.length;i++){
            btns[i].onclick = function(e){
                    idItem = e.target.id;
                    obj = new XMLHttpRequest();
                    obj.onreadystatechange = () => {
                        if (obj.readyState == 4) {
                            //rarelist.innerHTML = obj.responseText;
                        }
                    }
            obj.open("POST","../php/update.php",true);
            obj.setRequestHeader('Content-type',"application/x-www-form-urlencoded")
            obj.send("idItem="+idItem+"&tela=myprogress");  
        }
    }
}
executeSearchs = function(){
    btnsName = document.querySelectorAll(".itemsName");
        for(var i=0;i<btnsName.length;i++){
            btnsName[i].onclick = function(e){
                itemName = e.target.innerText;
                    obj = new XMLHttpRequest();
                    obj.onreadystatechange = () => {
                        if (obj.readyState == 4) {
                            blackscreen = document.getElementsByClassName("blackscreen")[0];
                            blackscreen.innerHTML = obj.responseText;
                            blackscreen.style.display = "block";
                            window.onclick = function(event) {
                                if (event.target == blackscreen) {
                                    blackscreen.style.display = "none";
                                }
                                }
                            document.getElementsByClassName("close")[0].onclick = function(){
                                blackscreen.style.display = "none";
                            }
                        }
                    }
                obj.open("POST","../php/searchDetails.php",true);
                obj.setRequestHeader('Content-type',"application/x-www-form-urlencoded");
                obj.send("itemName="+itemName); 
            }
        } 
}
executeSearchs();
executeBtns();

btn = document.getElementById('tenguzao');
menuNav = document.querySelector('.header');
    btn.onclick = function(){
        if(menuNav.style.transform=="translateX(0%)"){
            menuNav.style.transform = "translateX(-110%)";
        }else{
            menuNav.style.transform = "translateX(0%)";
        }
}