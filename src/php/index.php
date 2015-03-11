<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SMS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <?php 
        if (file_exists('../.client-id')) { ?>
            <script src="https://apis.google.com/js/client:platform.js" async defer></script>
        <?php } ?>
    <script src="script.js"></script>
</head>
<body class="container">
    <!-- Navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="#" class="navbar-brand">SMS</a>
            </div>
            <p class="navbar-text">
                <a id="sign-in-link" data-toggle="modal" href="#sign-in" class="navbar-link">Sign in</a>
            </p>
        </div>
    </nav>

    <!-- Sign-in Modal -->
    <div id="sign-in" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Sign in via...</h4>
                </div>
                <div class="modal-body">
                    <span id="signinButton">
                        <span
                            class="g-signin"
                            data-callback="signinCallback"
                            data-clientid="<?php $id = file_get_contents('../.client-id'); echo $id; ?>"
                            data-cookiepolicy="single_host_origin"
                            data-requestvisibleactions="http://schema.org/AddAction"
                            data-scope="https://www.googleapis.com/auth/plus.login https://www.google.com/m8/feeds/">
                        </span>
                    </span>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Form -->
    <form class="jumbotron form-horizontal" action="send.php" method="post">
        <div class="form-group">
            <label for="number" class="col-sm-2 control-label glyphicon glyphicon-phone"><span class="sr-only">Phone Number</span></label>
            <div class="col-sm-10">
                <input required id="number-input" class="form-control" name="number" type="text" placeholder="XXX-XXX-XXXX (Dashes optional)">
            </div>
        </div>

        <div class="form-group">
            <label for="message" class="col-sm-2 control-label glyphicon glyphicon-font"><span class="sr-only">Text Message</span></label>
            <div class="col-sm-10">
                <input required class="form-control" name="message" type="text" placeholder="Text Message">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" role="button" class="btn btn-success">Send</button>
                <button type="reset" role="button" class="btn btn-danger">Reset</button>
            </div>
        </div>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>