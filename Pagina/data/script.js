// silverfox02

const names = [
    "Acompañamiento Financiero Esencial",
    "Asesoría Premium Plus",
    "Plan Integral para Familias",
    "Soluciones Financieras Empresariales"
];

const slogans = [
    "Tu guía hacia la estabilidad financiera",
    "Asesoramiento de calidad superior",
    "Construyendo un futuro brillante en equipo",
    "Guiando tu empresa hacia el éxito financiero"
];

const descriptions = [
    "Obtén el acompañamiento que necesitas para resolver tus problemas financieros, con servicios de calidad y con atención siempre disponible.",
    "Accede a asesoramiento financiero personalizado, servicios exclusivos y recursos premium para alcanzar tus metas financieras más ambiciosas.",
    "Brindamos un apoyo financiero completo para toda tu familia, ayudándote a alcanzar objetivos financieros juntos y construir un futuro sólido.",
    "Ofrecemos soluciones financieras adaptadas a las necesidades de tu empresa, impulsando su crecimiento y éxito financiero a largo plazo."
];

const pros = [
    [
        "Chat de ayuda 24/7",
        "3 meses de acompañamiento",
        "Descuentos de 10% en servicios adicionales"
    ],
    [
        "Asesor financiero personal",
        "12 meses de acompañamiento completo",
        "Asesoramiento financiero personalizado",
        "Descuentos de 15% en servicios adicionales",
        "Chat de ayuda 24/7 con atención prioritaria",
        "Acceso a herramientas financieras de alta calidad",
        "Acceso exclusivo a seminarios web y recursos premium"
    ],
    [
        "Hasta 4 miembros por familia",
        "12 meses de asesoramiento completo",
        "Chat de ayuda 24/7 para toda la familia",
        "Sesiones mensuales de educación financiera gratuitas",
        "Asesor financiero personal para cada miembro de la familia",
        "Asesoría financiera personalizada para cada miembro de la familia",
        "Descuentos del 10% en consultas adicionales y servicios financieros para cada miembro de la familia"
    ],
    [
        "Asistencia empresarial 24/7",
        "24 meses de asesoramiento completo",
        "Asesoramiento financiero personalizado",
        "Asesoramiento financiero especializado para empresas",
        "Sesiones de capacitación mensuales para el equipo financiero",
        "Acceso exclusivo a análisis de mercado y tendencias financieras",
        "Descuentos significativos en planes de expansión y servicios adicionales"
    ]
];

// Obtener el parámetro de la URL
const urlParams = new URLSearchParams(window.location.search);
const successMessage = urlParams.get('success');

// Verificar si el parámetro 'success' está presente y mostrar el mensaje en un alert
if (successMessage) {
    alert(decodeURIComponent(successMessage));
}


var prices = ["1", "4", "8", "20"];
var times = ["3", "6", "12", "24"];

const varImg = document.getElementById("bimg")

const varTitle = document.getElementById("btlt")
const varSloga = document.getElementById("bslo")
const varDescr = document.getElementById("bdsc")

const varUList = document.getElementById("blst");
const varPrice = document.getElementById("bprc");

const varLeftB = document.getElementById("left")
const varRghtB = document.getElementById("rght")

const box1 = document.getElementById("box1");
let elements = box1.querySelectorAll("*");

function setContent(index) {

    elements.forEach(function (element) {
        element.style.transition = "opacity 0.2s";
        element.style.opacity = "0";
    });

    setTimeout(() => {

        varImg.style.backgroundImage = `url(data/img/prod/prod${index}.png)`;
        varImg.style.background = `linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.1)), ${varImg.style.backgroundImage}`;
        varImg.style.backgroundPosition = 'center';
        varImg.style.backgroundSize = 'cover';

        varTitle.textContent = names[index];
        varSloga.textContent = slogans[index];
        varDescr.textContent = descriptions[index];
        varPrice.textContent = "$" + prices[index] + ".000 USD / " + times[index] + " meses";

        varUList.innerHTML = '';
        pros[index].forEach(function (item) {
            var li = document.createElement("li");
            li.textContent = item;
            varUList.appendChild(li);
        });

    }, 200);
    setTimeout(() => {
        elements.forEach(function (element) {
            element.style.opacity = "1";
        });
    }, 200);

}

setContent(0)
let indexValue = 0;

varLeftB.addEventListener("click", function () {

    if (indexValue > 0) {

        indexValue--;

    } else {

        indexValue = names.length - 1;

    }

    setContent(indexValue)

})

varRghtB.addEventListener("click", function () {

    if (indexValue < names.length - 1) {

        indexValue++;

    } else {

        indexValue = 0;

    }

    setContent(indexValue)

})
