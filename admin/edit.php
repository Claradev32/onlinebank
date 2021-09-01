<?php require "./includes/header.php" ?>

    <main>

      <section class="mainSection container profileForm">
        <div class="row">
          <div class="col-md-4">
            <div class="profileContainer">
              <h4 class="title"><i class="fas fa-user-tie"></i> My Profile</h4>
              <div class="image">
                <img src=".././uploads/<?php echo getOneUser($_GET['userid'], $conn)['passport'] ?>" alt="">
                <h4 class="name"><?php echo getOneUser($_GET['userid'], $conn)['first_name'].' '.getOneUser($_GET['userid'], $conn)['last_name']?></h4>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="editForm">
            
              <form class="mt-4" id="editForm">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="hidden" name="id" value="<?php echo $_GET['userid'] ?>">
                    <label for="fullname">Firstname</label>
                    <input type="text" class="form-control" value="  <?php echo getOneUser($_GET['userid'], $conn)['first_name']?>" name="firstname" placeholder="Fullname Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="fullname">Lastname</label>
                    <input type="text" class="form-control" value="  <?php echo getOneUser($_GET['userid'], $conn)['last_name']?>" name="lastname" placeholder="Fullname Name">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="amount">Amount</label>
                    <input type="text" class="form-control" name="amount" placeholder="Amount" value="<?php echo getAmount($_GET['userid'], $conn)['balance'] ?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" value="<?php echo getOneUser($_GET['userid'], $conn)['email'] ?>" name="email" placeholder="Email">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="phone" class="form-control" value="<?php echo getOneUser($_GET['userid'], $conn)['phone'] ?>" name="phone" placeholder="Phone">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="accountnumber">Account Number</label>
                    <input type="text" class="form-control" name="acno" placeholder="Account number" value="<?php echo getOneUser($_GET['userid'], $conn)['account_no'] ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="taskcode">Task code</label>
                    <input type="text" class="form-control" name="taskcode" placeholder="Task Code" value="<?php echo getOneUser($_GET['userid'], $conn)['taskCode'] ?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" name="password" placeholder="Password" value="<?php echo getOneUser($_GET['userid'], $conn)['password'] ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="currencyType">Currency Type</label>
                    <input type="text" class="form-control" name="currency" placeholder="Currency Type" value="<?php echo getOneUser($_GET['userid'], $conn)['currency'] ?>">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="accounttype">Type of account</label>
                    <input type="text" class="form-control" name="accounttype" placeholder="Account Type" value="<?php echo getOneUser($_GET['userid'], $conn)['accountType'] ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="dob">Date of Birth</label>
                    <input type="text" class="form-control" name="dob" placeholder="dob" value="<?php echo getOneUser($_GET['userid'], $conn)['dob'] ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Permanent /Residential Address *</label>
                  <input type="text" class="form-control" name="address" placeholder="1234 Main St" value="<?php echo getOneUser($_GET['userid'], $conn)['address'] ?>">
                </div>
                <div class="form-group">
                  <label for="idnumber">ID Number*</label>
                  <input type="text" class="form-control" name="idnumber" placeholder="ID number" value="<?php echo getOneUser($_GET['userid'], $conn)['ID_Num'] ?>">
                </div>
                <div class="alert alert-success d-none" id="alrt"></div>
                <button type="submit" class="formBtn btn">Update</button>
              </form>
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
  </body>
</html>
<script>
  const forms = document.getElementById("editForm");
  forms.addEventListener("submit", (e)=>{
     e.preventDefault();
     const fd = new FormData(forms);
     fd.append("route","edit");
     $.ajax({
      type: "post",
      contentType: false,
      processData: false,
      data:fd,
      url: "../API/ajax.php",
      
    }).done(function(res) {
      console.log(res)
      if(res === "success"){
       $("#alrt").removeClass("d-none");
       $("#alrt").text("Account updated!")
      }
    })
  })
</script>