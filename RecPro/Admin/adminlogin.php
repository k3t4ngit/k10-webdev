

<?php include 'header.php';

  if (!$_GET['action']="") {
    if ($_GET['action']="false") {
      # code...
    
      ?>
    
 <div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4>Wrong credentials!</h4><p>This activity will be logged with your IP address.</p>
  
</div>
  <?php }}

?>
   

      <form class="form-horizontal" method="post" action="admin_login_check.php">
        <div class="control-group">
          <label class="control-label" for="inputEmail">Email</label>
          <div class="controls">
            <input type="text" name="email" id="inputEmail" placeholder="Email">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="inputPassword">Password</label>
          <div class="controls">
            <input type="password" name="password" id="inputPassword" placeholder="Password">
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            
            <button type="submit" class="btn">Sign in</button>
          </div>
        </div>
      </form>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>