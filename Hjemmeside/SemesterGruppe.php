<?php
	session_start();
 ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Semesterprojekt template</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/gruppe.css">
	<!-- font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<script src="jquery/jquery.js"></script>
    <script>
        
    $(()=>{
    $('.groups').click(function(){
        var group = $(this).attr('id');
        var groupNumber = parseInt(group);
		$(".inputclass").html(`<input type="hidden" name="groupNumber" value="`+groupNumber+`" >`);
		console.log(groupNumber);
         
        $.ajax({
            url: 'includes/postGroups.php',
            type: "POST",
            data: ({groupid: groupNumber}),
            success: function(data){
                
                $(".posts-wrapper").html(data);
            }
    
        });
        
        $.ajax({
            url: 'includes/changeGroupName.php',
            type: "POST",
            data: ({groupid: groupNumber}),
            success: function(data){
                
                $(".groupName").html(data);
            }
    
        });
        
        
    }); 
           }); 
        
    </script>
</head>

<body>
	<header> <!-- Side bar -->
		<div class="sidebar-wrapper"> <!-- Full side bar container -->
			<ul> <!-- Unordered list to keep navigational elements -->
				<li id="home"><a href="SemesterForside.html"><img src="img/Homeicon.png"><p>Home</p></a></li> <!-- Home icon container -->
				<li id="groups"><a href="SemesterGruppe.html"><img src="img/Groupsicon.png"><p>Groups</p></a></li> <!-- Group icon container -->
				<li id="chat"><a href="SemesterChat.html"><img src="img/Chaticon.png"><p>Chat</p></a></li> <!-- Chat icon container -->
				<li id="profile"><a href="SemesterProfil.html"><img src="img/Profileicon.png"><p>Profile</p></a></li> <!-- profile icon container -->
			</ul>
		</div>

		<div class="top-bar">
			<ul>
				<li class="logo">SQUADT</li>
				<li><div class="searchbox-wrapper"><input type="search" placeholder="Search"></div></li>
				<li><img src="img/SettingsIcon.png" class="menuicons"></li>
				<li><a href="signUp.html"><img src="img/LogOutIcon.png" class="menuicons"></a></li>
			</ul>
		</div>
	</header>
	<main>
		
		<div class="topbar-groups">
                    <?php
                        include_once 'includes/dbh.inc.php';
                        $user_id = $_SESSION["id"];

                        $id_to_username = "SELECT name, id FROM groups LEFT JOIN members
                        ON groups.id = members.group_id WHERE members.user_id = $user_id;";

                        $result = $conn->query($id_to_username);
                       
                        while($row=$result->fetch_assoc())
                        {
                            ?>    
                                <div class="groups" id="<?php echo $row['id']?>"></div><p style="display: block;"><?php echo $row['name'] ?></p>
                            <?php  
                        }
                    ?>
		</div>
		<!-- ////////// kolonne 1 ///////// -->
		<div class="column-1">
			<div class="groupName"></div>
			<!--///////////////////////skriv et opslag////////////////////////////// -->
				<form action="includes/saveOpslag.inc.php" method="post">
                    <input type="text" name="titleInput">
                    <input type="text" name="postInput">
					<input type="hidden" name="userId" value="<?php echo $user_id ?>" >
					<div class="inputclass"></div>
					<button type="submit">post opslag</button>
				</form>
				
			<div class="posts-wrapper">
				<!--
				<div class="content">
						<div class="content-top">
							<div class="top-billede"></div>
							<ul>
								<li><h3>Navn på person</h3></li>
								<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></li>
							</ul>
						</div>
						<hr>
						<div class="content-comment">
							<div class="comment-billede"></div>
							<ul>
								<li><h5>Navn på person</h5></li>
								<li><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></li>
							</ul>
						</div>
				</div>
				-->
			</div>
		</div>
		 <!-- ////////// kolonne 2 ///////// -->
		<div class="column-2">
			<div class="session-wrapper">
				<h2>Gruppens træninger</h2>
				<div class="add-session" id="add-session-popup">
					<p>Add training</p>
					<!-- The Modal -->
					<div class="modal-wrapper">
						<!-- Modal content -->
						<div class="modal-content-wrapper">
							<div class="modal-header">
								<h2>Planlæg ny træning</h2>
								<a href="SemesterGruppe.html"><img src="img/close.png" alt="" class="close-modal"></a>
							</div>
							<div class="modal-body">
								<div id="day">
									<label>Hvornår vil du træne?</label>
									<select>
										<option>I dag</option>
										<option>I morgen</option>
										<option>I overmorgen</option>
									</select>
								</div>
								<div id="time">
									<label>Hvad tid?</label>
									<select>
										<option>kl. 6:00</option>
										<option>kl. 7:00</option>
										<option>kl. 8:00</option>
										<option>kl. 9:00</option>
										<option>kl. 10:00</option>
										<option>kl. 11:00</option>
										<option>kl. 12:00</option>
										<option>kl. 13:00</option>
										<option>kl. 14:00</option>
										<option>kl. 15:00</option>
										<option>kl. 16:00</option>
										<option>kl. 17:00</option>
										<option>kl. 18:00</option>
										<option>kl. 19:00</option>
										<option>kl. 20:00</option>
									</select>
								</div>
								<div class="planned-training">
									<h3></h3>
								</div>
							</div>
							<div class="modal-footer">
								<a href="SemesterGruppe.html"><h3>Click here when you are done</h3></a>
								<img src="img/forward.svg" alt="no image">
							</div>
					  </div>
					</div>

				</div>
			</div>
			<div class="traingingSessions-wrapper">
				<div class="training">
					<ul>
						<li><h3>Today</h3></li>
						<li><span>Time: 13:30</span> </li>
						<li>5 deltager</li>
						<li>Tryk for at deltage</li>
					</ul>
				</div>
			</div>

			<h2>Træningsmål</h2>

			<div class="traingingGoal-wrapper">
				<div class="progression-container">
					<div class="progression-bar">50%</div>
				</div>
				<br>
				<button id="progressbar-click">Update your goal</button>
			</div>
		</div>
