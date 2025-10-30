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

// === FUNCIÓN: CONSULTAR API DE RENIEC ===
function consultaDni(dni) {
  const apiUrl = `https://apiperu.info/api/dni/plus/${dni}`;
  const token = "mWBrDbQ2fKbVw6PMJTuJxRtYX8UKcccaVYOzYwOtFxN4t7uudE";

  fetch(apiUrl, {
    method: "GET",
    headers: {
      Authorization: `Bearer ${token}`,
    },
  })
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      // Rellenar datos del formulario
        document.getElementById("apellidoPaterno").value =
          data.data.apellido_paterno || "";
        document.getElementById("apellidoMaterno").value =
          data.data.apellido_materno || "";
        document.getElementById("region").value =
          data.data.direccion_departamento || "";
        document.getElementById("provincia").value =
          data.data.direccion_provincia || "";
        document.getElementById("distrito").value =
          data.data.direccion_distrito || "";
        document.getElementById("direccion").value =
          data.data.direccion || "";
      if (data.success) {
        
        document.getElementById("nombre").value = data.data.nombres || "";
        // Mostrar nombre dinámico en el paso 2
        document.getElementById(
          "nameStep2"
        ).innerText = `¿ERES ${data.data.nombres}?`;

        
        // Ir al paso 2
        showStep(2);
        progressBar.style.width = "67%";

        document.getElementById("confirmBtn").disabled = false;   
      } else {

        // Mostrar nombre dinámico en el paso 2
        document.getElementById(
          "nameStep2"
        ).innerText = `DNI NO ENCONTRADO`
        document.getElementById(
          "dniEncontrado"
        ).innerText = `No hemos encontrado tu nombre con tu DNI`
        showStep(2);
        document.getElementById("confirmBtn").disabled = true; 

      }
    })
    .catch((error) => {
      console.error("Error al consultar la API de RENIEC:", error);
      alert("Hubo un error al consultar la API.");
    });
}

// === FUNCIÓN: PASAR ENTRE PASOS ===
function nextStep(currentStep) {
  if (currentStep === 1) {
    if (dniInput.value.length === 8) {
      //consultaDni(dniInput.value);
      // Cambiar texto del botón y mostrar spinner
      document.getElementById("spinner").style.display = "inline-block"; // Mostrar spinner
      document.getElementById("nextBtnText").innerText = "Consultando";
      document.getElementById("nextBtn").disabled = true; // Desactivar el botón

      // Realizar consulta a la API con el DNI ingresado
      consultaDni(dniInput.value);
    } else {
      dniError.style.display = "block";
    }
  }
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
    progressBar.style.width = "100%";
  } else {
    goBackToStep1();
  }
}

// === FUNCIÓN: VOLVER AL PASO 1 ===
function goBackToStep1() {
  showStep(1);
  progressBar.style.width = "33%";

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
    ticketNumber.innerText = "XYZ123";
    progressBar.style.width = "100%";
  } else {
    alert("Por favor completa todos los campos y acepta los términos.");
  }

}

// === FUNCIÓN: COMPLETAR REGISTRO FINAL ===
function finalizeRegistration() {
  const whatsapp = document.getElementById("whatsapp").value.trim();
  const bingoCode = document.getElementById("bingoCode").value.trim();
  const termsCheckbox = document.getElementById("terms");

  if (whatsapp && bingoCode && termsCheckbox.checked) {
    showStep(4);
    ticketNumber.innerText = "XYZ123";
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
    bingoInput.value.trim() &&
    termsCheckbox.checked
  ) {
    finalizeBtn.disabled = false;
  } else {
    finalizeBtn.disabled = true;
  }
}

// Escuchar eventos
if (whatsappInput && bingoInput && termsCheckbox) {
  whatsappInput.addEventListener("input", checkFormCompletion);
  bingoInput.addEventListener("input", checkFormCompletion);
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
