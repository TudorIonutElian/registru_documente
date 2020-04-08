let link = window.location.href;
let backgroundGradient = "linear-gradient(to bottom right, rgba(52, 161, 1, 0.671), rgba(217, 128, 250, 0.795))";
let backgroundURL      = "./design/img/mai.jpg";
let backgroundRepeat   = "no-repeat";

let fullBackground     = `${backgroundGradient}, url(${backgroundURL}) ${backgroundRepeat}`;

if(link.indexOf("index.php") > -1){
    document.getElementById('body').style.background     = fullBackground;
    document.getElementById('body').style.backgroundSize = "cover";
}


let form_add_document  = document.getElementById('form_validare_document');
    let validare_formular  = document.getElementById('validare_formular');
    let numar_curent       = document.getElementById('numarCorespondentaIntrata');
    let data_intrarii      = document.getElementById('dataIntrarii');
    data_intrarii.addEventListener("change", function(event){
        data_intrarii.style.outline = "none";
        if(data_intrarii.value == ""){
            alert('Data Invalida');
        }
        else{
            var data = new Date();
            let an_curent       = data.getFullYear();
            let luna_curenta    = data.getMonth()+1;
            let data_curenta    = data.getDate();
            let fullDate;

            if(luna_curenta < 10){
                if(data_curenta < 10){
                    fullDate = `${an_curent}-0${luna_curenta}-0${data_curenta}`;
                }else{
                    fullDate = `${an_curent}-0${luna_curenta}-${data_curenta}`;
                }
            }else{
                if(data_curenta < 10){
                    fullDate = `${an_curent}-${luna_curenta}-0${data_curenta}`;
                }else{
                    fullDate = `${an_curent}-${luna_curenta}-${data_curenta}`;
                }
            }
            if(Date.parse(fullDate)){
                if(data_intrarii.value !== fullDate){
                    data_intrarii.style.outline = "1px solid red";
                    data_intrarii.setAttribute("status", "invalid");
                }else{
                    data_intrarii.style.outline = "1px solid green";
                    data_intrarii.setAttribute("status", "valid");
                }
            }
            
        }
    });

    validare_formular.addEventListener("click", function(event){
        let dataInfo = data_intrarii.getAttribute("status");
        if(dataInfo == "valid"){
            form_add_document.submit();
        }else{
            event.preventDefault();
            data_intrarii.style.outline = "1px solid red";
            data_intrarii.setAttribute("status", "invalid");
        }
    });

    

   