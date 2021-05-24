$(document).ready(function(){
		setInterval("contact_poll()",5000);
	});
			
	var timeout_id=0;
	
	function oldmsg( receiver_id ) {
		document.getElementById('send_button').setAttribute('onclick','sendmsg('+receiver_id+')');
		console.log(receiver_id,timeout_id,"timeout");
		
		datatosend = 'rid='+receiver_id;
		$.ajax({
			url: 'oldmsg.php',
			type: 'POST',
			data: datatosend,
			async: true,
			datatype: 'json',
			success: function(data) {
				//console.log(data);
				var parse_data = JSON.parse(data);
				
				var box3_html = "";
				if(parse_data[0].is_active == 0 )
					box3_html += "<div class='subelement31' style='background:blue'></div>";
				else
					box3_html += "<div class='subelement31' style='background:green'></div>";
				box3_html += "<div class='subelement32 round-img'><img src='profile_imgs/"+parse_data[0].prof_img+"' style='width:100%;height:100%;'></div><div class='subelement33'><h1>"+parse_data[0].username+"</h1>";
				$("#box3").empty();
				$("#box3").append(box3_html);
				
				var msg = "";
				
				for( i=2;i<parse_data.length;i++ ) {
					if( parse_data[i].sender_id == receiver_id )
						msg += "<div class='container' style='margin-left:2%;'><img src='profile_imgs/"+parse_data[0].prof_img+"' style='width:100%;'><p>"+parse_data[i].msg+"</p><span class='time-rigth'>"+parse_data[i].time+"</span></div>";
					if( parse_data[i].sender_id == parse_data[1].user_id)
						msg += "<div class='container darker' style='margin-left:45%;'><img src='profile_imgs/"+parse_data[1].prof_img+"'  class='right' style='width:100%;'><p>"+parse_data[i].msg+"</p><span class='time-left'>"+parse_data[i].time+"</span></div>";
				}
				$("#box4").empty();
				$("#box4").append(msg);
			},
		});
		
		//newmsg(receiver_id);
		if( timeout_id ) {
			console.log(timeout_id,"yogeeswar");
			clearInterval(timeout_id);
		}
		timeout_id = setInterval("newmsg("+receiver_id+")",5000);
		//console.log("id",timeout_id);
	}
	
	function newmsg(receiver_id) {
		var datatosend = 'rid='+receiver_id;
		msg = "";
		console.log(datatosend);
		$.ajax({
			url: 'newmsg.php',
			type: 'POST',
			datatype: 'json',
			data: datatosend,
			success: function(data) {
				//console.log(data);
				var parse_data = JSON.parse(data);
				for( i=2;i<parse_data.length;i++ ) {
					if( parse_data[i].sender_id == receiver_id )
						msg += "<div class='container' style='margin-left:2%;'><img src='profile_imgs/"+parse_data[0].prof_img+"' style='width:100%;'><p>"+parse_data[i].msg+"</p><span class='time-rigth'>"+parse_data[i].time+"</span></div>";
					if( parse_data[i].sender_id == parse_data[1].user_id)
						msg += "<div class='container darker' style='margin-left:45%;'><img src='profile_imgs/"+parse_data[0].prof_img+"'  class='right' style='width:100%;'><p>"+parse_data[i].msg+"</p><span class='time-left'>"+parse_data[i].time+"</span></div>";
				}
				$("#box4").append(msg);
			},
			complete: function(data) {
			
			}
		});
	}
	
	function sendmsg(receiver_id) {
		var message = $("#msg").val();
		datatosend = 'msg='+message+'&rid='+receiver_id;
		console.log(datatosend);
		$.ajax({
			url:'sendmsg.php',
			type:'POST',
			data:datatosend,
			async:true,
			success:function(data) {
				//document.getElementById("yourmsg").innerHTML=data[0];
				console.log(data);
			},
		});
		$("#msg").val("");
	}
	
	function contact_poll() {
		$.ajax({
			url: 'contact_poll.php',
			type: 'POST',
			datatype: 'json',
			success: function(data) {
				//console.log(data);
				var parse_data = JSON.parse(data);
				var contacts_html = "";
				for( i=0;i<parse_data.length;i++ ) {
					contacts_html += "<li onclick='oldmsg("+parse_data[i].user_id+")'>";
					if( parse_data[i].is_active == 0 )
						contacts_html += "<div class='pelement1' style='background:blue;'></div>";
					else
						contacts_html += "<div class='pelement1' style='background:green;'></div>";
					contacts_html += "<div class='pelement2'><img src='profile_imgs/"+parse_data[i].prof_img+"' style='width:100%;height:100%;'></div><div class='pelement3'><h1>"+parse_data[i].username+"</h1></div>";
					if( parse_data[i].msg_count!=null)
					contacts_html += "<div class='pelement4'><h1>"+parse_data[i].msg_count+"</h1></div></li>";
				}
				$("#contacts").empty();
				$("#contacts").append(contacts_html);
			},
			complete:function(data) {
				//setTimeout(contact_poll,5000);
			}
		});
	}