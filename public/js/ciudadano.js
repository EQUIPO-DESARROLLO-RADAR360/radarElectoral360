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

// === FUNCIÓN: PASAR ENTRE PASOS ===
function nextStep(currentStep) {
  const dniInput = document.getElementById("dni");
  const dni = dniInput.value;

  if (currentStep === 1) {
    if (dni.length === 8) {
      // Mostrar spinner y desactivar el botón mientras se verifica
      document.getElementById("spinner").style.display = "inline-block"; // Mostrar spinner
      document.getElementById("nextBtnText").innerText = "Verificando...";
      document.getElementById("nextBtn").disabled = true; // Desactivar el botón

      // Verificar si el DNI ya está registrado
      checkDniExistence(dni);
    } else {
      document.getElementById("dniError").style.display = "block";
    }
  }
}

// === FUNCIÓN: VERIFICAR SI EL DNI YA ESTÁ REGISTRADO ===
function checkDniExistence(dni) {
  fetch(`/ciudadano-dni/${dni}`)
    .then(response => response.json())
    .then(data => {
      if (data.exists) {
         // Si el DNI ya existe, redirigir a la ruta con el DNI
        window.location.href = `/ciudadano/encontrado/${dni}`; // Redirigir a la ruta con el DNI
        document.getElementById("spinner").style.display = "none";
        document.getElementById("nextBtnText").innerText = "Siguiente";
        document.getElementById("nextBtn").disabled = false;
      } else {
        // Si el DNI no está registrado, hacer la consulta a la API de RENIEC
        consultaDni(dni);
      }
    })
    .catch(error => {
      console.error("Error al verificar el DNI:", error);
      alert("Hubo un error al verificar el DNI.");
      document.getElementById("spinner").style.display = "none";
      document.getElementById("nextBtnText").innerText = "Siguiente";
      document.getElementById("nextBtn").disabled = false;
    });
}

// === FUNCIÓN: CONSULTAR API DE RENIEC ===
function consultaDni(dni) {
  const apiUrl = `https://apiperu.info/api/dni/plus/${dni}`;
  const token = "mWBrDbQ2fKbVw6PMJTuJxRtYX8UKcccaVYOzYwOtFxN4t7uudE";

  fetch(apiUrl, {
    method: "GET",
    headers: { Authorization: `Bearer ${token}` },
  })
    .then(response => response.json())
    .then(data => {
      console.log(data);

      const campos = ["nombre", "apellidoPaterno", "apellidoMaterno", "region", "provincia", "distrito", "direccion"];
      const confirmBtn = document.getElementById("confirmBtn");
      const completarForm = document.getElementById("completarFomr");
      const nameStep2 = document.getElementById("nameStep2");
      const dniEncontrado = document.getElementById("dniEncontrado");

      // Actualizar barra
      actualizarPasoYProgreso(2, 3, 67);

      if (data.success) {
        const info = data.data;

        // Rellenar campos
        document.getElementById("nombre").value = info.nombres || "";
        document.getElementById("apellidoPaterno").value = info.apellido_paterno || "";
        document.getElementById("apellidoMaterno").value = info.apellido_materno || "";
        document.getElementById("region").value = info.direccion_departamento || "";
        document.getElementById("provincia").value = info.direccion_provincia || "";
        document.getElementById("distrito").value = info.direccion_distrito || "";
        document.getElementById("direccion").value = info.direccion || "";

        // Actualizar vista
        nameStep2.innerText = `¿ERES ${info.nombres}?`;
        showStep(2);
        confirmBtn.disabled = false;
        completarForm.disabled = false;
      } else {
        // Limpiar campos si no se encuentra el DNI
        campos.forEach(id => (document.getElementById(id).value = ""));
        nameStep2.innerText = "DNI NO ENCONTRADO";
        dniEncontrado.innerText = "No hemos encontrado tu nombre con tu DNI";
        showStep(2);
        confirmBtn.disabled = true;
        //completarForm.disabled = true;
      }
    })
    .catch(error => {
      console.error("Error al consultar la API de RENIEC:", error);
      alert("Hubo un error al consultar la API.");
    });
}

// === FUNCIÓN: MOSTRAR EL PASO CORRESPONDIENTE ===
function showStep(stepNumber) {
  Object.values(steps).forEach((step) => {
    step.classList.remove("active");
    step.style.display = "none"; // Oculta todos
  });

  steps[stepNumber].classList.add("active");
  steps[stepNumber].style.display = "block"; // Muestra el actual
}

