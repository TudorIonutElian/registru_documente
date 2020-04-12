/* ----- XHR GET Data Functions
* - 1 - Get Numar Info
*
*
*
*
 ----- XHR GET Data Functions*/





function loginUser(e){
        e.preventDefault();
        let xhttp = new XMLHttpRequest();
        // Preluare date introduse de utilizator in formular.
        let username_value = document.getElementById("username").value;
        let parola_value = document.getElementById("parola").value;
        const loginUserData = {
            username : username_value,
            parola: parola_value
        };
        if(loginUserData.username === ""){
            alert("Va rugam sa introduceti numele utilizatorului, conform, structurii!");
        }else if(loginUserData.parola === ""){
            alert(`Va rugam sa introduceti parola pentru utilizatorul ${loginUserData.username}`);
        }
        else{
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Typical action to be performed when the document is ready:
                    if(this.responseText === "UserEroare"){
                       alert("Utilizatorul nu exista in baza de date!");
                    }

                    if(this.responseText === "Autentificare Esuata"){
                        document.querySelector("#username").value= "Utilizator inexistent";
                        document.querySelector("#username").style.backgroundColor= "red";
                    }else if(this.responseText === "A"){
                        window.location.href = "admin.php";
                    }else if(this.responseText === "SD"){
                        window.location.href = "secretariat-director.php";
                    }else if(this.responseText === "SS"){
                        window.location.href = "secretariat-serviciu.php";
                    }
                }
            };
            xhttp.open("POST", "./includes/login.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(`username=${loginUserData.username}&parola=${loginUserData.parola}`);
        }
 };

function stergeNumar(id){
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if(this.responseText == 200){
                window.location.reload();
            }

        }
    };
    xhttp.open("POST", "./actions/serviciu/sterge-numar.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if(confirm("Esti sigur ca vrei sa stergi datele din registru?")){
        xhttp.send(`id=${id}`);
    }
}
function inregistrareDocument(){
    document.getElementById("inregistrareDocument").addEventListener("click", function (e) {
        e.preventDefault();
        let eroriNumarNou = [];

        let numar_curent_corespondenta      = parseInt(document.getElementById("numar_curent_corespondenta").value);
        let data_intrarii                   = document.getElementById("data_intrarii").value;

        if(data_intrarii === ""){
            eroriNumarNou.push("Data intrarii documentului este invalida!");
        }
        let numar_corespondenta_intrata     = parseInt(document.getElementById("numar_corespondenta_intrata").value);
        if(isNaN(numar_corespondenta_intrata)){
            numar_corespondenta_intrata = 0;
        }
        let cod_emitent                     = document.getElementById("cod_emitent");
        cod_emitent                     = parseInt(cod_emitent.options[cod_emitent.selectedIndex].value);
        let continut_corespondenta          = document.getElementById("continut_corespondenta").value;
        if(continut_corespondenta.length <= 4){
            eroriNumarNou.push("Continutul solicitarii trebuie sa aiba minim 5 caractere!");
        }
        let cod_lucrator                    = document.getElementById("cod_lucrator");
        cod_lucrator                    = parseInt(cod_lucrator.options[cod_lucrator.selectedIndex].value);
        if(cod_emitent === 0){
            eroriNumarNou.push("Emitent invalid, va rugam selectati emitentul documentului!");
        }
        let data_iesirii                    = document.getElementById("data_iesirii").value;
        let rezolvare                       = document.getElementById("rezolvare").value;
        let destinatar_1                    = document.getElementById("destinatar_1");
        destinatar_1                    = parseInt(destinatar_1.options[destinatar_1.selectedIndex].value);
        let destinatar_2                    = document.getElementById("destinatar_2");
        destinatar_2                    = parseInt(destinatar_2.options[destinatar_2.selectedIndex].value);
        let destinatar_3                    = document.getElementById("destinatar_3");
        destinatar_3                    = parseInt(destinatar_3.options[destinatar_3.selectedIndex].value);
        let clasare                         = document.getElementById("clasare");
        clasare                         = parseInt(clasare.options[clasare.selectedIndex].value);

        // Creare obiect numar nou
        const numarNou = {
            numar_curent_corespondenta : numar_curent_corespondenta,
            data_intrarii: data_intrarii,
            numar_corespondenta_intrata: numar_corespondenta_intrata,
            cod_emitent: cod_emitent,
            continut_corespondenta: continut_corespondenta,
            cod_lucrator: cod_lucrator,
            data_iesirii : data_iesirii,
            rezolvare : rezolvare,
            destinatar_1: destinatar_1,
            destinatar_2: destinatar_2,
            destinatar_3: destinatar_3,
            clasare: clasare
        };

        let erori = document.getElementById("erori_inregistrare");
        if(eroriNumarNou.length != 0){
            erori.innerHTML = "";
            if(eroriNumarNou.length === 1){
                erori.innerHTML += `<div class="bg-danger text-white py-2 text-center">Aveti ${eroriNumarNou.length} eroare!</div>`;
            }else{
                erori.innerHTML += `<div class="bg-danger text-white py-2 text-center">Aveti ${eroriNumarNou.length} erori!</div>`;
            }
            eroriNumarNou.forEach((eroare, index) => {
                erori.innerHTML += `<div class="bg-warning p-2">${index+1} - ${eroare}</div>`;
            })
            eroriNumarNou = [];
        }else{
            erori.innerHTML = "";
            let data = JSON.stringify(numarNou);

            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if(this.responseText == 200){
                        window.location.reload();
                    }

                }
            };
            xhttp.open("POST", "./actions/serviciu/inregistrare.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            if(confirm("Esti sigur ca vrei sa introduci noile date?")){
                xhttp.send(`data=${data}`);
            }
        }
    });
}


