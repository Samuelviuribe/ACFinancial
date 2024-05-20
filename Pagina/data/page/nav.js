// console.log("load nav");

const navContent = document.querySelector("nav");
const hdrContent = document.querySelector("header");
var prePath = document.querySelector('meta[name="dir"]').getAttribute('content');

navContent.innerHTML = `

<div id="bran">
			<img src="${prePath}data/img/icon_wh.png" alt="M2 logo" id="logo">
			<p id="txtl">AC FINANCIAL</p>
		</div>

		<div id="drpf">

			<a class="drop" href="${prePath}index.html">
				<img src="${prePath}data/img/icons/home.png">
				<p>Inicio</p>
			</a>
			
			<a class="drop" href="${prePath}content/about-us.html">
				<img src="${prePath}data/img/icons/question-mark.png">
				<p>Sobre nosotros</p>
			</a>
			
			<a class="drop" href="${prePath}content/blog.html">
				<img src="${prePath}data/img/icons/news.png">
				<p>Blog</p>
			</a>
			`
//			<a class="drop" href="${prePath}index.html">
//				<img src="${prePath}data/img/icons/phone.png">
//				<p>Contactanos</p>
//			</a>
//     href="${prePath}LongIn-Out/index.html"
			+`
			<a id="logn" class="drop" >
				<img src="${prePath}data/img/icons/arr.png" style=" transform: rotate(-90deg)">
				<p>Acceder</p>
			</a>
			
		</div>

`;

hdrContent.innerHTML =

`

		<div id="what">
			<a href="https://api.whatsapp.com/send?phone=57&text=%22Hola,%20estoy%20interesado!" target="_blank" rel="noopener noreferrer">
				<img src="${prePath}data/img/icons/brand-whatsapp.png" alt="">
				<h3>Charlemos ahora!</h3>
			</a>
		</div>
		
		<div id="unav">
		    <p>Como...</p>
		    <br>
		    <a href="../Validacion/login.php">Usuario</a>
		    <a href="../Validacion/loginAsesor.php">Asesor</a>
		    <br>
		</div>
		
`;

let loginVar = document.getElementById("logn");

let UNav = document.getElementById("unav")

UNav.style.left = "100%";

UNav.style.width = loginVar.offsetWidth + "px";
    
function toggleUNavWidth() {
    UNav.style.transition = 'left 0.25s';
    UNav.style.left = "calc(100% - " + loginVar.offsetWidth + "px)";
}

loginVar.addEventListener('click', toggleUNavWidth);
