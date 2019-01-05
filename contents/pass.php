<?php
echo"
<!-------modal for password change-------------------->
<!-- Modal -->
<div class='modal fade' id='update-password' tabindex='-1' style='position:absolute;' role='dialog' aria-labelledby='exampleModalLabel' aria-hidden='true'>
  <div class='modal-dialog modal-dialog-centered' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>Change Password</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body text-center'>
        <form action='change-pass.php' method='post'>
             <input type='password' name='old_pass' id='old_pass' placeholder='Old Password'></br></br>
             <input type='password' name='new_pass' id='new_pass' placeholder='New Password'></br>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
        <button type='submit' class='btn btn-primary' value='password' name='submit'>Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!------------modal end---------------------->";
?>