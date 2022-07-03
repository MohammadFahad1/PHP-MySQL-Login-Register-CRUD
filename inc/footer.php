<?php
$currenturl = $_SERVER['PHP_SELF'];
$chkifthisfile = strpos($currenturl, "footer.php");
if($chkifthisfile > 0){
    header("Location: ../login.php");
}
?>
</div>
<div class="bg-warning" style="margin:0;padding: 7px;">
  <center><h4>https://www.FahadBD.tk</h4></center>
</div>
</div>

      <!-- All code ends after here -->
      <script src="js/bootstrap.min.js" type="text/javascript"></script>
      <script src="js/jquery.min.js" type="text/javascript"></script>
      <script src="js/script.js" type="text/javascript"></script>
    </body>
</html>