// === FUNCIÓN: CONFIRMAR IDENTIDAD ===
function confirmIdentity(isConfirmed) {
  if (isConfirmed) {
    showStep(4); // Ir directo al paso 4 (final)
    actualizarPasoYProgreso(3, 3, 100);
  } else {
    goBackToStep1();
  }
}

// === FUNCIÓN: VOLVER AL PASO 1 ===
function goBackToStep1() {
  showStep(1);
  actualizarPasoYProgreso(1, 3, 33);

  // Resetear el estado del botón
  document.getElementById("nextBtnText").innerText = "Siguiente"; // Vuelve el texto a "Siguiente"
  document.getElementById("spinner").style.display = "none"; // Oculta el spinner
  document.getElementById("nextBtn").disabled = false; // Habilita el botón
}

// === FUNCIÓN: IR AL FORMULARIO MANUAL (NO SE ENCONTRÓ EN API) ===
function searchManually() {
  showStep(3);
  progressBar.style.width = "67%";
}

// Continuar al paso final
function continueRegistration() {
  const aPaterno = document.getElementById("apellidoPaterno").value.trim();
  const aMaterno = document.getElementById("apellidoMaterno").value.trim();

  if (aPaterno && aMaterno) {
    showStep(4);
    actualizarPasoYProgreso(3, 3, 100);
  } else {
    alert("Por favor completa todos los campos y acepta los términos.");
  }

}

// === FUNCIÓN: COMPLETAR REGISTRO FINAL ===
function finalizeRegistration() {
  const whatsapp = document.getElementById("whatsapp").value.trim();
  const termsCheckbox = document.getElementById("terms");

  if (whatsapp && termsCheckbox.checked) {
    showStep(4);
    progressBar.style.width = "100%";
  } else {
    alert("Por favor completa todos los campos y acepta los términos.");
  }
}

// === VALIDACIÓN DINÁMICA PARA ACTIVAR BOTÓN DE FINALIZAR ===
const whatsappInput = document.getElementById("whatsapp");
const bingoInput = document.getElementById("bingoCode");
const termsCheckbox = document.getElementById("terms");
const finalizeBtn = document.getElementById("finalizeBtn");

function checkFormCompletion() {
  if (
    whatsappInput.value.trim() &&
    termsCheckbox.checked
  ) {
    finalizeBtn.disabled = false;
  } else {
    finalizeBtn.disabled = true;
  }
}

// Escuchar eventos
if (whatsappInput && termsCheckbox) {
  whatsappInput.addEventListener("input", checkFormCompletion);
  termsCheckbox.addEventListener("change", checkFormCompletion);
}


// === FUNCIÓN: REINICIAR PROCESO ===
function restart() {
  dniInput.value = "";
  nextBtn.disabled = true;
  progressBar.style.width = "33%";
  showStep(1);
}

// === HABILITAR BOTÓN SIGUIENTE SI DNI ES VÁLIDO ===
dniInput.addEventListener("input", () => {
  if (dniInput.value.length === 8) {
    nextBtn.disabled = false;
    dniError.style.display = "none";
  } else {
    nextBtn.disabled = true;
  }
});

// === FUNCIÓN: CONVERTIR A MAYÚSCULAS EL CÓDIGO DE BINGO ===
document.getElementById("bingoCode").addEventListener("input", function() {
  this.value = this.value.toUpperCase(); // Convierte a mayúsculas
});

// Función para actualizar el paso y la barra de progreso
function actualizarPasoYProgreso(pasoActual, totalPasos, porcentaje) {
  // Actualizar el texto de "Paso X de Y"
  document.getElementById("stepText1").innerHTML = `Paso ${pasoActual} de ${totalPasos}`;

  // Actualizar el porcentaje de la barra de progreso
  document.getElementById("stepText2").innerHTML = `${porcentaje}%`;

  // Actualizar la barra de progreso
  const progressBar = document.querySelector(".progress-bar");
  progressBar.style.width = `${porcentaje}%`; // Modificar la anchura de la barra de progreso
  progressBar.setAttribute("aria-valuenow", porcentaje); // Actualizar el valor del atributo aria-valuenow para accesibilidad
}
