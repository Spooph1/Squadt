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
	new User("Rasmus Bundsgaard", "Bundemand", 091296, "Sats Nyborgvej", users.length +1);
	new User("Simon Helsted Juul", "Juulemand", 090897, "Sats Nyborgvej", users.length +1);


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

	function AddGroup(name, fitnesscenter){
		this.fitnesscenter = fitnesscenter;
		users.forEach(function(fitnesscenter){
			if(users.fitnesscenter==fitnesscenter){
				groupmembers.push(users);
			}
		});
		new Group(name, groupmembers);
	}
	
	AddGroup("Sats Nyborgvej", "Sats Nyborgvej");
	
	console.log(users);
	console.log(groups);
