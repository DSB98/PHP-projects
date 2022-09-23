<?php
include "partials/_dbconnect.php";
include "partials/_menubar.php";
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){ 
    
    $user=$_SESSION['user_id'];
 
}

    $query="select * from user where user_id=$user";
    $excecution= $conn->query($query);
    $data = $excecution->fetch_object();
    // print_r($data);
    // exit;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="description"
        content="The youth, inspired by the thoughts of Chhatrapati Shivaji Maharaj, came together and started the organization of Yuva Maharashtra. Through Yuva Maharashtra, youth preserve history, culture and do social services And now we are coming forward to help people who needs plasma, beds, medicines, etc.">
    <meta name="keywords"
        content="Covid19, Yuva Maharashtra, YM Helpline, Corona, Covaccine, Plasma, Plasma donor, blood donor, Support India, ">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta http-equiv="content-language" content="en-MR" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/styles.css" class="css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style type="text/css">
    body {
        margin: 0;
        padding-top: 40px;
        color: #2e323c;
        background: #f5f6fa;
        position: relative;
        height: 100%;
    }

    .account-settings .user-profile {
        margin: 0 0 1rem 0;
        padding-bottom: 1rem;
        text-align: center;
    }

    .account-settings .user-profile .user-avatar {
        margin: 0 0 1rem 0;
    }

    .account-settings .user-profile .user-avatar img {
        width: 90px;
        height: 90px;
        -webkit-border-radius: 100px;
        -moz-border-radius: 100px;
        border-radius: 100px;
    }

    .account-settings .user-profile h5.user-name {
        margin: 0 0 0.5rem 0;
    }

    .account-settings .user-profile h6.user-email {
        margin: 0;
        font-size: 0.8rem;
        font-weight: 400;
        color: #9fa8b9;
    }

    .account-settings .about {
        margin: 2rem 0 0 0;
        text-align: center;
    }

    .account-settings .about h5 {
        margin: 0 0 15px 0;
        color: #007ae1;
    }

    .account-settings .about p {
        font-size: 0.825rem;
    }

    .form-control {
        border: 1px solid #cfd1d8;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        font-size: .825rem;
        background: #ffffff;
        color: #2e323c;
    }

    .card {
        background: #ffffff;
        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
        border: 0;
        margin-bottom: 1rem;
    }

    .container {
        margin-top: 60px;
        margin-bottom: 60px;
    }
    </style>

    <title>YM Helpline - Edit Profile</title>
</head>

