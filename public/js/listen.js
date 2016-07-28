var askForNewMessages = function() {
		$.ajax({
			method: 'GET',
			url: '/messages/to/ajax'
		}).done(function(messages) {
			if (messages.length !== $('.message').length) {
				var html = '';

				for (var i = 0; i < messages.length; i++) {
					html += '<div class="message">' +
	                        messages[i].body +
	                        '<br />' +
	                        'from ' + messages[i].user.name +
	                    '</div>';
				}

				$('#messages').html(html);					
			}
		});
	}

$(document).ready(function() {
	setInterval(askForNewMessages, 500);
});
