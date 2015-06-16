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

function getUsers(action)
        {
                var userData = {'adminAction': action};
                console.log( 'Data from the Link... '+ userData );
                // process the form
                $.ajax({
                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url         : 'library/processForm.php', // the url where we want to POST
                    data        : userData, // our data object
                    dataType    : 'json', // what type of data do we expect back from the server
                    encode      : true
                })
            // using the done promise callback
                .done(function(data) {

                    // log data to the console so we can see
                    console.log('Data from the DB... '+ data); 
//                    var redirect = data['location'];
                    if (data !== '')
                    {
//                        document.cookie = 'myCompany = ' + data;
                        //window.location='list';
                        $('#results').removeClass("hidden");
                        $('#results').append("<tr><td>"+data['usr_firstName']+" "+
                                data['usr_lastName']+"</td><td>"+data['usr_email']+
                                "</td><td>"+data['usr_comments']+"</td><td>"+
                                data['usr_newsLetter']+"</td><td>"+data['usr_date_added']+"</td></tr>");
                        
                    }
                    else
                    {
                        $( "#alert" ).removeClass( "hidden" );
                    }    
                    // here we will handle errors and validation messages
                });
                // stop the form from submitting the normal way and refreshing the page
                event.preventDefault();
        //    });
        }