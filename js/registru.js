let link = window.location.href;
let backgroundGradient = "linear-gradient(to bottom right, rgba(52, 161, 1, 0.671), rgba(217, 128, 250, 0.795))";
let backgroundURL      = "./design/img/mai.jpg";
let backgroundRepeat   = "no-repeat";

let fullBackground     = `${backgroundGradient}, url(${backgroundURL}) ${backgroundRepeat}`;

if(link.indexOf("index.php") > -1){
    document.getElementById('body').style.background     = fullBackground;
    document.getElementById('body').style.backgroundSize = "cover";
}

// Versiune noua cu Javascript

if(window.location.href.indexOf("index.php") > -1){
    document.getElementById("loginUser").onclick = function (e) {
        loginUser(e);
    }
}

if(window.location.href.indexOf("secretariat-serviciu.php") > -1){
    inregistrareDocument();
}



   