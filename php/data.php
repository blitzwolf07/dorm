<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM tbl_messages WHERE (incoming_msg_id = {$row['id']}
                OR outgoing_msg_id = {$row['id']}) AND (outgoing_msg_id = {$user_id} 
                OR incoming_msg_id = {$user_id}) ORDER BY id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($user_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['status'] == "Offline") ? $offline = "offline" : $offline = "";
        ($user_id == $row['id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '
                <ul class="list-unstyled chat-list">
                    <li class="active">
                        <a href="chat_user.php?user_id='. $row['id'] .'">
                            <div class="d-flex align-items-start">
                                <div class="flex-shrink-0 user-img online align-self-center me-3">
                                                                <img src="assets/images/users/avatar-2.jpg" class="rounded-circle avatar-sm" alt="">
                                                                <span class="user-status"></span>
                                                            </div>

                                                            <div class="flex-grow-1 overflow-hidden">
                                                                <h5 class="text-truncate font-size-14 mb-1">'. $row['full_name'].'</h5>
                                                                <p class="text-truncate mb-0">'. $you . $msg .'</p>
                                                            </div>
                                                            <div class="flex-shrink-0">
                                                                <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                                                            </div>
                                                        </div>

                        </a>
                     </li>
                    </ul>

                ';
    }
?>