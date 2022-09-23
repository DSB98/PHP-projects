<?php
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
                                    <?php if($_SESSION['role']=='admin'){ ?>
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
                                    <?php }?>

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
                                    <?php if($_SESSION['role']=='admin'){ ?>
                                    <div class="sidemenu"> 
                                     <a class="nav-link
                                     <?php if(basename($_SERVER['PHP_SELF'])=="addTeacher.php"){echo " active";}else {echo"";}?>"
                                      href="addTeacher.php"> <i class="fas fa-user-plus mr-1 "></i>Add Teacher</a>
                                    </div>
                                   
                                    <div class="sidemenu">  
                                      <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="teacherList.php" or basename($_SERVER['PHP_SELF'])=="updateTeacher.php" ){echo " active";}else {echo"";}?>"
                                       href="teacherList.php"> <i class="fas fa-users mr-1 "></i>Teachers</a>
                                    </div>
                                    <?php }?>
                                    <div class="sidemenu"> 
                                     <a class="nav-link
                                     <?php if(basename($_SERVER['PHP_SELF'])=="addQuestion.php"){echo " active";}else {echo"";}?>"
                                      href="addQuestion.php"> <i class="fas fa-question mr-1 "></i>Add Question</a>
                                    </div>
                                   <div class="sidemenu"> 
                                   <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="addExam.php"){echo " active";}else {echo"";}?>"
                                       href="addExam.php"> <i class="fas fa-edit mr-1"></i>Exam</a>
                                    </div>
                                    <div class="sidemenu"> 
                                   <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="generateQuestionPaper.php"){echo " active";}else {echo"";}?>"
                                       href="generateQuestionPaper.php"> <i class="fas fa-edit mr-1"></i>Question Paper</a>
                                    </div>
                                    <div class="sidemenu">
                                    <a class="nav-link
                                      <?php if(basename($_SERVER['PHP_SELF'])=="insertMarks.php"){echo " active";}else {echo"";}?>"
                                       href="insertMarks.php"> <i class="fas fa-marker mr-1"></i>Insert Mark</a>
                                    </div>
                                    
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

