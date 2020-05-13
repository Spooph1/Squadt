// JavaScript Document
	var users = [];
	class User{
		constructor(name, username, birthday, fitnesscenter, usernumber){
			this.name = name;
			this.username = username;
			this.birthday = birthday;
			this.fitnesscenter = fitnesscenter;
			this.usernumber = usernumber;
			this.pushToArray = function(){
				users.push(this);
			}
			this.pushToArray();
            
		}
	}
	
	new User("Anders Bjørn Øbro", "AndersMorgenhård", 210403, "Sats Nyborgvej", users.length + 1);
	new User("Magnus Lindberg Christensen", "MacMiller", 120808, "SDU Fitness", users.length + 1);
	new User("Rasmus Bundsgaard", "Bundemand", 091296, "Sats Nyborgvej", users.length + 1);
	new User("Simon Helsted Juul", "Juulemand", 090897, "Sats Nyborgvej", users.length + 1);
	new User("Cecilie Nedergaard-Rasmussen", "Den smukkeste af dem alle", 120699, "SDU Fitness", users.length + 1);
	new User("Idefix", "Id", 161007, "Baghaven", users.length + 1);

	var groups = [];
	class Group{
		constructor(name, members){
			this.name = name;
			this.members = members;
		
		this.pushToArray = function(){
				groups.push(this);
			}
		this.pushToArray();
		}
	}
	
	var groupmembers = [];
	
	function FindTag(name, tag){
		for(var i = 0; i<users.length; i++){
			if(users[i].fitnesscenter===tag){
				groupmembers.push(users[i]);
			}
		}
		new Group(name,groupmembers);
		groupmembers = [];
	}

	FindTag("Sats Fitnessgruppe","Sats Nyborgvej");
	FindTag("SDU fitten", "SDU Fitness");
	new Group("Anders", users);
	var JSONUsers = JSON.stringify(users);
	var JSONGroups = JSON.stringify(groups);
	
	console.log(users);
	console.log(groups);
	console.log(JSONUsers);
	console.log(JSONGroups);

$(.profile-pic)function(){
    var width = $(.profile-pic).css("width");
    $(this).css("height":width);
}
