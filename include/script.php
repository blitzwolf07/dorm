<script src="js/sweetalert.min.js"></script>
<?php
  if(isset($_SESSION['status']) && $_SESSION['status'] !='')
  {
    ?>
        <script type="text/javascript">
    $(document).ready(function() {
        swal({
            title: "<?php echo $_SESSION['status']; ?>",
            text: "Data was added to your database",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            button: "OK",
            timer: 3000
        });
    });
</script>
    <?php
    unset($_SESSION['status']);
  }
 ?>

