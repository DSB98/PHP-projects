<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

?>

  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
    <h3 class="navbar-brand" href="#"><i class="fas fa-pen mr-1 "></i><samp>AMGOI</samp></h3>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- <div class="menubar-top"> -->
        <div class="menubar-top"> 
                                   <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="index.php"){echo " active";}else {echo"";}?>"
                                       href="index.php"><i class="fas fa-home mr-1 "></i> Home</a>
                                    </div>
                                  
                                   <div class="menubar-top"> 
                                   <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="profile.php"){echo " active";}else {echo"";}?>"
                                       href="profile.php"><i class="fas fa-user mr-1 "></i> Profile</a>
                                    </div>
                                    <div class="menubar-top"> 
                                   <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="course.php"){echo " active";}else {echo"";}?>"
                                       href="course.php"><i class="fas fa-graduation-cap mr-1 "></i> Course</a>
                                    </div>
                                    <div class="menubar-top"> 
                                   <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="subject.php"){echo " active";}else {echo"";}?>"
                                       href="subject.php"><i class="fas fa-book mr-1 "></i> Subject</a>
                                    </div>
                                    <div class="menubar-top">  
                                      <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="studentList.php" or basename($_SERVER['PHP_SELF'])=="updateStdent.php" ){echo " active";}else {echo"";}?>"
                                       href="studentList.php"> <i class="fas fa-users mr-1 "></i>Students</a>
                                    </div>
                                   <div class="menubar-top"> 
                                     <a class="nav-link
                                     <?php if(basename($_SERVER['PHP_SELF'])=="addStudent.php"){echo " active";}else {echo"";}?>"
                                      href="addStudent.php"> <i class="fas fa-user-plus mr-1 "></i>Add Student</a>
                                    </div>
                                    <div class="menubar-top"> 
                                     <a class="nav-link
                                     <?php if(basename($_SERVER['PHP_SELF'])=="addTeacher.php"){echo " active";}else {echo"";}?>"
                                      href="addTeacher.php"> <i class="fas fa-user-plus mr-1 "></i>Add Teacher</a>
                                    </div>
                                    <div class="menubar-top">  
                                      <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="teacherList.php" or basename($_SERVER['PHP_SELF'])=="updateStdent.php" ){echo " active";}else {echo"";}?>"
                                       href="teacherList.php"> <i class="fas fa-users mr-1 "></i>Teachers</a>
                                    </div>
                                    <div class="menubar-top"> 
                                     <a class="nav-link
                                     <?php if(basename($_SERVER['PHP_SELF'])=="addQuestion.php"){echo " active";}else {echo"";}?>"
                                      href="addQuestion.php"> <i class="fas fa-question mr-1 "></i>Add Question</a>
                                    </div>
                                   <div class="menubar-top"> 
                                   <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="addExam.php"){echo " active";}else {echo"";}?>"
                                       href="addExam.php"> <i class="fas fa-edit mr-1"></i>Exam</a>
                                    </div>
                                    <div class="menubar-top">
                                    <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="insertMarks.php"){echo " active";}else {echo"";}?>"
                                       href="insertMarks.php"> <i class="fas fa-marker mr-1"></i>Insert Mark</a>
                                    </div>
                                    <!-- <div class="menubar-top">
                                    <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="result.php"){echo " active";}else {echo"";}?>"
                                       href="result.php"> <i class="fas fa-clipboard mr-1"></i>Result</a>
                                    </div>
                                    <div class="menubar-top">
                                    <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="reports.php"){echo " active";}else {echo"";}?>"
                                       href="reports.php"> <i class="fas fa-file mr-1"></i>Reports</a>
                                    </div> -->
                                    <div class="menubar-top">
                                    <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="logout.php"){echo " active";}else {echo"";}?>"
                                       href="partials/logout.php"> <i class="fas fa-sign-out-alt mr-1"></i>Logout</a>
                                    </div>
        

      </div>
    </div>
  </nav>
<?php
} else {
  echo "Session not started";
}
?>

