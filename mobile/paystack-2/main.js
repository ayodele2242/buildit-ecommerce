$(document).ready(function() {
$("#register").click(function(e){
    e.preventDefault();


        // grab the form fields
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let phone = document.getElementById('phone').value;
        let amount = document.getElementById('amount').value * 100;

        let postData = JSON.stringify({
            name: name,
            email: email,
            phone: phone,
            amount: amount
        })

        $.ajax({
            method: 'post',
            url: 'paynow.php',
            data: postData,
            success: function (response) {
                console.log(response);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log("There was an error verifying "+reference, xhr.responseText);
                reportErrorToBackend(xhr.responseText);
                $("#verify-error").html(xhr.responseText);
            }
        });



    });
});