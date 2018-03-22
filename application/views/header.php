<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>Tu kupisz wszystko</title>
  <link href="./css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
  <link href="./css/style.css" rel="stylesheet" type="text/css" media="all" />
  <link href="./css/owl.carousel.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/mystyle.css">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!--<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>-->
  <!--<script src="../../js/jquery.min.js"></script>-->
  <script type="text/javascript" src="./js/bootstrap-3.1.1.min.js"></script>
    <!-- cart -->
      <script src="./js/simpleCart.min.js"> </script>
    <!-- cart -->
    <style>
    body {
    margin:0;
    background-color:#212C38;
    width:100%;
    height:100%;
    }

    .show-on-hover:hover > ul.dropdown-menu {
        display: block;
    }

    .topnav {
      overflow: hidden;
      background-color: #333;
    }

    .topnav a {
      float: left;
      display: block;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .topnav a:hover {
      background-color: #ddd;
      color: black;
    }

    .topnav a.active {
        background-color: #4CAF50;
        color: white;

    }
    #table{
      background-color:white;
    }

    </style>
</head>
<div class='topnav'>
<?php
error_reporting(0);

echo "<a class='active' href='/CI/index.php/'>Home</a>";
echo "<a href='/CI/index.php/produkty'>Produkty</a>";

if($this->session->userdata['username']=='admin'){
echo "<a href='/CI/index.php/admin'>Panel Admina</a>";
echo "<a href='/CI/index.php/edycjaproduktu'>Edycja Produktu</a>";
}

 if($this->session->userdata['logged_in']==0){
 echo "<a href='/CI/index.php/zarejestruj'>Zarejestruj</a>
  <a href='/CI/index.php/zaloguj'>Zaloguj</a>
  <a href='/CI/index.php/koszyk'>Koszyk</a>";}
  else
  {echo "<a href='/CI/index.php/wyloguj'>Wyloguj</a>";
  echo "<a href='/CI/index.php/koszyk'>Koszyk</a>";
echo "<a href='/CI/index.php/status'>Status Zamówienia</a>";}?>
</div>
<br>
