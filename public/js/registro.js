const progressBar = document.querySelector(".progress-bar");
const dniInput = document.getElementById("dni");
const dniError = document.getElementById("dniError");
const nextBtn = document.getElementById("nextBtn");
const ticketNumber = document.getElementById("ticketNumber");

const steps = {
  1: document.getElementById("step1"),
  2: document.getElementById("step2"),
  3: document.getElementById("step3"),
  4: document.getElementById("step4"),
};

// Función para consultar la API de RENIEC
function consultaDni(dni) {
  const apiUrl = `https://apiperu.info/api/dni/plus/${dni}`;
  const token = "mWBrDbQ2fKbVw6PMJTuJxRtYX8UKcccaVYOzYwOtFxN4t7uudE"; // Token proporcionado
  
  // Realizar la consulta AJAX usando Fetch
  fetch(apiUrl, {
    method: "GET",
    headers: {
      "Authorization": `Bearer ${token}`,
    },
  })
    .then(response => response.json())
    .then(data => {
      console.log(data); // Verifica la respuesta de la API
      if (data.success) {
        // Asignar los valores obtenidos de la API a los campos del formulario
        document.getElementById("nombre").value = data.data.nombres || "";
        document.getElementById("apellidoPaterno").value = data.data.apellido_paterno || "";
        document.getElementById("apellidoMaterno").value = data.data.apellido_materno || "";
        document.getElementById("region").value = data.data.direccion_departamento || "";
        document.getElementById("provincia").value = data.data.direccion_provincia || "";
        document.getElementById("distrito").value = data.data.direccion_distrito || "";

        // Paso 2: Mostrar el nombre encontrado en la etiqueta correspondiente
        //document.getElementById("nameStep2").innerText = `Eres ${data.data.nombres}`; // Mostrar el nombre en el paso 2

        showStep(2); // Muestra el paso 2
        progressBar.style.width = "67%"; // Actualiza la barra de progreso
      } else {
        // Si el DNI no existe, mostrar el mensaje de error
        alert("No se encontró el DNI en el sistema");
      }
    })
    .catch(error => {
      console.error("Error al consultar la API de RENIEC:", error);
      alert("Hubo un error al consultar la API.");
    });
}



// Función para pasar entre los pasos
function nextStep(currentStep) {
  if (currentStep === 1) {
    if (dniInput.value.length === 8) {
      // Realizar consulta a la API con el DNI ingresado
      consultaDni(dniInput.value);
      progressBar.style.width = "67%"; // Actualiza la barra de progreso
    } else {
      dniError.style.display = "block"; // Error en DNI
    }
  } else if (currentStep === 2) {
    showStep(3);
    progressBar.style.width = "100%"; // Completar barra de progreso
  }
}

// Cambiar entre pasos
function showStep(stepNumber) {
  Object.values(steps).forEach((step) => step.classList.remove("active"));
  steps[stepNumber].classList.add("active");
}

// Confirmación de identidad
function confirmIdentity(isConfirmed) {
  if (isConfirmed) {
    // Rellenar los campos con los datos obtenidos de la API
    document.getElementById("nombre").value = document.getElementById("nombre").value || '';
    document.getElementById("apellidoPaterno").value = document.getElementById("apellidoPaterno").value || '';
    document.getElementById("apellidoMaterno").value = document.getElementById("apellidoMaterno").value || '';
    document.getElementById("region").value = document.getElementById("region").value || '';
    document.getElementById("provincia").value = document.getElementById("provincia").value || '';
    document.getElementById("distrito").value = document.getElementById("distrito").value || '';

    showStep(3); // Si es el mismo, ir directo al Paso 3
    progressBar.style.width = "100%"; // Actualiza la barra de progreso
  } else {
    goBackToStep1(); // Si no es la misma persona
  }
}

// Volver al paso 1
function goBackToStep1() {
  showStep(1);
  progressBar.style.width = "33%"; // Barra de progreso
}

// Si el DNI no se encuentra, ir al formulario
function searchManually() {
  showStep(3);
  progressBar.style.width = "67%"; // Barra de progreso
}

// Continuar al paso final
function continueRegistration() {
  showStep(4);
  ticketNumber.innerText = "XYZ123"; // Mostrar el número de cartón
  progressBar.style.width = "100%"; // Barra de progreso
}

// Reiniciar el proceso
function restart() {
  dniInput.value = "";
  nextBtn.disabled = true;
  progressBar.style.width = "33%"; // Barra de progreso inicial
  showStep(1);
}

// Activar el botón "Siguiente" si el DNI es válido
dniInput.addEventListener("input", () => {
  if (dniInput.value.length === 8) {
    nextBtn.disabled = false;
    dniError.style.display = "none"; // Ocultar error
  } else {
    nextBtn.disabled = true;
  }
});
