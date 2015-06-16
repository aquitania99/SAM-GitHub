<div class="container">
    <h2 class="form-signin-heading"><?= $title ?></h2>
    <table class="table table-condensed table-bordered col-xs-12">
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
        <table class="table table-stripped table-condensed col-xs-12 hidden" id="results">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Comments</th>
                <th>Newsletter</th>
                <th>Date Addded</th>
            </thead>
        </table>
    </div>
</div>
<script type="text/javascript" src="js/processData.js"></script>