function realocareNumar(id){
    let data = {
        id: id
    };

    let numar_curent_corespondenta      = document.getElementById("m-numar_curent_corespondenta");
    let data_intrarii                   = document.getElementById("m-data_intrarii");
    let numar_corespondenta_intrata     = document.getElementById("m-numar_corespondenta_intrata");
    let cod_emitent                     = document.getElementById("m-cod_emitent");
    let continut                        = document.getElementById("m-continut_corespondenta");


    data = JSON.stringify(data);
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const data = JSON.parse(this.responseText);
            numar_curent_corespondenta.innerHTML    = data.numar_curent_corespondenta;
            data_intrarii.innerHTML                 = data.data_intrarii;
            numar_corespondenta_intrata.innerHTML   = data.numar_corespondenta_intrata;
            cod_emitent.innerHTML                   = data.cod_emitent;
            continut.innerHTML                      = data.continut_corespondenta;
        }
    };
    xhttp.open("POST", "./actions/serviciu/getnumarinfo.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`data=${data}`);

    document.getElementById("ss-modal").style.display = "flex";
}

function repartizeazaNumarInregistrat(id){
    get_lucratori();
    let data = {
        id: id
    };
    let id_corespondenta                = document.getElementById("m-id_document");
    let numar_curent_corespondenta      = document.getElementById("m-numar_curent_corespondenta");
    let data_intrarii                   = document.getElementById("m-data_intrarii");
    let numar_corespondenta_intrata     = document.getElementById("m-numar_corespondenta_intrata");
    let cod_emitent                     = document.getElementById("m-cod_emitent");
    let continut                        = document.getElementById("m-continut_corespondenta");
    let inputHidden                     = document.getElementById("r-input-hidden");


    data = JSON.stringify(data);
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const data = JSON.parse(this.responseText);
            id_corespondenta.innerHTML              = data.id;
            id_corespondenta.color                  = "red";
            numar_curent_corespondenta.innerHTML    = data.numar_curent_corespondenta;
            data_intrarii.innerHTML                 = data.data_intrarii;
            numar_corespondenta_intrata.innerHTML   = data.numar_corespondenta_intrata;
            cod_emitent.innerHTML                   = data.cod_emitent;
            continut.innerHTML                      = data.continut_corespondenta;
            inputHidden.value                       = data.id;
        }
    };
    xhttp.open("POST", "./actions/serviciu/getnumarinfo.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`data=${data}`);


    document.getElementById("ss-modal").style.display = "flex";
}


function hideParent(parent){
    parent.style.display = "none";
}

document.getElementById("btn-repartizare-document").addEventListener("click", function () {
    let id_document_alocare            = document.getElementById("r-input-hidden").value;
    let cod_lucrator                   = document.getElementById("r-cod_lucrator");
    cod_lucrator                   = parseInt(cod_lucrator.options[cod_lucrator.selectedIndex].value);
    let nume_lucrator                  = document.getElementById("r-cod_lucrator");
    nume_lucrator                  = nume_lucrator.options[nume_lucrator.selectedIndex].text;

    let info = {
        id: id_document_alocare,
        cod_lucrator: cod_lucrator,
        nume_lucrator: nume_lucrator
    };
    let data = JSON.stringify(info);

    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("ss-modal").style.display = "none";
            window.location.href = "documente.php";
        }
    };
    xhttp.open("POST", "./actions/serviciu/alocare.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`data=${data}`);

})

document.getElementById('continut_corespondenta').onkeyup = function () {
    if(this.value.length > 3){
        document.getElementById('countContinut').style.display = "block";
        document.getElementById('countContinut').innerHTML = `Mai puteti introduce ${100 - this.value.length} caractere.`;
    }else if(this.value.length <= 3){
        document.getElementById('countContinut').style.display = "none";
    }
};
document.getElementById('rezolvare').onkeyup = function(){
    if(this.value.length > 3){
        document.getElementById('countContinutExit').style.display = "block";
        document.getElementById('countContinutExit').innerHTML = `Mai puteti introduce ${100 - this.value.length} caractere.`;
    }else if(this.value.length <= 3){
        document.getElementById('countContinutExit').style.display = "none";
    }
}


function get_lucratori(){
    let cod_lucrator = document.getElementById("r-cod_lucrator");
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const data_lucratori = JSON.parse(this.responseText);
           data_lucratori.forEach(lucrator =>{
               cod_lucrator.innerHTML += `<option value="${lucrator.id}">${lucrator.lucrator}</option>`;
           })
        }
    };
    xhttp.open("GET", "./actions/general/get_lucratori.php", true);
    xhttp.send();
}