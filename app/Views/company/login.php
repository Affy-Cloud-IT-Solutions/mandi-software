<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
  crossorigin="anonymous" />
<style>
  body {
    margin: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background: #fafafa;
    font-family: Arial, Helvetica, sans-serif;
    color: #333;
  }

  .container {
    width: 100%;
    max-width: 400px;
  }

  .card {
    width: 100%;
    background-color: #f8f8f8;
    /* Warna card */
    padding: 20px;
    border-radius: 12px;
    /* Border radius card */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  h2 {
    text-align: center;
    color: #333;
  }

  form {
    display: flex;
    flex-direction: column;
  }

  input {
    padding: 10px;
    margin-bottom: 12px;
    border: 2px solid #ddd;
    /* Border color input */
    border-radius: 8px;
    /* Border radius input */
    transition: border-color 0.3s ease-in-out;
    outline: none;
    color: #333;
    background-color: #f4f4f4;
    /* Warna input */
  }

  input:focus {
    border-color: #ff9900;
    /* Warna input saat focus */
  }

  button {
    background-color: #ff9900;
    /* Warna button */
    color: #fff;
    padding: 10px;
    border: none;
    border-radius: 8px;
    /* Border radius button */
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
  }

  button:hover {
    background-color: #ff6600;
    /* Warna button saat hover */
  }

  .w-100 {
    width: 100%;
  }

  .inputBox {
      border: 1px solid #000;
      align-items: center;
      border-radius: 7px;
      padding-right: 10px;
      justify-content: space-between;
      margin-bottom: 10px;
    }

    .inputBox input {
      border: none;
      margin-bottom: 0;
      width: 100%;
    }

    .inputBox i:hover {
      cursor: pointer;
      font-weight: bold;
    }
</style>
<title>Super Admin Login</title>
<div class="container">
  <?php if (session()->has('success')) : ?>
    <div class="alert alert-success">
      <?= session('success') ?>
    </div>
  <?php endif; ?>

  <?php if (session()->has('error')) : ?>
    <div class="alert alert-danger">
      <?= session('error') ?>
    </div>
  <?php endif; ?>
  <div class="card">
    <h2>Company Login</h2>
    <form id="loginForm" method="post" action="<?php echo base_url(route_to('company-login')) ?>">
      <input type="text" id="username" name="username" placeholder="Enter UserName" required>
      <input type="text" id="email" name="email" placeholder="Enter Email" required>
      <div class="d-flex inputBox">
      <input type="password" id="password" name="password" placeholder="Enter Password" required>
      <i class="fa fa-eye"></i>
      </div>
      <button class="w-100" type="submit">Login</button>
    </form>
  </div>
</div>

<script>
  // Function to toggle password visibility
  function togglePasswordVisibility(inputField, eyeIcon) {
    var inputType = inputField.getAttribute('type');
    if (inputType === 'password') {
      inputField.setAttribute('type', 'text');
      eyeIcon.classList.remove('fa-eye-slash');
      eyeIcon.classList.add('fa-eye');
    } else {
      inputField.setAttribute('type', 'password');
      eyeIcon.classList.remove('fa-eye');
      eyeIcon.classList.add('fa-eye-slash');
    }
  }

  // Add event listeners for eye icons
  document.querySelectorAll('.fa-eye').forEach(function (icon) {
    icon.addEventListener('click', function () {
      var inputField = this.previousElementSibling;
      togglePasswordVisibility(inputField, this);
    });
  });

  document.querySelectorAll('.fa-eye-slash').forEach(function (icon) {
    icon.addEventListener('click', function () {
      var inputField = this.previousElementSibling;
      togglePasswordVisibility(inputField, this);
    });
  });
</script>