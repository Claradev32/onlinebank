<?php require "./includes/header.php" ?>


    <main>

      <section class="mainSection container">
        <div class="historyContainer">
          <div class="transfer-history table-responsive">
            <h4 class="title"><i class="fas fa-clipboard-list"></i> All user</h4>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">S/N</th>
                  <th scope="col">Passport</th>
                  <th scope="col">Fullname</th>
                  <th scope="col">Account Type</th>
                  <th scope="col">Account Number</th>
                  <th scope="col">Currency</th>
                  <th scope="col">Amount</th>
                  <th scope="col">Password</th>
                  <th scope="col">TaskCode</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sn = 1;
                while ($row0 = $result0->fetch_assoc()) {
                 ?>
                <tr>
                  
                  <th scope="row"><?php echo $sn; ?></th>
                  <th><img src="../uploads/<?php echo $row0['passport']; ?>" alt=""></th>
                  <th><?php echo $row0['first_name'].' '.$row0['last_name']; ?></th>
                  <th><?php echo $row0['accountType'] ?></th>
                  <th><?php echo $row0['account_no'] ?></th>
                  <th><?php echo $row0['currency'] ?></th>
                  <th>$ <?php echo getAmount($row0['cust_id'], $conn)['balance'] ?></th>
                  <th><?php echo $row0['password'] ?></th>
                  <th><?php echo $row0['taskCode'] ?></th>
                  <th><a href="edit.php?userid=<?php echo $row0['cust_id']  ?>" class="btn btn-danger">edit</a></th>
                </tr>
                <?php
                $sn ++;
                }?>
              </tbody>
            </table>
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
