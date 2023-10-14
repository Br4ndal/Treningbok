<?php

$ovelse = $_POST["ovelse"];
$sets = filter_input(INPUT_POST, "sets",FILTER_VALIDATE_INT);
$reps = filter_input(INPUT_POST, "reps",FILTER_VALIDATE_INT);
$feeling = filter_input(INPUT_POST,"feeling",FILTER_VALIDATE_INT);
$terms = filter_input(INPUT_POST, "terms", FILTER_VALIDATE_BOOL); //$_POST("terms");


if( ! $terms){
    die("Please complett traing");
}
//var_dump($ovelse1,$sets1,$reps1,$feeling1);// ,$ovelse, $set, $reps,$_types,

$host = "sql11.freesqldatabase.com";
$dbname = "sql11653374";
$username ="sql11653374";
$password = "aeqbuXwQq2";
$portNr = "3306";


$conn =mysqli_connect($host, $username,$password, $dbname,$portNr);


if (mysqli_connect_errno()){
    die("connection error". mysqli_connect_error());
}
//echo "CONNECTION IS OK"

$sql = "INSERT INTO trening (ovelse, sets, reps, feeling)
        VALUES(?,?,?,?)";
$stmt = mysqli_stmt_init($conn);




if ( ! mysqli_stmt_prepare($stmt,$sql)){
    die(mysqli_error($conn));
}


mysqli_stmt_bind_param($stmt, "siii",$ovelse,$sets,$reps,$feeling);

mysqli_stmt_execute($stmt);

echo "parametrs saved"
?>