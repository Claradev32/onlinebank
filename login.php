<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />

    <link rel="manifest" href="site.webmanifest" />
    <link rel="apple-touch-icon" href="icon.png" />
    <!-- Place favicon.ico in the root directory -->

    <!-- Material Icon -->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <!-- Fontawesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <!-- Bootstrap -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="css/normalize.css" />
    <link rel="stylesheet" href="css/nice-select.css" />
    <link rel="stylesheet" href="css/main.css" />
    <meta name="theme-color" content="#fafafa" />
  </head>

  <body>
    <header class="header">
      <div class="container">
        <nav class="navbar navbar-expand-lg">
          <a class="navbar-brand logo" href="index.php"><img src="/img/icon.png" alt=""> FiroFx</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Get in touch</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.php">Create account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mainBtn btn ml-4 px-4" href="login.php">Login</a>
              </li>
            </ul>
        </nav>
      </div>
    </header>
    <main>
      <div class="registerContainer">
        <div class="form">
          <h3 class="title">
            <i class="fas fa-building"></i> Sign in
          </h3>
          <hr />
          <form class="needs-validation" novalidate>
            <div class="alert alert-danger d-none">Invalid username or password</div>
          <div class="form-group">
              <label for="email">Email</label>
              <input
                type="email"
                class="form-control"
                id="email"
                placeholder="Email address"
                required
                name="email"
              />
              <div class="invalid-feedback">Please enter email</div>
            </div>
            <div class="form-group">
              <label for="password">Password *</label>
              <input
                type="password"
                class="form-control"
                id="password"
                name="password"
                placeholder="Enter Password"
                required
              />
              <div class="invalid-feedback">Please enter password</div>
            </div>

            <p>Don't have an account? <a href="register.php">Create account</a></p>

            <button type="submit" class="btn formBtn">Sign in</button>
          </form>
        </div>
        <div class="formCard">
          <h1 class="logo"><img src="/img/icon.png" alt="" /> FiBank</h1>

          <div class="note">
            <p>
              We seek your understanding and cooperation in furnishing the
              documents required for account opening and value your time and
              effort in doing so. We request you to provide suitable
              documentation as indicated below which is required by the Bank
              under local laws and regulations and also to comply with KYC
              guidelines and policy as part of the global effort to combat money
              laundering, terrorist financing and fraudulent activity.
            </p>
          </div>
        </div>
      </div>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/vendor/jquery.nice-select.js"></script>

    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      ;(function () {
        'use strict'
        window.addEventListener(
          'load',
          function () {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation')
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(
              forms,
              function (form) {
                form.addEventListener(
                  'submit',
                  function (event) {
                    event.preventDefault()
                    event.stopPropagation()
                    if (form.checkValidity() === false) {
                      form.classList.add('was-validated')
                    }else{
                      $.ajax({
                          type: "POST",
                          data:{
                              email:forms[0]['email'].value,
                              password: forms[0]['password'].value,
                              route:"cust_login"
                          },
                          url: "API/ajax.php",
                        })
                          .done(function(res) {
                             console.log(res)
                              if (res == 'found') {
                                  window.location.href = "./dashboard.php";
                                        // start_loader($('.lds-ellipsis'), $('#loginBtn'))
                                        // setTimeout(() => {
                                        //     window.location.href = "../dashboard";
                                        // }, 2000);
                                    } else {
                                        $(".alert").removeClass("d-none");
                              }
                        });
                    }
                    
                  },
                  false
                )
              }
            )
          },
          false
        )
      })()
    </script>
  </body>
</html>