<?php include("includes/header.php"); ?>
    <main>
      <section class="mainSection container profileForm">
        <div class="row">
          <div class="col-md-4">
            <div class="profileContainer">
              <h4 class="title"><i class="fas fa-user-tie"></i> My Profile</h4>
              <div class="image">
                <img src="./uploads/<?php echo $row0['passport'] ?>" alt="">
                <h4 class="name">John markry</h4>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="editForm">
              
              <form class="mt-4">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="firstname">Firstname</label>
                    <input type="text" class="form-control" id="firstname" placeholder="First Name" disabled value="<?php echo $row0["first_name"]?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="last Name" placeholder="Last name" disabled value="<?php echo $row0["last_name"]?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" disabled value="<?php echo $row0["email"]?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="phone" class="form-control" id="phone" placeholder="Phone" disabled value="<?php echo $row0["phone"]?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="accountnumber">Account Number</label>
                    <input type="text" class="form-control" id="accountnumber" placeholder="Account number" disabled value="<?php echo $row0["account_no"]?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="transferpin">Transfer Pin</label>
                    <input type="text" class="form-control" id="ransferpin" placeholder="Transfer Pin" disabled value="<?php echo $row0["pin"]?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Address</label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St" disabled value="<?php echo $row0["address"]?>">
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
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
  </body>
</html>
