<?php include("includes/header.php"); ?>  
    <main>
      <section class="mainSection container">
        <div class="historyContainer">
          <div class="transfer-history table-responsive">
            <h4 class="title"><i class="fas fa-clipboard-list"></i> Account Statement</h4>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Type</th>
                  <th scope="col">Date</th>
                  <th scope="col">Fullname</th>
                  <th scope="col">Description</th>
                  <th scope="col">Amount</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                function userDetails($conn,$user){
                  $sql11 = "SELECT * FROM customer WHERE account_no=".$user;
                  $result11 = $conn->conn->query($sql11);
                  $row11 = $result11->fetch_assoc();
                  return $row11;
                }
                ?>
                <?php while($row2 = $result2->fetch_assoc()) {?>
                  <?php 
                 
                  
                  ?>
                  <?php 
                  if($row2['user_to'] == $row0['account_no']) {
                    userDetails($conn,$row2['user_from']);
                  ?>
                  <tr class="credit">
                    <th scope="row" class="c-type">credit</th>
                    <td><?php echo $row2['trans_date'] ?></td>
                    <td><?php echo userDetails($conn,$row2['user_from'])['first_name'].' '.userDetails($conn,$row2['user_from'])['last_name']; ?></td>
                    <td>Transfer From <?php echo userDetails($conn,$row2['user_from'])['first_name'].' '.userDetails($conn,$row2['user_from'])['last_name']; ?></td>
                    <td class="amount">$<?php echo $row2['amount'] ?></td>
                  </tr>
                  <?php }else{ 
                   
                  ?>
                  <tr class="debit">
                    <th scope="row" class="d-type">debit</th>
                    <td><?php echo $row2['trans_date'] ?></td>
                    <td><?php echo userDetails($conn,$row2['user_to'])['first_name'].' '.userDetails($conn,$row2['user_to'])['last_name']; ?></td>
                    <td>Transfer From <?php echo userDetails($conn,$row2['user_from'])['first_name'].' '.userDetails($conn,$row2['user_from'])['last_name']; ?></td>
                    <td class="amount">$<?php echo $row2['amount'] ?></td>
                  </tr>
                 <?php }?>
                <?php } ?>
                
              </tbody>
            </table>
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
