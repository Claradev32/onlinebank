<?php include("includes/header.php"); ?> 
    <main> 
      <section class="mainSection container">
        
        <div class="row">
          <div class="col-lg-3 col-md-12 order-first">
            <div class="info">
              <div class="message">
                <div class="icon">
                  <i class="fas fa-envelope"></i>
                  <i class="badg bg-danger">0</i>
                </div>
                <h4>You have two new message</h4>
              </div>
              <a href="message.html" class="mess-btn">View inbox</a>
            </div>

            <div class="total">
              <h4>Currency Live Chart</h4>
              <div class="containe">
               <!-- TradingView Widget BEGIN -->
              <div class="tradingview-widget-container">
                <div class="tradingview-widget-container__widget"></div>
                <div class="tradingview-widget-copyright"><a href="https://in.tradingview.com/symbols/EURUSD/?exchange=FX" rel="noopener" target="_blank"><span class="blue-text">EURUSD Rates</span></a> by TradingView</div>
                <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
                {
                "symbol": "FX:EURUSD",
                "width": "100%",
                "height": "100%",
                "locale": "in",
                "dateRange": "12M",
                "colorTheme": "light",
                "trendLineColor": "rgba(41, 98, 255, 1)",
                "underLineColor": "rgba(41, 98, 255, 0.3)",
                "underLineBottomColor": "rgba(41, 98, 255, 0)",
                "isTransparent": false,
                "autosize": false,
                "largeChartUrl": ""
              }
                </script>
              </div>
              <!-- TradingView Widget END -->
              
              </div>
            </div>
          </div>
          <div class="col-lg-9 col-12 order-last">
            
            <div class="dashboard">
              <div class="buttons">
                <a href="transfer.php" class="button mr-4">Make a quick transfer <i class="fas fa-angle-down ml-4"></i></a>
                <a href="transfer.php" class="button">Pay an existing recipient <i class="fas fa-angle-down ml-4"></i></a>
              </div>
            </div>
            <div class="account">
              <div class="acc-info">
                <section class="py-2">
                  <h5>Premier account <sup><?php echo $row0['account_no'] ?></sup></h5> 
                  <h2><i class="fas fa-pound-sign"></i><?php echo  number_format($row1['balance'], 2, '.', '') ?> <sup>Balance</sup></h2>
                </section>
                <hr>
              </div>
              <div class="acc-btns">
                <a href="history.php" class="acc-button">View Statement <i class="fas fa-angle-right ml-4"></i></a>
                <a href="transfer.php" class="acc-button">Make a payment <i class="fas fa-angle-right ml-4"></i></a>
                <a href="transfer.php" class="acc-button">Make a transfer <i class="fas fa-angle-right ml-4"></i></a>
                <!-- <a href="#" class="acc-button active-btn">More actions <i class="fas fa-angle-right ml-4"></i></a> -->
              </div>
            </div>

            <div class="transfer-history table-responsive">
              <h4 class="title"><i class="fas fa-clipboard-list"></i> Transactions history</h4>
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
                function userDetails($conn, $user)
                {
                    $sql11 = "SELECT * FROM customer WHERE account_no=".$user;
                    $result11 = $conn->conn->query($sql11);
                    $row11 = $result11->fetch_assoc();
                    return $row11;
                }
                ?>
                <?php while ($row2 = $result2->fetch_assoc()) {?>
                  <?php
                 
                  
                  ?>
                  <?php
                  if ($row2['user_to'] == $row0['account_no']) {
                      userDetails($conn, $row2['user_from']); ?>
                  <tr class="credit">
                    <th scope="row" class="c-type">credit</th>
                    <td><?php echo $row2['trans_date'] ?></td>
                    <td><?php echo userDetails($conn, $row2['user_from'])['first_name'].' '.userDetails($conn, $row2['user_from'])['last_name']; ?></td>
                    <td>Transfer From <?php echo userDetails($conn, $row2['user_from'])['first_name'].' '.userDetails($conn, $row2['user_from'])['last_name']; ?></td>
                    <td class="amount">$<?php echo $row2['amount'] ?></td>
                  </tr>
                  <?php
                  } else {
                      ?>
                  <tr class="debit">
                    <th scope="row" class="d-type">debit</th>
                    <td><?php echo $row2['trans_date'] ?></td>
                    <td><?php echo userDetails($conn, $row2['user_to'])['first_name'].' '.userDetails($conn, $row2['user_to'])['last_name']; ?></td>
                    <td>Transfer From <?php echo userDetails($conn, $row2['user_from'])['first_name'].' '.userDetails($conn, $row2['user_from'])['last_name']; ?></td>
                    <td class="amount">$<?php echo $row2['amount'] ?></td>
                  </tr>
                 <?php
                  }?>
                <?php } ?>
                
                 
                </tbody>
              </table>
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
