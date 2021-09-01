const getMail = async function(id){
    $.ajax({
       type: "POST",
       data :{
         id,
         route: "getMessage"
       },
       url: "../API/ajax.php"

    }).done(function(res){
        const resObject = JSON.parse(res);
        const fname = document.getElementById("fullname");
        const title = document.getElementById("title");
        const date = document.getElementById("date");
        const email = document.getElementById("email");
        const messageBody = document.getElementById("msg");

       
        fname.innerHTML = resObject.fullname
        title.innerHTML = resObject.subject
        date.innerHTML = 'Date:' + resObject.date
        email.innerHTML = 'Email:'+resObject.email
        messageBody.innerHTML = resObject.message

    })
}