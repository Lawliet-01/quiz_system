<?php
include 'func_loginvalidate.php';
include 'dbconn.php';

     if(!validate()){
       header("Location: adminlogin.php");
     }
?>

<html>
  <head>
    <title>Admin Panel</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
      <script type="text/javascript" src="../js/jquery.js"></script>
      <script type="text/javascript" src="../js/cookiejs.js"></script>
      <script type="text/javascript" src="../js/materialize.js"></script>
      <link href="../css/style.css" rel="stylesheet" type="text/css">
      <link  rel="stylesheet" href="../fonts/icons/icon.woff2" >
      <link href="../css/materialize.css" rel="stylesheet" type="text/css">
  </head>
  <style media="screen">
  .bg{
background-image: url("../sources/images/logos/user-bg.jpg");
}
  </style>

  <body class="back">

    <header>
      <nav class="teal darken-3 ">
           <div class="row">
               <div>
                 <a class="button-collapse waves-effect waves-light left" href="#!" data-activates="slide-out" id="sidenavshow" style="display:block">
                 <i class="material-icons left">menu</i></a>
              </div>
            </div>
       </nav>
    </header>



    <div class="row">
          <ul id="slide-out" class="side-nav" >
          <li>
            <div class="bg" style="display:flex; justify-content:center;">
             <img src="../sources/images/logos/logoiimt.png" alt="">
            </div>
          </li>
          <?php
              include "dbconn.php";
             $qry="SELECT * FROM rights";
             $res=$conn->query($qry);
             if(mysqli_num_rows($res)>0){
               while($row = $res->fetch_assoc()){
          ?>
                <li><a class="waves-effect menubar" data-value="<?php echo $row['pagename'];?>" href="#!"><?php echo $row['pagefunc']; ?></a></li>
          <?php
               }
             }
          ?>
             <li><a class="waves-effect" href="#!"  id="logout">Logout</a></li>
             <li><div class="divider"></div></li>
        </ul>
     </div>


     <div class="row">
       <div id="maincontainer" class="col l12">
         This is main container
       </div>

     </div>


  </body>

  <script type="text/javascript">
    $(document).ready(function(){
      $(".button-collapse").sideNav();

       $("#logout").click(function() {

         alert("hii");
         $.post("func_logout.php",{},function(data){
            if(data==1)
            {
              alert("You are succcessfully logout");
              window.open("adminlogin.php","_self");
            }
          });
        });

        $(".menubar").click(function(){
            $("#maincontainer").load($(this).data("value")+".php");
             $("#sidenavshow").trigger("click");
        });

    });
  </script>
</html>
