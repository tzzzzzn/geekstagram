<?php
    if (isset($_POST['code'])) 
    {
        $server='localhost';
        $username='root';
        $password='';
        $database='db';
        //lets create a connection to database 
        $connec=mysqli_connect($server,$username,$password,$database);
        if($connec)
        {
            $code = mysqli_real_escape_string($connec,$_POST['code']);
            $input1 = mysqli_real_escape_string($connec,$_POST['input1']);
            $question=mysqli_real_escape_string($connec,$_POST['question']);
            $approach=mysqli_real_escape_string($connec,$_POST['approach']);
            $tags=mysqli_real_escape_string($connec,$_POST['tags']);
            $sql='INSERT INTO codestorage values("'.$code.'","'.$input1.'","'.$question.'","'.$approach.'","'.$tags.'")';
//            echo $sql;
//            $sql='INSERT INTO codestorage values("sdjklfl","akjsdf","asdjfhbgk","skdjfk","asdhbfk")';
            if(mysqli_query($connec,$sql))
                echo 'inserted data into table successfully';
            else
                echo 'error in inserting data into table';
        }
        else
            echo "error in accessing database";
    }
    else
        echo 'not found';
?>