=======
        <div id="pageBasedContent">
        </div>
>>>>>>> Stashed changes:Hjemmeside/Semester template.html

	</main>
    <script src="javascript/index.js" charset="utf-8" defer></script>
    <script src="jquery/jquery.js" ></script>
    <script>
    $("body").css ({
    'padding-top': $(".top-bar").outerHeight() + '800px';
    })
    </script>
	<script type="text/javascript">
	$(()=> {
        $("#groups").click(function(){
           $("#pageBasedContent").load("groups.html"); 
        });
        
		var value = 70; // et tal i procent
		$("#progressbar-click").click(()=>{
			var i = 0;
			if (i == 0) {
				i = 1;
				var elem = $(".progression-bar");
				var maxWidth = parseInt($(".progression-container").css("width"));
				var valuePixels = (maxWidth/100)*value;
				var currentWidth = parseInt($(".progression-bar").css("width"));
				var id = setInterval(frame, 10);
				function frame() {
					if ( currentWidth >= valuePixels) {
						clearInterval(id);
						i = 0;
					} else {
						currentWidth++;
						var currentWidthPercent = Math.ceil(currentWidth/maxWidth * 100);
						$(".progression-bar").css("width",currentWidth);
						// beregn procent fra 100 -> width
						$(".progression-bar").html(currentWidthPercent+"%");
					}
				}}})
        
		// Get the modal
		var modal = $(".modal-wrapper");
		// Get the button that opens the modal
		$("#add-session-popup").click(()=>{
			$(modal).css("display","flex");
		})
		$(".close-modal").click(()=>{
			$(modal).css("display","none");
		})

	});
	</script>
</body>
</html>
