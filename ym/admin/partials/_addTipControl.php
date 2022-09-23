<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    //echo 'reading form data';
    include '_dbconnect.php';
    $cat=$_POST['cat'];
    $title=$_POST['title'];
    $desc=$_POST['desc'];

    $result2=mysqli_query($conn,"SELECT cat_id FROM `categories` WHERE cat_name='$cat';");
            
                $row2=mysqli_fetch_assoc($result2);
                    $cat_id=$row2['cat_id'];
                    
                
            

    $sql="INSERT INTO `health_tips` (`cat_id`, `tip_title`, `tip_desc`, `date`) VALUES ('$cat_id', '$title', '$desc', current_timestamp());
    ";
    $result=mysqli_query($conn,$sql);

    if($result){
        
        $showAlert="Health tip has been successfuly added!";
                header("location: /admin/index.php?tipAdded=true&&alert=$showAlert");
           
              
    }

        else{
        
            $showError="some error occured while processing order!";
                header("location: /admin/index.php?tipAdded=false&&error=$showError");

        }
    
}

?>