botoes = document.querySelectorAll(".search");
rarelist = document.getElementById("rarelisthere");
for(var i=0;i<botoes.length;i++){
    botoes[i].onclick = function(e){
        type = e.target.id;
        console.log(type);
         obj = new XMLHttpRequest();
            obj.onreadystatechange = () => {
                if (obj.readyState == 4) {
                    rarelist.innerHTML = obj.responseText;

                   /*  btns = document.querySelectorAll(".itemsCheck")
                    for(var i=0;i<btns.length;i++){
                        btns[i].onclick = function(e){
                             type = e.target.id;
                             obj = new XMLHttpRequest();
                                obj.onreadystatechange = () => {
                                    if (obj.readyState == 4) {
                                        //rarelist.innerHTML = obj.responseText;
                                    }
                                }
                            obj.open("POST","php/search.php",true);
                            obj.setRequestHeader('Content-type',"application/x-www-form-urlencoded")
                            obj.send("type="+type);  
                        }
                    } */
                }
            }
        obj.open("POST","php/search.php",true);
        obj.setRequestHeader('Content-type',"application/x-www-form-urlencoded")
        obj.send("type="+type);  
    }
}
