<?php
if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
    $user=$_SESSION['user_id'];
        }
?>  
<div class="modal fade" id="requirementModal" tabindex="-1" aria-labelledby="requirementModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="requirementModal">Submit your requirement here</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form action="partials/_addRequirementControl.php" Style="margin-bottom:10px; margin-right:40px"
                        method="POST">


                        <div class="form-group">
                            <select class="form-control" name="bgroup" id="bgroup" required onchange="getBloodGroup()">
                                <option value="">Select Blood Group</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>

                        <div class="form-group">

                            <select class="form-control" name="requirement" id="requirement" onchange="getRequirement()"
                                required>
                                <option value="">Select Requirement</option>
                                <option value="Blood">Blood</option>
                                <option value="Plasma">Plasma</option>
                                <option value="Remdesivir">Remdesivir</option>
                                <option value="Oxygen Bed">Oxygen Bed</option>
                                <option value="Ventilater">Ventilator</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="patient" name="patient"
                                aria-describedby="emailHelp" required placeholder="Patient Name"
                                onchange="getPatientName()">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="age" name="age" aria-describedby="emailHelp"
                                placeholder="Age" onchange="getAge()">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="hospital" name="hospital"
                                aria-describedby="emailHelp" placeholder="Enter Hospital Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="city" name="city" aria-describedby="emailHelp"
                                placeholder="Enter City Name">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="hrct" name="hrct" aria-describedby="emailHelp"
                                placeholder="HRCT Score">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="swab" name="swab" aria-describedby="emailHelp"
                                placeholder="Swab CT Score">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="o2" name="o2" aria-describedby="emailHelp"
                                placeholder="Oxygen Level">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="relative" name="relative"
                                aria-describedby="emailHelp" required placeholder="Relatives Name">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" id="contact" name="contact"
                                aria-describedby="emailHelp" required placeholder="Cantact Number" minlength="10">
                        </div>
                        <input type="hidden" name="status" id="status" value="New">
                        <input type="hidden" name="user" id="user" value=5>


                        <div class="form-group">
                        </div>
                        <button type="submit" class="btn btn-primary" style="float:right;">Submit Your Requirement</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
