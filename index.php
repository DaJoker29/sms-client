<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SMS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
</head>
<body class="container">
    <h1>SMS <small>Because I can</small></h1>
    <form class="jumbotron form-horizontal" action="send.php" method="post">
        <div class="form-group">
            <label for="number" class="col-sm-2 control-label">Number</label>
            <div class="col-sm-10">
                <input required class="form-control" name="number" type="text" placeholder="Phone Number">
            </div>
        </div>

        <div class="form-group">
            <label for="message" class="col-sm-2 control-label">Message</label>
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