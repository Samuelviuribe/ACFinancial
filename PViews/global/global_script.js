// console.log("load nav");

const navContent = document.querySelector("nav");

var asr = document.querySelector('meta[name="asr"]').getAttribute('content');

if (asr == "false") {
    
    navContent.innerHTML = `
    
        <div id="bran">
            <img src="../Pagina/data/img/icon_wh.png" alt="M2 logo" id="logo">
            <p id="txtl">AC FINANCIAL | Control de usuario</p>
        </div>
    
        <div id="drpf">
    
            <a class="drop" href="UserHome.php">
                <p>Inicio</p>
            </a>
    
            <a class="drop" href="Configuracion.php">
                <p>Configuracion</p>
            </a>
    
            <a class="drop" href="../Login/CerrarSesion.php">
                <p>Cerrar sesion</p>
            </a>
    
        </div>
    
    `;
} else {
    
    navContent.innerHTML = `
    
        <div id="bran">
            <img src="../Pagina/data/img/icon_wh.png" alt="M2 logo" id="logo">
            <p id="txtl">AC FINANCIAL | Control de asesor</p>
        </div>
    
        <div id="drpf">
    
            <a class="drop" href="AsesorHome.php">
                <p>Inicio</p>
            </a>
    
            <a class="drop" href="ConfiguracionAssr.php">
                <p>Configuracion</p>
            </a>
    
            <a class="drop" href="../Login/CerrarSesionAssr.php">
                <p>Cerrar sesion</p>
            </a>
    
        </div>
    
    `;

}
