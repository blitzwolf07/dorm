<?php 
 include_once "../include/session.php";

    if(isset($_SESSION['user_id'])){
        include_once "config.php";
        include_once "../include/connect.php";
        $outgoing_id = $_SESSION['user_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM tbl_messages LEFT JOIN tbl_users ON tbl_users.id = tbl_messages.outgoing_msg_id
                WHERE (outgoing_msg_id = '$outgoing_id' AND incoming_msg_id = '$incoming_id')
                OR (outgoing_msg_id = '$incoming_id' AND incoming_msg_id = '$outgoing_id')";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){ ?>
              <?php  if ($row['outgoing_msg_id'] === $outgoing_id) { 
       
                ?>;
                     <li class="right">
                                <div class="conversation-list">
                                         <div class="ctext-wrap">
                                             <div class="ctext-wrap-content">
                                                    <h5 class="conversation-name"><a href="#" class="user-name"><?php echo $row['fname'] ?> <?php echo $row['mname'] ?> <?php echo $row['lname'] ?> </a> <span class="time"><?php echo date("h:iA",strtotime($row['date_time'])) ?></span></h5>
                                                    <p class="mb-0"><?php echo $row['msg'] ?></p>
                                        <?php if($row['images'] == '') { ?>

                                        <?php }else { ?>
                                                <a class="d-inline-block m-1" href="">
                                                    <img src="files/<?php echo $row['images'] ?>" alt="" class="rounded img-thumbnail" width="100">
                                                </a>
                                                
                                        <?php } ?>
                                        <br>
                                                    <h5 class="conversation-name float-end"><span class="time"><?php echo date("M. d, y",strtotime($row['date_time'])) ?></span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
             <?php }else { ?> 
                                <li>
                                    <div class="conversation-list right">
                                        <div class="ctext-wrap">
                                            <div class="ctext-wrap-content">
                                                <h5 class="conversation-name"><a href="#" class="user-name"><?php echo $row['mname'] ?> <?php echo $row['lname'] ?></a> <span class="time"><?php echo date("h:iA",strtotime($row['date_time'])) ?>'</span></h5>
                                    <p class="mb-0"><?php echo $row['msg'] ?></p>
                                     <?php if($row['images'] == '') { ?>

                                        <?php }else { ?>
                                                <a class="d-inline-block m-1" href="">
                                                    <img src="files/<?php echo $row['images'] ?>" alt="" class="rounded img-thumbnail" width="100">
                                                </a>
                                        <?php } ?>
                                                <br>    
                                        <h5 class="conversation-name float-end"><span class="time"><?php echo date("M. d, y",strtotime($row['date_time'])) ?></span></h5>
                                                </div>
                                            </div>
                                        </div>
                                </li>
              <?php } ?>
         <?php  } ?>
     <?php   }else{
            $output .= '<div class="text-center"><p>No messages are available. Once you send message they will appear here.</p></div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>