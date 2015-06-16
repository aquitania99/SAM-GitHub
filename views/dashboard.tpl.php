<div class="container">
    <h2 class="form-signin-heading"><?= $title ?></h2>
    <table class="table table-condensed table-bordered col-xs-12 .col-md-8">
        <tr>
            <td>
                <a href="" onclick="getUsers(action = 'getUser')"><button class="btn btn-default">
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> View User</button>
                </a>
            </td>
            <td>
                <a href="add"><button class="btn btn-default">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> Add User</button>
                </a>
            </td>
            <td>
                <a href="update"><button class="btn btn-default">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update User</button>
                </a>
            </td>
            <td>
                <a href="delete"><button class="btn btn-default">
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remove User</button>
                </a>
            </td>
        </tr>
    </table>
    <div class="row">
        <table class="table table-stripped table-condensed hidden" id="results">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Comments</th>
                <th>Newsletter</th>
                <th>Date Addded</th>
            </tr>
            
        </table>
    </div>
</div>
<script type="text/javascript">
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
</script>