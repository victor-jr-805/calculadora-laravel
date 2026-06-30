// Capturamos las pantallas mediante sus IDs
const pantalla = document.getElementById("pantalla");
const pantallaHistorial = document.getElementById("pantalla-historial");
const formulario = document.getElementById("form-calculadora");

// Evitamos que el formulario intente recargar la página al presionar los botones
if (formulario) {
    formulario.addEventListener("submit", (e) => e.preventDefault());
}

let valorActual = "0";
let valorAnterior = "";
let operacion = null;
let reiniciarPantalla = false;

// Capturamos todos los botones que tengan el atributo data-valor
const botones = document.querySelectorAll("button[data-valor]");

botones.forEach((boton) => {
    boton.addEventListener("click", () => {
        // Obtenemos el valor exacto asignado al botón
        const valor = boton.getAttribute("data-valor");

        if (!isNaN(valor) || valor === ".") {
            // Si es un número o un punto
            agregarNumero(valor);
        } else if (valor === "DEL") {
            borrarUltimo();
        } else if (valor === "RESET") {
            limpiarTodo();
        } else if (["+", "-", "*", "/"].includes(valor)) {
            seleccionarOperacion(valor);
        } else if (valor === "=") {
            calcular();
        }
    });
});

function agregarNumero(numero) {
    if (numero === "." && valorActual.includes(".")) return;

    if (valorActual === "0" || reiniciarPantalla) {
        valorActual = numero;
        reiniciarPantalla = false;
    } else {
        valorActual += numero;
    }
    actualizarPantalla();
}

function seleccionarOperacion(op) {
    if (valorActual === "") return;
    if (valorAnterior !== "") {
        calcular();
    }
    operacion = op;
    valorAnterior = valorActual;
    pantallaHistorial.innerText = `${valorAnterior} ${operacion}`;
    reiniciarPantalla = true;
}

function calcular() {
    if (operacion === null || reiniciarPantalla) return;

    const num1 = parseFloat(valorAnterior);
    const num2 = parseFloat(valorActual);

    // 1. Preparamos la "caja de datos" que le enviaremos a Laravel via POST
    const datos = {
        numero1: num1,
        numero2: num2,
        operacion: operacion,
    };

    // MEJORA: Ponemos la pantalla en un estado de espera antes de hacer el fetch
    pantalla.style.opacity = "0.5"; // Hace el número un poco transparente

    // 2. Usamos Fetch para hacer la petición en segundo plano a nuestra ruta de Laravel
    fetch("/api/calcular", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            // Laravel exige un token de seguridad (CSRF) para proteger las peticiones POST.
            // Como estamos usando Vite + Tailwind v4 de forma nativa, podemos extraerlo así:
            "X-CSRF-TOKEN":
                document.querySelector('input[name="_token"]')?.value || "",
        },
        body: JSON.stringify(datos), // Convertimos el objeto JavaScript a texto JSON
    })
        .then((respuesta) => {
            // Si el servidor responde mal (ej: división entre cero), lanzamos un error
            if (!respuesta.ok)
                return respuesta.json().then((err) => {
                    throw err;
                });
            return respuesta.json();
        })
        .then((data) => {
            // MEJORA: Restauramos la opacidad cuando llega el resultado
            pantalla.style.opacity = "1"; // Vuelve a la opacidad normal

            // 3. ¡Éxito! Laravel nos devolvió el resultado matemático fresco desde PHP
            pantallaHistorial.innerText = `${valorAnterior} ${operacion} ${valorActual} =`;
            valorActual = data.resultado.toString();
            operacion = null;
            valorAnterior = "";
            reiniciarPantalla = true;
            actualizarPantalla();
        })
        .catch((error) => {
            // MEJORA: Restauramos la opacidad cuando hay un error
            pantalla.style.opacity = "1"; // Vuelve a la opacidad normal

            // Si algo falla, mostramos el error en la pantalla digital
            console.error("Error en la API:", error);
            pantalla.innerText = error.error || "Err Server";
            reiniciarPantalla = true;
        });
}

function borrarUltimo() {
    if (valorActual.length > 1) {
        valorActual = valorActual.slice(0, -1);
    } else {
        valorActual = "0";
    }
    actualizarPantalla();
}

function limpiarTodo() {
    valorActual = "0";
    valorAnterior = "";
    operacion = null;
    pantallaHistorial.innerText = "";
    actualizarPantalla();
}

function actualizarPantalla() {
    pantalla.innerText = valorActual;
}
