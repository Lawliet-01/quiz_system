<?php
header("Content-type:text/javascript");

    include 'dbconn.php';
    $key=$_POST['key'];
    $array = array();
    $qry="select * from `user` where `passkey` LIKE '%$key%'";
//  echo $qry;
    $res=$conn->query($qry);
    if(mysqli_num_rows($res)>0){
      while($r=$res->fetch_assoc())
        {
          $array[$r["id"]]=$r;

        }
    }
   echo json_encode($array);
?>