<body>



    <div class="container">
        <div class="row gutters">
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="account-settings">
                            <div class="user-profile">
                                <div class="user-avatar">
                                    <img src="profile.png" alt="Maxwell Admin">
                                </div>
                                <h5 class="user-name"><?=$data->user_name;?></h5>
                                <h6 class="user-email"><?=$data->email;?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                <div class="card h-100">
                    <div class="card-body">
                        <form action="partials/_updateProfile.php" method="POST">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-2 text-primary">Personal Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="username"><span style="color:red;">*</span>Full Name</label>
                                        <input type="text" class="form-control" id="username" name="username" required <?php
                        if(isset($data->user_name)){
                            ?> value="<?=$data->user_name;?>" <?php

                        }else{
                            ?> placeholder="Enter Your Name" <?php
                        }
                        ?>>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="signupEmail"><span style="color:red;">*</span>Email</label>
                                        <input type="email" class="form-control" id="signupEmail" name="signupEmail"
                                            required <?php
                        if(isset($data->email)){
                            ?> value="<?=$data->email;?>" <?php

                        }else{
                            ?> placeholder="Enter Email Address" <?php
                        }
                        ?>>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="pri_num"><span style="color:red;">*</span>Phone</label>
                                        <input type="number" class="form-control" id="pri_num" name="pri_num" required <?php
                        if(isset($data->pri_mob_number)){
                            ?> value="<?=$data->pri_mob_number;?>" <?php

                        }else{
                            ?> placeholder="Enter Mobile Number" <?php
                        }
                        ?>>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="sec_num"><span style="color:red;">*</span>Sec.Phone</label>
                                        <input type="number" class="form-control" id="sec_num" name="sec_num" <?php
                        if(isset($data->pri_mob_number)){
                            ?> value="<?=$data->sec_mob_number;?>" <?php

                        }else{
                            ?> placeholder="Enter Mobile Number" <?php
                        }
                        ?>>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="gender"><span style="color:red;">*</span>Select Your Gender:</label>

                                        <select class="form-control" name="gender" id="gender" required>
                                            <?php
                                    if(isset($data->gender)){ ?>
                                            <option value="Male" <?php if($data->gender=="Male"){?> selected<?php } ?>>
                                                Male
                                            </option>
                                            <option value="Female" <?php if($data->gender=="Female"){?>
                                                selected<?php } ?>>
                                                Female</option>
                                            <option value="Transgender" <?php if($data->gender=="Transgender"){?>
                                                selected<?php } ?>>Transgender</option>
                                            <?php } ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="dob"><span style="color:red;">*</span>DOB</label>
                                        <input type="date" class="form-control" id="dob" name="dob" required <?php
                        if(isset($data->dob)){
                            ?> value="<?=$data->dob;?>" <?php

                        }else{
                            ?> placeholder="Enter your DOB" <?php
                        }
                        ?>>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Medical Details</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="bgroup"><span style="color:red;">*</span>Select Your Blood Group:</label>

                                        <select class="form-control" name="bgroup" id="bgroup" required>
                                            <?php if(isset($data->blood_group)){?>
                                            <option value="A+" <?php if($data->blood_group=="A+"){ ?> selected
                                                <?php }?>>A+
                                            </option>
                                            <option value="A-" <?php if($data->blood_group=="A-"){ ?> selected
                                                <?php }?>>A-
                                            </option>
                                            <option value="B+" <?php if($data->blood_group=="B+"){ ?> selected
                                                <?php }?>>B+
                                            </option>
                                            <option value="B-" <?php if($data->blood_group=="B-"){ ?> selected
                                                <?php }?>>B-
                                            </option>
                                            <option value="AB+" <?php if($data->blood_group=="AB+"){ ?> selected
                                                <?php }?>>
                                                AB+</option>
                                            <option value="AB-" <?php if($data->blood_group=="AB-"){ ?> selected
                                                <?php }?>>
                                                AB-</option>
                                            <option value="O+" <?php if($data->blood_group=="O+"){ ?> selected
                                                <?php }?>>O+
                                            </option>
                                            <option value="O-" <?php if($data->blood_group=="O-"){ ?> selected
                                                <?php }?>>O-
                                            </option>
                                            <?php }?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="weight">Weight in kg:</label>
                                        <input type="number" class="form-control" id="weight" name="weight" <?php
                        if(isset($data->weight)){
                            ?> value="<?=$data->weight;?>" <?php

                        }else{
                            ?> placeholder="Enter Your Weight in KG" <?php
                        }
                        ?>>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="hemoglobin">Hemoglobin:</label>
                                        <input type="number" class="form-control" id="hemoglobin" name="hemoglobin"
                                             <?php
                        if(isset($data->hb)){
                            ?> value="<?=$data->hb;?>" <?php

                        }else{
                            ?> placeholder="Enter Your HB" <?php
                        }
                        ?>>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="blood"><span style="color:red;">*</span>Blood Donor:</label>

                                        <select class="form-control" name="blood" id="blood" required>
                                            <?php if(isset($data->bloodDonor)){?>
                                            <option value="yes" <?php if($data->bloodDonor=="yes"){?> selected
                                                <?php } ?>>
                                                Yes</option>
                                            <option value="no" <?php if($data->bloodDonor!="yes"){?> selected
                                                <?php } ?>>No
                                            </option>
                                            <?php }?>
                                        </select>

                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="check"><span style="color:red;">*</span>Plasma Donor:</label>

                                        <select class="form-control" name="check" id="check" required>
                                            <?php if(isset($data->plasmaDonor)){?>
                                            <option value="yes" <?php if($data->plasmaDonor=="yes"){?> selected
                                                <?php } ?>>
                                                Yes</option>
                                            <option value="no" <?php if($data->plasmaDonor!="yes"){?> selected
                                                <?php } ?>>No
                                            </option>
                                            <?php }?>
                                        </select>

                                    </div>
                                </div>



                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mt-3 mb-2 text-primary">Address</h6>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="address"><span style="color:red;">*</span>Address / City</label>
                                        <input type="textarea" class="form-control" id="address" name="address" required <?php
                        if(isset($data->address)){
                            ?> value="<?=str_replace("%"," ",str_replace("_",",",$data->address));?>" <?php

                        }else{
                            ?> placeholder="Enter Address" <?php
                        }
                        ?>>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="pincode"><span style="color:red;">*</span>Pincode:</label>
                                        <input type="number" class="form-control" id="pincode" name="pincode" required <?php
                        if(isset($data->dob)){
                            ?> value="<?=$data->pincode;?>" <?php

                        }else{
                            ?> placeholder="Enter Pincode" <?php
                        }
                        ?>>
                                    </div>
                                </div>
                            </div>
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">
                                        <button type="button" id="submit" name="submit"
                                            class="btn btn-secondary">Cancel</button>
                                        <button type="submit" id="submit" name="submit"
                                            class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "partials/_footer.php";?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>