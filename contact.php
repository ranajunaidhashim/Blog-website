<?php include("header.php") ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="page-heading">
                    <h1>Contact Me</h1>
                    <span class="subheading">Have questions? I have answers.</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<main class="mb-4 ">
    <!-- <div class="col-xl-6"> -->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
                    <div class="my-5">
                        <!-- <form > -->
                        <div class="form-floating">
                            <input class="form-control" id="name" type="text" placeholder="Enter your name..." required />
                            <label for="name">Name</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="email" type="email" placeholder="Enter your email..." required />
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating">
                            <input class="form-control" id="phone" type="tel" placeholder="Enter your phone number..." required />
                            <label for="phone">Phone Number</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" id="message" placeholder="Enter your message here..." style="height: 12rem" required></textarea>
                            <label for="message">Message</label>
                        </div>
                        <span style="color: red;" id="myspan"></span>
                        <br />
                        <!-- Submit Button-->
                        <button onclick="myfunc()" class="btn btn-primary text-uppercase rounded " type="submit" value="send">Send <i class="fa-solid fa-paper-plane"></i></button>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>

</main>
<?php include("footer.php") ?>

<script>
    function myfunc() {
        t1 = document.getElementById("name").value;
        t2 = document.getElementById("email").value;
        t3 = document.getElementById("phone").value;
        t4 = document.getElementById("message").value;

        if (t1.length == 0 || t2.length == 0 || t3.length == 0 || t4.length == 0) {
            document.getElementById("myspan").innerHTML = "*Please enter each field";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200)
                    document.getElementById("myspan").innerHTML = this.responseText;
                // Clear the input fields after successful submission
                document.getElementById("name").value = "";
                document.getElementById("email").value = "";
                document.getElementById("phone").value = "";
                document.getElementById("message").value = "";
            };

            xmlhttp.open("GET", "ajaxdb.php?nm=" + t1 + "&em=" + t2 + "&ph=" + t3 + "&msg=" + t4, true);
            xmlhttp.send();
        }
    }
</script>