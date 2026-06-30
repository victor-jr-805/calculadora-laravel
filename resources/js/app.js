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

    let resultado = 0;
    const num1 = parseFloat(valorAnterior);
    const num2 = parseFloat(valorActual);

    switch (operacion) {
        case "+":
            resultado = num1 + num2;
            break;
        case "-":
            resultado = num1 - num2;
            break;
        case "*":
            resultado = num1 * num2;
            break;
        case "/":
            resultado = num2 === 0 ? "Error" : num1 / num2;
            break;
    }

    pantallaHistorial.innerText = `${valorAnterior} ${operacion} ${valorActual} =`;
    valorActual = resultado.toString();
    operacion = null;
    valorAnterior = "";
    reiniciarPantalla = true;
    actualizarPantalla();
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
