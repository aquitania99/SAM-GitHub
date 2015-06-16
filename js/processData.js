$(document).ready(function() {

    // process the form
    $('form').submit(function(event) {
        // get the form data
        event.preventDefault();
        var formData = $( this ).serialize();
        console.log( 'Data from the Form... '+ formData );
        // process the form
        $.ajax({
            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
            url         : 'library/processForm.php', // the url where we want to POST
            data        : formData, // our data object
            dataType    : 'json', // what type of data do we expect back from the server
            encode      : true
        })
    // using the done promise callback
        .done(function(data) {

            // log data to the console so we can see
            console.log('Data from the DB... '+data); 
            var redirect = data['location'];
            if (redirect !== '')
            {
                window.location=data['location'];
            }
            else
            {
                $( "#alert" ).removeClass( "hidden" );
            }    
            // here we will handle errors and validation messages
        });
        // stop the form from submitting the normal way and refreshing the page
        event.preventDefault();
    });
});
function reset()
{
    document.getElementById("loginForm").reset();
}