<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login to YM Helpline</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="partials/_loginControl.php" method="post">
                    <div class="form-group">
                        <label for="loginEmail">Email address</label>
                        
                        <input type="email" class="form-control" id="loginEmail"  name="loginEmail" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="loginPass">Password</label>
                        <input type="password" class="form-control" id="loginPass" name="loginPass">
                    </div>
                
                    <button type="submit" class="btn btn-primary">Login</button>
              
            </div>
            <div class="modal-footer">
                
            </div>
            </form>
        </div>
    </div>
</div>