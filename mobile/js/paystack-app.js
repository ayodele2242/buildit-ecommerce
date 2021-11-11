// You will need to make many changes here
// for production

// Do Note that reportErrorToBackend and verifyTransactionOnBackend
// are called in main.js
// Be careful changing their name or the data they accept 

$("#checkout-form").submit(function(e){
    e.preventDefault();

    var email = $('#cust_email').val();
    var amount = $('#mtotal').val();
    var mybonus = $('#mybonus').val();
    var items_bought = $('#items_bought').val();
     var trx_id = $('#trx_id').val();
    // then we initialize the transaction on the backend
    startTransactionOnBackend(email, amount, mybonus, items_bought, trx_id);

    // clean up
    $("#checkout-form").hide();
    $("#checkout-error").html('');
    $("#processing").show();
    $('#email').val('');
    $('#amount').val('');
});

function reportErrorToBackend(error){
    // we are reporting only the error here. in real life
    // you will want to collect a little more information
    $.ajax({
        type: "POST",
        url: 'report',
        data: {error: error}
    });
}

function verifyTransactionOnBackend(reference){
    $.ajax({
        type: "GET",
        url: 'verify/' + reference,
        success: function (gateway_response) {
            $("#success-gateway-response").html(gateway_response);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log("There was an error verifying "+reference, xhr.responseText);
            reportErrorToBackend(xhr.responseText);
            $("#verify-error").html(xhr.responseText);
        }
    });
}

function startTransactionOnBackend(email, amount){
    $.ajax({
        type: "POST",
        url: 'new-access-code',
        data: {email, amount, mybonus, items_bought, trx_id},
        success: function (access_code) {
            startPaystack(access_code);
        },
        error: function (xhr, ajaxOptions, thrownError) {
            console.log("There was an error getting an accesscode", xhr.responseText);
            reportErrorToBackend(xhr.responseText);

            // clean up
            $("#processing").hide();
            $("#checkout-form").show();
            $("#checkout-error").html(xhr.responseText);
        }
    });
}