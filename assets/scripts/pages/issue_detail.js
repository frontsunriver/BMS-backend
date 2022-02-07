$("#send_notify_input").on('keyup', function (e) {
	if (e.key === 'Enter' || e.keyCode === 13) {
		send_notify();
	}
});

function send_notify() {
	if($("#notify_id").val() != '') {
		if($("#send_notify_input").val() != "") {
			var html = $(".message-content").html();
			var content = $("#send_notify_input").val();
	    	html += `<div class="my-message">
			          <div class="chat">
			            <p>
			              ${$("#send_notify_input").val()}
			            </p>
			            <p class="date pull-right">${moment().format('YYYY-MM-DD')}</p>
			          </div>
			        </div>`;
			$(".message-content").html(html);
			$(".message-content").scrollTop($(".message-content")[0].scrollHeight);
			$("#send_notify_input").val('');
			$.ajax({
				url: base_url + "/admin/issue/sendNotify",
				method: 'get',
				data: {
					content: content,
					notify_id: $("#notify_id").val()
				},
				success: function(res){
					console.log(res);
				}
			})
		}
    	
    }
}