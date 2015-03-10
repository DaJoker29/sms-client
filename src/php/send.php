<?php 
    $filters = array(
        'message' => FILTER_SANITIZE_STRING,
        'number' => FILTER_SANITIZE_NUMBER_INT
    );

    $params = filter_input_array(INPUT_POST, $filters);
    $url = 'http://textbelt.com/text';

    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, count($params));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);
 ?>

<html>
<head>
    <meta charset="UTF-8">
    <title>SMS</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
</head>
<body class="container">
    <div class="jumbotron">
        <?php 
            $result = json_decode($response, true);

            if($result["success"]) {
               echo "<h1>Success!</h1>";
             } else {
                echo "<h1>Not Success! <br /><small>" . $result["message"] . "</small><h1>";
             }
        ?>
        <form action="index">
            <button class="btn btn-primary" role="button">Go Back</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>