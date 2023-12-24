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
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate id="loginForm">

                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="username" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <span style="color: red;" id="myspan"></span>
                        <br />
                    <div class="col-12">
                         <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="register.php">Create an account</a></p>
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
   document.getElementById("loginForm").addEventListener("submit", function(event) {
        event.preventDefault();
        var t1 = document.getElementById("username").value;
        var t2 = document.getElementById("password").value;
        var rememberChecked = document.getElementById("rememberMe").checked;
        // t3 = document.getElementById("rememberMe").value;
        // if (t3.v == 0 ) {
        //     document.getElementById("myspan").innerHTML = "*Please enter each field";
        //     return;
        // } 
        if (t1.length === 0 || t2.length === 0) {
            document.getElementById("myspan").innerHTML = "*Please enter each field";
            return;
        } else if (!rememberChecked) {
            document.getElementById("myspan").innerHTML = "*Please check 'Remember me'";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                    var response = this.responseText;
                    if (response.trim() === "success") {
                        window.location.href = "index.php"; 
                    } else {
                        document.getElementById("myspan").innerHTML = "Invalid credentials. Please try again.";
                    }
                }
            };

            xmlhttp.open("GET", "./ajaxPHP/logindb.php?un=" + t1 + "&ps=" + t2, true);
            xmlhttp.send();
        }
      });
</script>