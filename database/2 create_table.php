<?php
    $server='localhost';
    $username='root';
    $password='';
    $database='db';
    //lets create a connection to database 
    $connec=mysqli_connect($server,$username,$password,$database);
    if($connec)
    {
        $sql='CREATE TABLE codestorage
        (
            code text,  
            input text,
            question text,
            approach text,
            tags text
        )';
        if(mysqli_query($connec,$sql))
            echo 'codestorage table created successfully';
        else
            echo 'error in creating table';
    }
    else
        echo "error in creating database";

?>