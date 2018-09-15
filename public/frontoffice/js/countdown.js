function makeTimer() {

			var endTime = new Date("14 mar 2019 6:00:00 GMT+01:00");			
			endTime = (Date.parse(endTime) / 1000);

			var now = new Date();
			now = (Date.parse(now) / 1000);

			var timeLeft = endTime - now;

			var days = Math.floor(timeLeft / 86400); 
			var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
			var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
			var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
  
			if (hours < "10") { hours = "0" + hours; }
			if (minutes < "10") { minutes = "0" + minutes; }
			if (seconds < "10") { seconds = "0" + seconds; }

			$("#days").html(days + "<span></span>");
			$("#hours").html(hours + "<span></span>");
			$("#minutes").html(minutes + "<span></span>");
			$("#seconds").html(seconds + "<span></span>");		

}
	
function makeTimere() {

			var endTimee = new Date("14 mar 2019 6:00:00 GMT+01:00");			
			endTimee = (Date.parse(endTimee) / 1000);

			var nowe = new Date();
			nowe = (Date.parse(nowe) / 1000);

			var timeLefte = endTimee - nowe;

			var dayss = Math.floor(timeLefte / 86400); 
			var hourss = Math.floor((timeLefte - (dayss * 86400)) / 3600);
			var minutess = Math.floor((timeLefte - (dayss * 86400) - (hourss * 3600 )) / 60);
			var secondss = Math.floor((timeLefte - (dayss * 86400) - (hourss * 3600) - (minutess * 60)));
  
			if (hourss < "10") { hourss = "0" + hourss; }
			if (minutess < "10") { minutess = "0" + minutess; }
			if (secondss < "10") { secondss = "0" + secondss; }

			$("#dayss").html(dayss + "<span>Days</span>");
			$("#hourss").html(hourss + "<span>Hours</span>");
			$("#minutess").html(minutess + "<span>Mins</span>");
			$("#secondss").html(secondss + "<span>Secs</span>");		

}

function makeTimer1() {

			var endTime1 = new Date("14 mar 2019 6:00:00 GMT+01:00");			
			endTime1 = (Date.parse(endTime1) / 1000);

			var now1 = new Date();
			now1 = (Date.parse(now1) / 1000);

			var timeLeft1 = endTime1 - now1;

			var days1 = Math.floor(timeLeft1 / 86400); 
			var hours1 = Math.floor((timeLeft1 - (days1 * 86400)) / 3600);
			var minutes1 = Math.floor((timeLeft1 - (days1 * 86400) - (hours1 * 3600 )) / 60);
			var seconds1 = Math.floor((timeLeft1 - (days1 * 86400) - (hours1 * 3600) - (minutes1 * 60)));
  
			if (hours1 < "10") { hours1 = "0" + hours1; }
			if (minutes1 < "10") { minutes1 = "0" + minutes1; }
			if (seconds1 < "10") { seconds1 = "0" + seconds1; }

			$("#days1").html(days1 + "<span>Days</span>");
			$("#hours1").html(hours1 + "<span>Hours</span>");
			$("#minutes1").html(minutes1 + "<span>Mins</span>");
			$("#seconds1").html(seconds1 + "<span>Secs</span>");		

}

	setInterval(function() { makeTimer(); }, 1000);
	setInterval(function() { makeTimere(); }, 1000);
	setInterval(function() { makeTimer1(); }, 1000);