<?php include("includes/header.php"); ?>
<?php  
 $res = $conn->conn->query("SELECT * FROM pending_transaction where id =".$_GET['id']);
 $review = $res->fetch_assoc();

 $sendQ = $conn->conn->query("SELECT * FROM customer where account_no =".$review['user_from']);
 $sender = $sendQ->fetch_assoc();

 $recieveQ = $conn->conn->query("SELECT * FROM customer where account_no =".$review['user_to']);
 $reciever=  $recieveQ->fetch_assoc();
?>
    <main>
      <section class="mainSection container">
        <div class="helpForm transfer">
          <h4 class="title"><i class="fas fa-random mr-2"></i>Review Transfer Details</h4>
          <hr>
          <ul class="review">
            <li>
              <h4>From</h4>
              <div>
                <h4><?php echo $sender['first_name']. ' '.$sender['last_name']?></h4>
                <p><?php echo $review['user_from'] ?></p>
              </div>
            </li>
            <li>
              <h4>To</h4>
              <div>
                <h4><?php echo $reciever['first_name'].' '.$reciever['last_name'] ?></h4>
                <p><?php echo $review['user_to'] ?></p>
              </div>
            </li>
            <li>
              <h4>Bank</h4>
              <div>
                <h4><?php echo $review['bank_name'] ?></h4>
              </div>
            </li>
          </ul>
          <div class="d-flex justify-content-between">
            <button type="submit" class="formBtn btn" data-toggle="modal" data-target="#exampleModal">Transfer fund</button>
            <a onclick="goBack(<?php echo $review['id']?>)" class="btn btn-secondary">edit details</a>
            <input type="hidden" id="transId" value="<?php echo  $review['id'] ?>">
          </div>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Task Code</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="alert alert-secondary alert-dismissible fade show" role="alert">
                    Please contact support for your <b>task code</b> <a href="help.html" class="btn btn-outline-dark"><i class="fas fa-user-cog"></i> Support</a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                  <form action="" class="needs-validation" novalidate>
                    <div class="alert alert-danger alert-primary d-none" role="alert" id="alrt">
                      Invalid task code!
                    </div>
                    <div class="form-group">
                      <label for="taskcode">Task code</label>
                      <input type="password" class="form-control" id="taskcode" placeholder="Task Code" required>
                      <div class="invalid-feedback">
                        Please enter Task code or contact support <a href="help.php"> Support team</a>
                      </div>
                    </div>
            
                    <button type="submit" href="review.php" class="formBtn btn">Confirm code</button>
                  </form>
                </div>
              </div>
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
                const transId = $("#transId").val();
                const data = $('#taskcode').val();
                $.ajax({
                    type: "POST",
                    url: "API/ajax.php",
                    data: { code: data,route:"taskcode" },
              
                }).then(function(res){
                  if (res == "found") {
                        runTransaction(transId);
                   }else{
                    $("#alrt").removeClass("d-none");
                    $("#alrt").removeClass("alert-primary");
                    $("#alrt").addClass("alert-danger");
                    $("#alrt").text("Invalid task code.");
                    $('#taskcode').val('');
                   }
                })
                
                function runTransaction(id){
                    $.ajax({
                        type: "POST",
                        url: "API/ajax.php",
                        data: { id: id,route:"transact" },
                        
                    }).done(function(res){
                  
                      if (res== "transacted") {
                        $("#alrt").removeClass("d-none");
                        $("#alrt").removeClass("alert-danger");
                        $("#alrt").addClass("alert-primary");
                        $("#alrt").text("Money sent successfully.");
                        $('#taskcode').val('');
                      }else{
                        $("#alrt").removeClass("d-none");
                        $("#alrt").text("Something wenty wrong try again!");
                        console.log("something went wrong")
                      }
                    })
                }
              }
              
            }, false);
          });
        }, false);
      })();

      function goBack(id) {
        
        $.ajax({
            type: "POST",
            url: "API/ajax.php",
            data: { id: id,route:"deletePending" },
            
        }).done(function(res){
          console.log(res)
          if (res== "deleted") {
              window.history.back();
          }
        })
}
      </script>
  </body>
</html>
