<?php include("header.php"); ?>

<main>
  <div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

            <div class="d-flex justify-content-center py-4">
              <a href="index.php" class="logo d-flex align-items-center w-auto">
                <img class="svglogo" src="assets/img/mysvglogo.svg" alt="logo">
                <span class="d-none d-lg-block">JunaidRana</span>
              </a>
            </div><!-- End Logo -->

            <div class="card mb-3">

              <div class="card-body">

                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                  <p class="text-center small">Enter your personal details to create account</p>
                </div>

                <form class="row g-3 needs-validation" novalidate id="regForm">
                  <div class="col-12">
                    <label for="yourName" class="form-label">Your Name</label>
                    <input type="text" name="name" class="form-control" id="yourName" required>
                    <div class="invalid-feedback">Please, enter your name!</div>
                  </div>

                  <div class="col-12">
                    <label for="yourEmail" class="form-label">Your Email</label>
                    <input type="email" name="email" class="form-control" id="yourEmail" required>
                    <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                  </div>

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">Username</label>
                    <div class="input-group has-validation">
                      <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" name="username" class="form-control" id="yourUsername" required>
                      <div class="invalid-feedback">Please choose a username.</div>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="yourPassword" required>
                    <div class="invalid-feedback">Please enter your password!</div>
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                      <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                      <div class="invalid-feedback">You must agree before submitting.</div>
                    </div>
                  </div>
                  <span id="myspan"></span>
                  <br/>
                  <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">Already have an account? <a href="login.php">Log in</a></p>
                  </div>
                </form>

              </div>
            </div>

          </div>
        </div>
      </div>

    </section>

  </div>
</main><!-- End #main -->
<?php include("footer.php"); ?>
<script>
  document.getElementById("regForm").addEventListener("submit", function(event) {
    event.preventDefault();
    var t1 = document.getElementById("yourName").value;
    var t2 = document.getElementById("yourEmail").value;
    var t3 = document.getElementById("yourUsername").value;
    var t4 = document.getElementById("yourPassword").value;
    var rememberChecked = document.getElementById("acceptTerms").checked;
    if (t1.length === 0 || t2.length === 0 || t3.length === 0 || t4.length === 0) {
      document.getElementById("myspan").innerHTML = "Please fill in all fields.";
      return;
    } else if (!rememberChecked) {
      document.getElementById("myspan").innerHTML = "Please check 'accept terms'";
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var response = this.responseText;
          if (response.trim() === "success") {
            document.getElementById("myspan").innerHTML = "Registration successful!";
            document.getElementById("yourName").value == "";
            document.getElementById("yourEmail").value == "";
            document.getElementById("yourUsername").value == "";
            document.getElementById("yourPassword").value == "";
            window.location.href = "index.php";
          } else {
            document.getElementById("myspan").innerHTML = "Registration failed. Please try again.";
          }
        }
      };

      xmlhttp.open("GET", "./ajaxPHP/registerdb.php?nm=" + t1 + "&em=" + t2 + "&un=" + t3 + "&ps=" + t4, true);
      xmlhttp.send();
    }
  });
</script>