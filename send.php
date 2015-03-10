<?php 
    $params = $_POST;
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
    <title>Send</title>
</head>
<body>
<pre>
    <?php 
        $result = json_decode($response, true);

        if($result["success"]) {
           echo "Success!";
         } else {
            echo "You suck. " . $result["message"];
         }
    ?>
</pre>
</body>
</html>