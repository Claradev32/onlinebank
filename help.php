   
<?php include("includes/header.php"); ?> 
   <main>
      <section class="mainSection container">
        <div class="helpForm">
          <div class="alert alert-success d-none" role="alert" id="alert">
            Message sent!
          </div>
          <h4 class="title"><i class="fas fa-envelope mr-2"></i> Contact Support</h4>
          <form action="" id="contactForm">
            <div class="form-group">
              <label for="firstname">Fullname</label>
              <input type="text" class="form-control" id="fullname" placeholder="Full Name">
            </div>
            <div class="form-group">
              <label for="firstname">Subject</label>
              <input type="text" class="form-control" id="subject" placeholder="Subject">
            </div>
            <div class="form-group">
              <label for="firstname">Message</label>
              <textarea name="" id="message" placeholder="Message"></textarea>
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
  </body>
</html>
<script>
  const forms = document.getElementById("contactForm");
  forms.addEventListener("submit", function(e){
    e.preventDefault();
    $.ajax({
    type: "POST",
    data:{
        name:forms[0].value,
        subject: forms[1].value,
        message: forms[2].value,
        route:"help"
    },
    url: "API/ajax.php",
  }).done(function(res) {
        forms.reset()
        if (res == 'success') {
           $("#alert").removeClass("d-none alert-danger");
           $("#alert").text("Message Sent, we will get back to you!");
        }else{
          $("#alert").removeClass("d-none alert-success");
          $("#alert").text("Something went wrong!");
        }
  });
  })


</script>