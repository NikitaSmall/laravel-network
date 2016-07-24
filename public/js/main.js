$(document).ready(function() {
	$('#friend-search').keyup(function() {
		var name = $('#friend-search').val();

		$.ajax({
			method: 'GET',
			url: '/search/friend?username=' + name,
		}).done(function (users) {
			var html = '';

			for (var i = 0; i < users.length; i++) {
				html += '<div>' + users[i].name + 
					' <a href="http://localhost:8000/messages/new/' + users[i].id + '">' + 
					 'Send a message</a>' + 
                            '</div>';
			}
			$('#friends').html(html);
		});
	});
});