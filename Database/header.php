<!--
this is a header (the top navigation bar)
for all the main pages, so it is easier to
modifiy it and nicer to look at.
 -->
 <!--Created by Ahmed-->

<?php
  $url= $_SERVER['REQUEST_URI']; // get the url
  $urlDir = explode('/',$url); // splite it by '/'
  $active = "active";
 ?>
<style media="screen">
html {
  font-family: Arial;
  height: 100%;
}
body {
  margin: 0px auto;
  text-align: center;
  width: 85%;
  height: 100%;
  display: flex;
  gap: 2%;
  flex-direction: column;
}
.topnav {
  display: flex;
  background-color: #3ba9dc;
  padding-right: 10em;
  padding-left: 10em;
  list-style: none;
}
.topnav > * {
  flex: 1;
}

ul.topnav li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
.non {
  cursor: pointer;
  border: 0;
  padding: 1em 1.5em;
  position: relative;
  z-index: 0;
}
.non::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: lightblue;
  z-index: -1;
  transition: -webkit-transform 200ms ease-in;
  transition: transform 200ms ease-in;
  transition: transform 200ms ease-in, -webkit-transform 200ms ease-in;
  -webkit-transform: scale(0);
          transform: scale(0);
}
.non:hover::after {
  -webkit-transform: scale(1);
          transform: scale(1);
}


ul.topnav li a.active {background-color: #333;}

ul.topnav li.right {float: right;}

@media screen and (max-width: 600px) {
  ul.topnav li.right,
  ul.topnav li {float: none;}
}

</style>

<h2 align="center">KEYVIO</h2>
<ul class="topnav">
  <!-- if the url is home then this tap is active -->
  <li><a class=<?php  echo (end($urlDir) == "home.php")? $active : "non" ?>
    href="home.php">Home</a></li>
  <li><a class=<?php  echo (end($urlDir) == "user%20data.php")? $active : "non" ?>
    href="user data.php">User Data</a></li>
  <li><a class=<?php  echo (end($urlDir) == "registration.php")? $active : "non" ?>
    href="registration.php">Registration</a></li>
  <li><a class=<?php  echo (end($urlDir) == "read%20tag.php")? $active : "non" ?>
    href="read tag.php">Read Tag ID</a></li>
  <li><a class=<?php  echo (end($urlDir) == "RFID_log_HTML.php")? $active : "non" ?>
    href="RFID_log_HTML.php">Log</a></li>
  <li><a class=<?php  echo (end($urlDir) == "doorController.php")? $active : "non" ?>
    href="doorController.php">Door Controller</a></li>
</ul>
