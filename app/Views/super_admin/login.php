<?php
include 'include/links.php';
?>


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
</style>
<title>Super Admin Login</title>
<div class="container">

<<<<<<< HEAD
<?php if (session()->has('error')){ ?>
  <div class="alert alert-danger" role="alert">
    <?= session('error') ?>
  </div>
  <?php 
  session()->remove('error');
} ?>
=======
  <?php if (session()->has('success')) : ?>
    <div class="alert alert-success">
      <?= session('success') ?>
    </div>
  <?php endif; ?>

  <?php if (session()->has('error')) { ?>
    <div class="alert alert-danger" role="alert">
      <?= session('error') ?>
    </div>
  <?php
  } ?>
>>>>>>> ba129f4a9dab01b2266b2d5eaef5a14329f57848

  <div class="card">
    <h2>Login</h2>
    <form id="loginForm" method="post" action="<?php echo base_url(route_to('login')) ?>">
      <input type="text" id="email" name="email" placeholder="Enter Email" required>
      <input type="password" id="password" name="password" placeholder="Enter Password" required>
      <button class="w-100" type="submit">Login</button>
    </form>
  </div>
</div>