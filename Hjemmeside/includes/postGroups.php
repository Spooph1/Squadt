<?php
                    include_once 'dbh.inc.php';
                    
                    $groupid = $_POST['groupid'];
                   

                    $get_post = "SELECT users.name AS users_name, date, post, title FROM posts LEFT JOIN users
                    ON posts.author_id = users.id WHERE posts.groups_id = $groupid;";
                
                    $result1 = $conn->query($get_post);
                    while($row=$result1->fetch_assoc())
                        {
                            ?>    
                                <div class="content">
                                    <div class="content-top">
							        <div class="top-billede"></div>
							             <ul>
                                            <li><h2><?php echo $row['title']?></h2></li>
                                            <div class="contentNameDate">
                                                <li><h3><?php echo $row['users_name']?></h3></li>
                                                <li><span><?php echo $row['date']?></span></li>
                                            </div>
                                            <li><p><?php echo $row['post']?></p></li>
							             </ul>
                                    </div>
                                </div>


                        <?php  
                        
                        
                        }
                        
                        ?>

