<?php
                    include_once 'dbh.inc.php';
                    
                    $groupid = $_POST['groupid'];
                   

                    $get_name = "SELECT name FROM groups WHERE id = $groupid;";
                
                    $result1 = $conn->query($get_name);
                    while($row=$result1->fetch_assoc())
                        {
                            ?>    
                            <h1><?php echo $row['name'] ?></h1>

                        <?php  
                        
                        
                        }
                        
                        ?>

