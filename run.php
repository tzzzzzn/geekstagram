<?php
    
    if (isset($_POST['code'])) 
    {
        $code = $_POST['code'];
        $myfile = fopen("newfile.cpp", "w") or die("Unable to open file!");
        fwrite($myfile, $code);
        fclose($myfile);
    }
    if (isset($_POST['input_text'])) 
    {
        $input = $_POST['input_text'];
        $myinput = fopen("newinput.txt", "w") or die("Unable to open file!");
        fwrite($myinput, $input);
        fclose($myinput);
    }
    $outfile = fopen("out.txt", 'w') or die("Unable to open file!");
    fclose($outfile);
    exec("g++ newfile.cpp 2>out.txt && a <newinput.txt >out.txt");
    $myfile1 = fopen("out.txt", "r") or die("Unable to open file!");
    $var= fread($myfile1,filesize('out.txt'));
    unlink('out.txt');
    unlink('newfile.cpp');
    unlink('newinput.txt');
    $myinput = fopen("a.exe", "w") or die("Unable to open file!");
    fclose($myinput);
    unlink('a.exe');
    echo $var;
?>