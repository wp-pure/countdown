

function getTimeRemaining(endtime) {
	var total = Date.parse(endtime) - Date.parse(new Date());
	var seconds = Math.floor((total / 1000) % 60);
	var minutes = Math.floor((total / 1000 / 60) % 60);
	var hours = Math.floor((total / (1000 * 60 * 60)) % 24);
	var days = Math.floor(total / (1000 * 60 * 60 * 24));

	return {
		total,
		days,
		hours,
		minutes,
		seconds
	};
}



// onload, start all the countdown clocks
jQuery(document).ready(function($){

	$('.countdown-clock').each(function(){

		var countdown_to = $(this).data( 'date' );
		var deadline = new Date( Date.parse( countdown_to ) );

		var days = $(this).find('.days');
		var hours = $(this).find('.hours');
		var minutes = $(this).find('.minutes');
		var seconds = $(this).find('.seconds');

		var updateClock = function() {
			var t = getTimeRemaining( deadline );

			days.text( t.days );
			hours.text( ('0' + t.hours).slice(-2) );
			minutes.text( ('0' + t.minutes).slice(-2) );
			seconds.text( ('0' + t.seconds).slice(-2) );

			if (t.total <= 0) {
			  clearInterval( timeinterval );
			}
		}

		updateClock();
		var timeinterval = setInterval( updateClock, 1000 );

	})

});



