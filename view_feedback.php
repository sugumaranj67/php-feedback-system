<?php
$file = "feedback.txt";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Feedback list</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Saved Feedback</h2>

<?php
if(file_exists($file)){//check the file presence
    $contents = file_get_contents($file);//reads the whole file as a string

    //split into lines
    $lines = explode("\n",$contents);

    //looping each and every lines

    foreach($lines as $line){
        $line = trim($line);

        if($line=="") continue;

        echo '<div class="card">'.htmlspecialchars($line).'</div>';

    }
    /*
    echo "<h2>Saved Feedback</h2>";
    echo nl2br(htmlspecialchars($contents));//prevent xss // nl2br - turns the \n to <br>
    */
}
else{
    echo "<h2>No feedback yet received.</h2>";
}
?>
</body>
</html>