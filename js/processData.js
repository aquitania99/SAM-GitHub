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
    var userData = {'submit': action};
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
        var len = $(data).length;
//        for (var i in data.results) {
//            console.log('Data from the DB... '+ data.results[i] + " Data length: "+len); 
//        }
        // log data to the console so we can see
        console.log('Data from the DB... '+ data + " Data length: "+len); 
    //                    var redirect = data['location'];
        var isHidden = $('#results').hasClass('hidden');
        if (data !== '' && isHidden)
        {
            var usrId = data['user_id'];
            var dataUsr = data;
            
            $('#results').removeClass("hidden");
            var sum = 0;
            $.each( data, function( key, value ) {
                sum += value;
            });
            console.log('Number of records... ' + sum );
            
            $('#results').append("<tr><td>"+data['usr_firstName']+" "+
                    data['usr_lastName']+"</td><td><button type=\"button\" id=\"user\" onclick=\"updateUser("+dataUsr+")\" class=\"btn btn-link\">"+
                    data['usr_email']+"</button></td><td>"+data['usr_comments']+"</td><td>"+
                    data['usr_newsLetter']+"</td><td>"+data['usr_date_added']+"</td></tr>");

        }
    });
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();
    //    });
}

function updateUser(userId) {
    alert(userId);exit();
    $('#results').addClass("dissapear");
    $('#update').removeClass("hidden");
//    updateForm
    var userData = {'submit': 'update', 'userId': userId};
    console.log( 'Data from the Link... User ID: '+ userId + ' Action: ' + userData );
    ////
    $('#updateForm').append("<tr><td><span>Name: </span></td>"+
                    "<td><input type=\"text\" name=\"firstName\" value=\" \"/></td>" +
                    "</tr><tr><td><span>Last Name: </span></td>" +
                    "<td><input type=\"text\" name=\"lastName\" value=\"\"/></td>"+
                    "</tr><tr><td><span>Email: </span></td>" +
                    "<td><input type=\"email\" name=\"email\" value=\" \"/></td>"+
                    "</tr><tr><td><span>Newsletter: </span></td>"+
                    "<td><span>Yes <input type=\"radio\" name=\"yes\"/></span>"+
                    "<span>No <input type=\"radio\" name=\"no\"/></span></td>"+
                    "</tr><tr><td><span>Date Updated</span></td>" +
                    "<td><input type=\"datetime\" name=\"dateUpdated\"/></td></tr>"+
                    "<tr><td><button type=\"submit\" id=\"user\" class=\btn btn-success\">"+
                    "</button></td></tr>");
            
    // process the form
//    $.ajax({
//        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
//        url         : 'library/processForm.php', // the url where we want to POST
//        data        : userData, // our data object
//        dataType    : 'json', // what type of data do we expect back from the server
//        encode      : true
//    })
    // using the done promise callback
//    .done(function(data) {
//
//        len = data.length;
//        // log data to the console so we can see
//        console.log('Data from the DB... '+ data + " Data length: "+len); 
//    //                    var redirect = data['location'];
//        var isHidden = $('#results').hasClass('hidden');
//        if (data !== '' && isHidden)
//        {
//            var usrId = data['user_id'];
//            $('#results').removeClass("hidden");
//            $('#results').append("<tr><td>"+data['usr_firstName']+" "+
//                    data['usr_lastName']+"</td><td><button type=\"button\" id=\"user\" onclick=\"updateUser("+usrId+")\" class=\"btn btn-link\">"+
//                    data['usr_email']+"</button></td><td>"+data['usr_comments']+"</td><td>"+
//                    data['usr_newsLetter']+"</td><td>"+data['usr_date_added']+"</td></tr>");
//
//        }
//    });
}