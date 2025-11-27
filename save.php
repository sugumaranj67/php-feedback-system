<?php
//check the request is POST
if($_SERVER['REQUEST_METHOD']=='POST'){
    //READ AND CLEAN THE INPUT
    $name = trim($_POST['name']);//removes unwanted spaces from the begining and end of a string
    $message = trim($_POST['message']);

    //validation
    if(strlen($name)<3){
        echo "Name must be at least 3 characters.";
        exit;
    }
    if(strlen($message)<10){
        echo "Message must be at least 10 characters.";
        exit;
    }

    //show the data simple output
    echo "<h2>Thanks for your feedback!</h2>";
    echo "Name: ".htmlspecialchars($name)."<br>";//it converts dangerous special characters into safe ones like <script>alert('Hacked')</script>
    echo "Message: ".htmlspecialchars($message);//prevents security problems
    /*the above function will change the <> to &lt; &gt; and prevent malicious xss injection */
}else{
    echo "Invalid request! Please submit the form.";
}

//saving that into a file

$file="feedback.txt";

//format the data

$entry="Name: ".$name." | Message: ".$message."\n";

//Append to file

file_put_contents($file,$entry,FILE_APPEND);

//CONFIRMATION

echo "<br><br>Saved Successfully!";

?>