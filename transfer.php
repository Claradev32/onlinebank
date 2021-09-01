<?php include("includes/header.php"); ?>
<main>
      <section class="mainSection container">
        <div class="helpForm transfer">
          <h4 class="title"><i class="fas fa-random mr-2"></i> Transfer fund</h4>
          <hr>
          <form class="needs-validation" novalidate>
          <div class="alert alert-danger d-none" role="alert" id="alert">
            Please confirm your details
          </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="bankname">Bank Name</label>
                <input type="text" class="form-control"  id="bankname" placeholder="Bank Name" required>
                <div class="invalid-feedback">
                  Please enter bank name
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="accountname">Account Name</label>
                <input type="text" class="form-control" id="accountname" placeholder="Account Name" required>
                <div class="invalid-feedback">
                  Please enter account name
                </div>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-md-6">
                <label for="accountnumber">Account Number</label>
                <input type="text" class="form-control" id="accountnumber" placeholder="Account Number" required>
                <div class="invalid-feedback">
                  Please enter account number
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" placeholder="Amount" required>
                <div class="invalid-feedback">
                  Please enter amount
                </div>
              </div>
            </div>
    
            <button type="submit" class="formBtn btn">Send</button>
          </form>
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

    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');
          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              event.preventDefault();
              event.stopPropagation();
              if (form.checkValidity() === false) {
                form.classList.add('was-validated');
              }else{
                $.ajax({
                  type: "POST",
                  data:{
                      bank :forms[0]['bankname'].value,
                      account_name: forms[0]['accountname'].value,
                      account_number:forms[0]['accountnumber'].value,
                      amount : forms[0]['amount'].value,
                      route:"pending"
                  },
                  url: "API/ajax.php",
                })
                  .done(function(res) {
                    console.log(res)
                      if (res == 'insufficient') {
                        $("#alert").removeClass("d-none")
                        $("#alert").text("Insufficient Fund")
                      }else if(res === 'failed"'){
                        $("#alert").removeClass("d-none")
                        $("#alert").text("Something went wrong")
                      } else {
                        window.location.href = "./review.php?id=" + res;
                      }
                });
              }
            
            }, false);
          });
        }, false);
      })();
      </script>
  </body>
</html>
