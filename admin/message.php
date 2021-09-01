<?php require "./includes/header.php" ?>
    <main>

      <section class="mainSectio container">
        <div class="inboxContainer">
          <div class="row">
            <div class="col-md-4">
              <ul class="list">
                <?php while($rows = $resultm->fetch_assoc()){ ?>
                <li>
                  <p class="title"><?php echo $rows['subject'] ?></p>
                  <a href="#" class="btn-read" onclick="getMail(<?php echo $rows['id'] ?>)">Open Message</a>
                </li>
                <?php } ?>
                
              </ul>
            </div>
            <div class="col-md-8">
              <div class="messageCard">
                <div class="head">
                  <div>
                    <h6 id="fullname"></h6>
                    <h4 id="title"></h4>
                  </div>
                  <div>
                    <small id="date"></small><br>
                    <small id="email"></small>
                  </div>
                </div>

                <div class="messageBody" >
                  <p id="msg"></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="../js/plugins.js"></script>
    <script src="../js/main.js"></script>
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
    <script src="js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="js/vendor/jquery.nice-select.js"></script>
    <script src="../js/app.js" defer></script>
  </body>
</html>
