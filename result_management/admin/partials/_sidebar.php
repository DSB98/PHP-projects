<?php
session_start();
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
?>
<div class="sidebar">
            <div class="row">
                      <!-- right side navbar -->
                      <div>
                          
                                <nav class="nav d-block">
                                <div class="sidemenu"> 
                                   <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="index.php"){echo " active";}else {echo"";}?>"
                                       href="index.php"><i class="fas fa-home mr-1 "></i> Home</a>
                                    </div>
                                  
                                   <div class="sidemenu"> 
                                   <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="profile.php"){echo " active";}else {echo"";}?>"
                                       href="profile.php"><i class="fas fa-user mr-1 "></i> Profile</a>
                                    </div>
                                    <div class="sidemenu"> 
                                   <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="course.php"){echo " active";}else {echo"";}?>"
                                       href="course.php"><i class="fas fa-graduation-cap mr-1 "></i> Course</a>
                                    </div>
                                    <div class="sidemenu"> 
                                   <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="subject.php"){echo " active";}else {echo"";}?>"
                                       href="subject.php"><i class="fas fa-book mr-1 "></i> Subject</a>
                                    </div>
                                    <div class="sidemenu">  
                                      <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="studentList.php" or basename($_SERVER['PHP_SELF'])=="updateStdent.php" ){echo " active";}else {echo"";}?>"
                                       href="studentList.php"> <i class="fas fa-users mr-1 "></i>Students</a>
                                    </div>
                                   <div class="sidemenu"> 
                                     <a class="nav-link
                                     <?php if(basename($_SERVER['PHP_SELF'])=="addStudent.php"){echo " active";}else {echo"";}?>"
                                      href="addStudent.php"> <i class="fas fa-user-plus mr-1 "></i>Add Student</a>
                                    </div>
                                   <div class="sidemenu"> 
                                   <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="addExam.php"){echo " active";}else {echo"";}?>"
                                       href="addExam.php"> <i class="fas fa-edit mr-1"></i>Exam</a>
                                    </div>
                                    <div class="sidemenu">
                                    <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="insertMarks.php"){echo " active";}else {echo"";}?>"
                                       href="insertMarks.php"> <i class="fas fa-marker mr-1"></i>Insert Mark</a>
                                    </div>
                                    <!-- <div class="sidemenu">
                                    <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="result.php"){echo " active";}else {echo"";}?>"
                                       href="result.php"> <i class="fas fa-clipboard mr-1"></i>Result</a>
                                    </div>
                                    <div class="sidemenu">
                                    <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="reports.php"){echo " active";}else {echo"";}?>"
                                       href="reports.php"> <i class="fas fa-file mr-1"></i>Reports</a>
                                    </div> -->
                                    <div class="sidemenu">
                                    <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="logout.php"){echo " active";}else {echo"";}?>"
                                       href="partials/logout.php"> <i class="fas fa-sign-out-alt mr-1"></i>Logout</a>
                                    </div>

                                   
                                   
                                  </nav>
                              
                        </div>
             </div>
</div>
<?php }
else{
   header("location:../login.php");
}

?>

