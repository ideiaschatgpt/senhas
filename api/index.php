<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gerador de Senha</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h1 class="mb-4">Gerador de Senha</h1>
    <div class="form-group">
      <label for="passwordLength">Comprimento da Senha:</label>
      <input type="number" id="passwordLength" name="passwordLength" class="form-control" min="6" value="12">
    </div>
    <div class="form-group">
      <label for="generatedPassword">Senha Gerada:</label>
      <div class="input-group">
        <input type="text" id="generatedPassword" name="generatedPassword" class="form-control" readonly>
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button" id="copyButton">Copiar</button>
        </div>
      </div>
    </div>
    <button id="generateButton" class="btn btn-primary">Gerar Senha</button>
    <button id="clearButton" class="btn btn-secondary">Limpar</button>
  </div>

  <script>
    document.getElementById("generateButton").addEventListener("click", function() {
      const passwordLength = document.getElementById("passwordLength").value;
      const generatedPassword = generatePassword(passwordLength);
      document.getElementById("generatedPassword").value = generatedPassword;
    });

    document.getElementById("copyButton").addEventListener("click", function() {
      const passwordField = document.getElementById("generatedPassword");
      passwordField.select();
      document.execCommand("copy");
    });

    document.getElementById("clearButton").addEventListener("click", function() {
      document.getElementById("generatedPassword").value = "";
    });

    function generatePassword(length) {
      const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+";
      let password = "";
      for (let i = 0; i < length; i++) {
        const randomIndex = Math.floor(Math.random() * charset.length);
        password += charset.charAt(randomIndex);
      }
      return password;
    }
  </script>
</body>
</html>
