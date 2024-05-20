const ftrContent = document.querySelector("footer");

var metaDir = document.querySelector('meta[name="dir"]');
if (metaDir) {
    var prePath = metaDir.getAttribute('content');
}

ftrContent.innerHTML = `

<div class="finf">
    <img src="${prePath}data/img/icon_wh.png">
    <p><strong>AC Financial</strong></p>
    <p>Dirección: [Dirección de la empresa]</p>
    <p>Teléfono: +57 300 000 0000</p>
    <p>Correo electrónico: contacto@acmail.org</p>
    <p>Sitio web: <a href="[Sitio web de la empresa]">[Sitio web de la empresa]</a></p>
  </div>
  <div class="fscl">
    <p>Síguenos en redes sociales:</p>
    <ul>
      <li><a href="#">Facebook</a></li>
      <li><a href="#">Twitter</a></li>
      <li><a href="#">LinkedIn</a></li>
      <li><a href="#">Instagram</a></li>
    </ul>
  </div>
  <div class="flnk">
    <p>Enlaces útiles:</p>
    <ul>
      <li><a href="#">Servicios</a></li>
      <li><a href="#">Blog</a></li>
      <li><a href="#">Preguntas frecuentes</a></li>
      <li><a href="#">Contáctanos</a></li>
      <li><a href="#top">Regresar al incio</a></li>
    </ul>
  </div>
  <div class="fcpy">
    <p>© 2024 Asesoría Financiera Martinez Martinez.</p>
    <p>Todos los derechos reservados.</p>
  </div>

`;

//console.log("footer loaded.");
