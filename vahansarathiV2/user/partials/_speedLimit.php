<div class="modal fade" id="speedForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Set Speed Limit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_speedLimitControl.php" method="POST">
                <div class="modal-body">
                    <div class="md-form">
                    <div class="input_wrap">
                    <i class="fas fa-car prefix grey-text"></i>
                        <label for="mobnum">Vehicle No</label>
                        <select class="form-control" name="vehicle" id="vehicle" required>
                            <option value="">Select Option</option>
                            <?php
                            include "_dbconnect.php";
                            $no = $_SESSION['license_no'];
                            $sql = "SELECT * FROM `vehicle` where license_no= '$no';";
                            $execute = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($execute)) {

                                $license = $row['vehicle_no'];

                                echo '
                                    <option value="' . $license . '">' . $license . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                        <i class="fas fa-tachometer-alt prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="speed">Enter Speed Limit In KM/HR</label>
                        <input type="number" id="speed" name="speed" class="form-control" required>
                        
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
