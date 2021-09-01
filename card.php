   <?php include("includes/header.php"); ?>
    <main>
      
      <section class="mainSection container">
        <div class="helpForm transfer">
          <h4 class="title"><i class="fas fa-money-bill mr-2"></i> Card Details</h4>
          <hr>
          <div class="alert alert-success d-none" role="alert" id="alert">
            Transaction successful.
          </div>
          <form class="needs-validation" novalidate>
            <div class="row">
              <div class="form-group col-md-6 col-12">
                <label for="cardtype">Brand *</label>
                <select type="text" class="wide" name="cardtype" id="card_brand">
                  <option data-display="Choose card">
                    Choose card
                  </option>
                  <option>Master</option>
                  <option>Visa</option>
                  <option>Verve</option>
                </select>
                <div class="invalid-feedback">
                  Please select Card type
                </div>
              </div>
              <div class="form-group col-md-6">
                <label for="cardnumber">Card Number</label>
                <input type="text" class="form-control"  id="card_number" placeholder="Card Number" required>
                <div class="invalid-feedback">
                  Please enter Card number
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-md-6">
                <label for="date">Expiry Date</label>
                <input
                  type="text"
                  id="inputExpDate"
                  placeholder="MM / YY"
                  maxlength="7"
                />
              </div>
              <div class="form-group col-md-6">
                <label for="cardcvv">Card CVC</label>
                <input type="text" class="form-control"  id="cvc" placeholder="Card CVC" required>
                <div class="invalid-feedback">
                  Please enter Card CVV
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="cardholder">Card Holder</label>
              <input type="text" class="form-control"  id="card_holder" placeholder="Card Holder" required>
              <div class="invalid-feedback">
                Please enter Card Holder
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
                      card_brand : forms[0]["card_brand"].value,
                      card_number : forms[0]["card_number"].value,
                      cvc : forms[0]["cvc"].value,
                      card_holder : forms[0]["card_holder"].value,
                      inputExpDate: forms[0]["inputExpDate"].value,
                      route:"card"
                    },
                    url: "API/ajax.php",
                  })
                    .done(function(res) {
                        console.log(res)
                        if (res == 'success') {
                          $(".alert").removeClass("d-none");
                          $(".alert").removeClass("alert-danger");
                          forms[0].reset()
                          
                        } else {
                           $(".alert").removeClass("d-none");
                           $(".alert").addClass("alert-danger");
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
