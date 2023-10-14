<?php

$ovelse = $_POST["ovelse"];
$sets = filter_input(INPUT_POST, "sets",FILTER_VALIDATE_INT);
$reps = filter_input(INPUT_POST, "reps",FILTER_VALIDATE_INT);
$feeling = filter_input(INPUT_POST,"feeling",FILTER_VALIDATE_INT);
$terms = filter_input(INPUT_POST, "terms", FILTER_VALIDATE_BOOL); //$_POST("terms");



if( ! $terms){
    die("Please complett traing");
}
//var_dump($ovelse,$sets,$reps,$terms,$feeling);// ,$ovelse, $set, $reps,$_types,

$host = "localhost";
$dbname = "trening_db";
$username ="root";
$password = "";


$conn =mysqli_connect($host, $username,$password, $dbname);


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