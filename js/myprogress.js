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
executeBtns();