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

<div class="container">
  <div class="card">
    <h2>Login</h2>
    <form id="loginForm">
      <input type="text" id="email" name="email" placeholder="Enter Email" required>
      <input type="password" id="password" name="password" placeholder="Enter Password" required>
      <button class="w-100" type="submit">Login</button>
    </form>
  </div>
</div>

<!-- <script>
  // Check if user is already logged in using local storage
  const token = localStorage.getItem("token");
  const email = localStorage.getItem("email");
  const usertype = localStorage.getItem("usertype");

  if (token && email && usertype) {
    // Redirect based on usertype if user is already logged in
    switch (parseInt(usertype)) {
      case 0:
        window.location.href = "./";
        break;
      case 1:
        window.location.href = "./admin/";
        break;
      case 2:
        window.location.href = "./user/";
        break;
      default:
        window.location.href = "./login.php";
    }
  }

  document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent form submission

    // Get form data
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;

    // Create request body
    const requestBody = {
      email: email,
      password: password
    };

    // Make API request to login
    fetch("<php echo $url ?>", {
      method: "POST",
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(requestBody)
    })
      .then(response => response.json())
      .then(data => {
        // Check if login was successful
        if (data.token) {
          // Save token, email, and usertype to local storage
          localStorage.setItem("token", data.token);
          localStorage.setItem("email", email);
          localStorage.setItem("usertype", data.usertype);

          console.log(data.usertype); // Log the usertype to the console

          // Redirect based on usertype
          switch (parseInt(data.usertype)) {
            case 0:
              console.log("Redirecting to ./");
              window.location.href = "./";
              break;
            case 1:
              console.log("Redirecting to ./admin.php");
              window.location.href = "./admin/";
              break;
            case 2:
              console.log("Redirecting to ./user.php");
              window.location.href = "./user/";
              break;
            default:
              console.log("Redirecting to default");
              window.location.href = "./"; // Default redirection
          }
        } else {
          alert("Login failed. Please check your credentials.");
        }
      })
      .catch(error => {
        console.error("Error:", error);
        alert("An error occurred while trying to login. Please try again later.");
      });
  });
</script> -->