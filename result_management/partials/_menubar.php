<?php
session_start();
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){ 
}

echo'<nav class="navbar navbar-expand-lg navbar-light bg-light  fixed-top" id="custom-nav">
  
  <h4 style="padding-right:15px; padding-left:15px; color:blue; font-weight:600;">Result Management</h4>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
  <li class="nav-item active">
  <a class="nav-link" href="../ym">Home <span class="sr-only">(current)</span></a>
  </li>
  
   <li class="nav-item">
<a class="nav-link" href="about.php">About</a>
 </li>
 <li class="nav-item">
     <a class="nav-link " href="privacypolicy.php">Privacy Policy</a>
   </li>
   <li class="nav-item">
     <a class="nav-link " href="contact.php">Contact</a>
   </li>';
echo'
</ul>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
 <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search" name="search">
   <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
   </form>
 
  </div>

</nav>';




?>