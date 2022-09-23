<?php
session_start();
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){ 
}

echo'<nav class="navbar navbar-expand-lg navbar-light bg-light  fixed-top" id="custom-nav">
  <a class="navbar-brand" href="../ym" style="background-color:orange; color:white; border-radius:50px;margin:5px; padding:5px;">YM</a>
  <h4 style="padding-right:15px; padding-left:15px; color:orange; font-weight:600;">युवा महाराष्ट्र</h4>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
  <li class="nav-item active">
  <a class="nav-link" href="../ym">Home <span class="sr-only">(current)</span></a>
  </li>
  
   <li class="nav-item dropdown">
     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Top Categories
     </a>

     <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
     $sql="SELECT * FROM `categories` LIMIT 3";
     $result=mysqli_query($conn,$sql);
  
   while($row=mysqli_fetch_assoc($result)){   
     $row['cat_id'];
     echo '<a class="dropdown-item" href="threadlist.php?catid='. $row['cat_id'].'" style="color:black;">'.$row['cat_name'].'</a>';
     
   }
      
    echo '</div>
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
   <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
   </form>';
   if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
    echo '<p class="text-dark my-0 mx-2"><small>Welcome </small><a href="profile.php" styel="color:orange;">'.$_SESSION['username'].'</a></p>
    <a role="button" href="partials/_logout.php" class="btn btn-outline-success text-dark ml-2">Logout</a>
    </form>';
  }
  else{
   echo '<button class="btn btn-outline-dark ml-2" data-toggle="modal" data-target="#loginModal">Login</button>
  <button class="btn btn-outline-dark mx-2" data-toggle="modal" data-target="#signupModal">Signup</button>';
}
  echo '</div>

</nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';


?>