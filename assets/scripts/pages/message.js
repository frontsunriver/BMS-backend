function onChanelSelect(id) {
	$("#message_id").val(id);
	$.ajax({
		url: base_url + "/admin/message/getMessageDetails",
		method: 'get',
		data: {
			id: id
		},
		success: function(res) {
			res = JSON.parse(res);
			if(res.length > 0) {
				var content = $(".message-content");
				var html = "";
				res.map(item => {
					if(item['user_id'] == userid) {
						html += `<div class="my-message">
						          <div class="chat">
						            <p>
						              ${item['content']}
						            </p>
						            <p class="date pull-right">${item['reg_date']}</p>
						          </div>
						        </div>`;
					}else {
						html += `<div class="other-message">
						          <div class="chat">
						            <p>
						              ${item['content']}
						            </p>
						            <p class="date pull-right">${item['reg_date']}</p>
						          </div>
						        </div>`;
					}
				});
				$(".message-content").html(html);
				$(".message-content").scrollTop($(".message-content")[0].scrollHeight);
			}
		}
	})
}

$("#send_message_input").on('keyup', function (e) {
	if (e.key === 'Enter' || e.keyCode === 13) {
		send_message();
	}
});

function send_message() {
	if($("#message_id").val() != '') {
		if($("#send_message_input").val() != "") {
			var html = $(".message-content").html();
			var content = $("#send_message_input").val();
	    	html += `<div class="my-message">
			          <div class="chat">
			            <p>
			              ${$("#send_message_input").val()}
			            </p>
			            <p class="date pull-right">${moment().format('YYYY-MM-DD')}</p>
			          </div>
			        </div>`;
			$(".message-content").html(html);
			$(".message-content").scrollTop($(".message-content")[0].scrollHeight);
			$("#send_message_input").val('');
			$.ajax({
				url: base_url + "/admin/message/sendMessage",
				method: 'get',
				data: {
					user_id: userid,
					content: content,
					message_id: $("#message_id").val()
				},
				success: function(res){
					console.log(res);
				}
			})
		}
    	
    }
}