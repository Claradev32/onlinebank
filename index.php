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
          <a class="navbar-brand logo" href="index.html"><img src="/img/icon.png" alt=""> FiroFx</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fas fa-bars"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#services">Our Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#features">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Get in touch</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.html">Create account</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mainBtn px-4 btn ml-4" href="login.php">Login</a>
              </li>
            </ul>
        </nav>
      </div>
    </header>
    
    <section class="hero">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="./img/slide.jpg" class="d-block w-100" alt="...">
              <div class="content">
                <div class="container">
                  <h1 class="title">Open a mobile money account today with MaxtelFx Bank </h1>
                  <p>Get your FiroFx Bank account to start spending, sending and saving in minutes</p>
                  <a href="register.php" class="mainBtn btn">Create Account</a>
                </div>
              </div>
          </div>
          <div class="carousel-item">
            <img src="./img/card.jpg" class="d-block w-100" alt="...">
            <div class="content">
              <div class="container">
                <h1 class="title">Open a mobile money account today with MaxtelFx Bank </h1>
                <p>Get your FiroFx Bank account to start spending, sending and saving in minutes</p>
                <a href="register.php" class="mainBtn btn">Create Account</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="works">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <i class="fas fa-user-tie"></i>
              <h4 class="card-title">Create Account</h4>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <i class="fas fa-random"></i>
              <h4 class="card-title">Send $ Receive Money </h4>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <i class="fas fa-lock"></i>
              <h4 class="card-title">Secure & encrypted</h4>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="about-section" id="about">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="container aboutimg">
              <img src="./img/pexels-pixabay-290275-min.jpg" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="container">
              <h3 class="title">About FiroFx Bank</h3>
              <p>Our story starts when our Founder and CEO moved to the UK.
                The first thing on his to-do list was to open a bank account, so that he could receive his salary, rent a place to stay, set up his utility bills and manage his day-to-day spendings.</p>
              <p>
                The task was anything but simple.To open a bank account he needed proof of his address, local credit history,utility bills and countless other documents – but he couldn’t get any of these without having a bank account.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="service-section" id="services">
      <div class="container">
        <h2 class="title">Our Services Worldwide</h4>
          <p class="text-center">Help agencies to define their new business objectives and then create professional software.</p>

          <div class="cards">
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <i class="fas fa-money-bill-alt"></i>
                  <h5 class="card-title">Money Transfer</h5>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <i class="fas fa-building"></i>
                  <h5 class="card-title">Bank Deposit </h5>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <i class="fas fa-funnel-dollar"></i>
                  <h5 class="card-title">Online Payment</h5>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>

    <section class="choose-section" id="features">
      <div class="container">
        <h2 class="title">Why choose us</h4>
          <p class="text-center">Help agencies to define their new business objectives and then create professional software.</p>

          <div class="cards">
            <div class="row">
              <div class="col-md-4">
                <div class="card">
                  <i class="fas fa-money-bill-alt"></i>
                  <h5 class="card-title">Fraud Detection</h5>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <i class="fas fa-building"></i>
                  <h5 class="card-title">Support Manager </h5>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card">
                  <i class="fas fa-funnel-dollar"></i>
                  <h5 class="card-title">Account Updater</h5>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>

    <section class="about-section" >
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="container aboutimg">
              <img src="./img/overview.jpg" alt="">
            </div>
          </div>
          <div class="col-md-6">
            <div class="container">
              <h2 class="title">Security is at the heart of what we do</h2>
              <p>The safety of your account, money and data is our number one priority</p>
              <div class="mt-4">
                <a href="register.php" class="mainBtn">Create Account</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="service-section" id="contact">
      <div class="container">
        <h2 class="title">Get in touch with us</h4>
          <p class="text-center mb-4">Our friendly Customer Support team is Standing by.</p>
        <div class="row">
          <div class="col-md-6">
            <div class="container">
              <div class="helpForm contactForm">
                <h4 class="title"><i class="fas fa-envelope mr-2"></i> Contact Support</h4>
                <form action="">
                  <div class="form-group">
                    <label for="firstname">Fullname</label>
                    <input type="text" class="form-control" id="fullname" placeholder="Full Name">
                  </div>
                  <div class="form-group">
                    <label for="firstname">Subject</label>
                    <input type="text" class="form-control" id="firstname" placeholder="Subject">
                  </div>
                  <div class="form-group">
                    <label for="firstname">Subject</label>
                    <textarea name="" id="" placeholder="Message"></textarea>
                  </div>
      
                  <button type="submit" class="formBtn btn">Send Message</button>
                </form>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="container aboutimg">
              <img src="./img/ab1.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer>
      <div class="container">
        <p>Copyright &copy; 2021 FiroFx Bank - All Rights Reserved.</p>
      </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/vendor/jquery.nice-select.js"></script>
  </body>
</html>