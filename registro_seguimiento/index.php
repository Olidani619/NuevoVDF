<?php
session_start();
unset($_SESSION['correo']);
unset($_SESSION['TipoUsuario']);
if (isset($_SESSION['id']) && $_SESSION['ident'] == 1) {
    header("location: administrador/principal.php");
} elseif (isset($_SESSION['id']) && $_SESSION['ident'] == 2) {
    header("location: usuario/principal.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<link rel="stylesheet" href="login.css">
<title>Login y Registro</title>
</head>
<body>
<div class="container">
  <div id="login-section">
    <div align="center">
    <img src="logo.png" width="250" height="188" alt="">
    </div>
    <h2>Iniciar Sesión</h2>
    <div id="login-message" class="message"></div>
    <form method="post" action="login.php" autocomplete="off">
      
      <div class="form-group">
      
      <input type="email" name="txtcorreo" maxlength="50" required>
      <label for="Correo">Correo</label>
      </div>

      <div class="form-group">
      <input type="password" id="login-password" name="txtpassword" minlength="8" maxlength="10"  required>
      <label for="Contraseña">Contraseña</label>
      </div>

      <button class="centrar" type="submit">Ingresar</button>
    </form>
    <div class="toggle-link" id="show-register">¿No tienes cuenta? Regístrate</div>
    <div class="toggle-link"><a onclick="abrirform()">Recuperar contraseña</a></div>
  </div>

  <div id="register-section" style="display:none;">
    <h2>Registro</h2>
    <div id="register-message" class="message"></div>
    <form method="post" action="registrar.php" autocomplete="off">

      <div class="form-group">
      
      <input type="email" name="txtcorreo" maxlength="50" required>
      <label for="Correo">Correo</label>
      </div>

      <div class="form-group">
      <input type="text" class="letters-only" name="txtnombre" minlength="3" maxlength="10" required>
      <label for="Nombre">Nombre</label>
      </div>

      <div class="form-group">
      <input type="text" class="letters-only" name="txtapellido"  minlength="5" maxlength="10" required>
      <label for="Apellido">Apellido</label>
      </div>

      <div class="form-group">
      <input type="text" class="numbers-only" name="txtcedula" minlength="7" maxlength="8" required>
      <label for="Cedula">Cedula</label>
      </div>

      <div class="form-group">
        <input type="password" class="cajaentradatexto" maxlength="10" minlength="8" id="password" name="txtpassword" required>
        <label for="contraseña">Contraseña</label>
      </div>

      <div class="form-group">
        <input type="password"  maxlength="10" id="confirm-password" minlength="8" required>
        <label for="contraseña">Confirmar contraseña</label>
      </div>
      <div class="error-message" id="confirm-error" role="alert" aria-live="assertive">
        Las contraseñas no coinciden.
      </div>

      <button class="centrar" name="btnregistrarx" type="submit">Registrar</button>
    </form>
    <div class="toggle-link" id="show-login">¿Ya tienes cuenta? Inicia sesión</div>
  </div>

  <div id="welcome-section" style="display:none;">
    <div class="welcome-message" id="welcome-text"></div>
    <button id="logout-btn">Cerrar sesión</button>
  </div>
</div>

<div class="caja_popup" id="formrecuperar">
  <form id="frmregistrar" action="recuperar.php" class="contenedor_popup" method="POST">
    <table align="center">
      <tr><th>Recuperar contraseña</th></tr>
      <tr>
        <td>
          <br>
          <div class="form-group">
            <input style="width: 100%;" type="email" name="txtcorreo" required>
            <label for="Correo">Correo</label>
          </div>
        </td>
      </tr>
      <tr> 
        <td align="center">
          <button type="button" onclick="cancelarform()" class="txtrecuperar">Cancelar</button>
          <input class="txtrecuperar" type="submit" name="btnrecuperar" value="Enviar" onClick="javascript: return confirm('¿Deseas enviar tu contraseña a tu correo?');">
        </td>
      </tr>
    </table>
  </form>
</div>

<script>
    // Seleccionamos todos los inputs con las clases letters-only y numbers-only
    const letterInputs = document.querySelectorAll('input.letters-only');
    const numberInputs = document.querySelectorAll('input.numbers-only');

    // Filtrado para inputs de letras
    letterInputs.forEach(input => {
        input.addEventListener('input', () => {
            // Permitimos solo letras (mayúsculas, minúsculas), tildes, eñes y espacios
            const filteredValue = input.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g, '');
            if (input.value !== filteredValue) {
                input.value = filteredValue;
            }
        });
    });

    // Filtrado para inputs de números
    numberInputs.forEach(input => {
        input.addEventListener('input', () => {
            // Permitimos solo números
            const filteredValue = input.value.replace(/[^0-9]/g, '');
            if (input.value !== filteredValue) {
                input.value = filteredValue;
            }
        });
    });


</script>
<script>
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirm-password');
    const confirmError = document.getElementById('confirm-error');
    const form = document.querySelector('form[action="registrar.php"]'); // Selecciona el formulario de registro

    function validatePasswords() {
        if (confirmPasswordInput.value === "") {
            confirmError.style.display = 'none';
            return true;
        }
        const match = passwordInput.value === confirmPasswordInput.value;
        confirmError.style.display = match ? 'none' : 'block';
        return match;
    }

    confirmPasswordInput.addEventListener('input', () => {
        validatePasswords();
    });

    form.addEventListener('submit', (event) => {
        // Validar que las contraseñas coinciden
        if (!validatePasswords()) {
            confirmPasswordInput.focus();
            event.preventDefault();
            return;
        }
    });
</script>

<script>
  const loginSection = document.getElementById('login-section');
  const registerSection = document.getElementById('register-section');
  const welcomeSection = document.getElementById('welcome-section');

  const showRegisterLink = document.getElementById('show-register');
  const showLoginLink = document.getElementById('show-login');

  const loginMessage = document.getElementById('login-message');
  const registerMessage = document.getElementById('register-message');
  const logoutBtn = document.getElementById('logout-btn');

  function clearMessages() {
    loginMessage.textContent = '';
    registerMessage.textContent = '';
  }

  function showLogin() {
    clearMessages();
    registerSection.style.display = 'none';
    welcomeSection.style.display = 'none';
    loginSection.style.display = 'block';
  }

  function showRegister() {
    clearMessages();
    loginSection.style.display = 'none';
    welcomeSection.style.display = 'none';
    registerSection.style.display = 'block';
  }

  showRegisterLink.addEventListener('click', () => {
    showRegister();
  });

  showLoginLink.addEventListener('click', () => {
    showLogin();
  });

  logoutBtn.addEventListener('click', () => {
    showLogin();
  });

  // On load start with login view
  showLogin();
</script>
<script>
  
  function abrirform() {
    document.getElementById("formrecuperar").style.display = "block";
  }

  function cancelarform() {
    document.getElementById("formrecuperar").style.display = "none";
  }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const inputs = document.querySelectorAll('input');

        inputs.forEach(input => {
            // Función para verificar el valor del input
            function checkInputValue() {
                if (input.value) {
                    input.classList.add('has-value'); // Agrega una clase si hay valor
                } else {
                    input.classList.remove('has-value'); // Remueve la clase si no hay valor
                }
            }

            // Verifica el valor al cargar la página
            checkInputValue();

            // Verifica el valor al cambiar el input
            input.addEventListener('input', checkInputValue);
        });
    });
</script>

<style>
    /* Estilo para el input cuando tiene valor */
    input.has-value + label {
        top: 4px; /* Mueve la etiqueta hacia arriba */
        font-size: 0.75rem; /* Cambia el tamaño de la fuente */
        color: #6b46c1; /* Cambia el color de la etiqueta */
    }

    /* Estilo del placeholder */
    input::placeholder {
        color: rgba(0, 0, 0, 0.5); /* Color más claro para el placeholder */
    }
</style>

</body>
</html>

