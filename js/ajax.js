$(document).ready(function(e){

		$('#empty_msg_span').hide();
		$('#emoticon_box').hide(); 
		$('#emoticon_undropper').hide();

		$('.input').addClass('animated shake');
		$('.well').addClass('animated shake');
		

		$('#welcome_user').slideUp(2000);
		$('#user_img').hide();
		$('#logo_img').show();
		$('#edit_profile').show();


		$.ajaxSetup({cache:false});

		//Loading chatlogs from DB
		setInterval(function(){
			$('#chat_logs').load('logs.php');
		}, 1000);


		//Loading online users from DB
		setInterval(function(){
			$.ajaxSetup({cache:false});
			$('#online_users').load('online_users.php');
		}, 700);

		//Loading offline users from DB
		setInterval(function(){
			$.ajaxSetup({cache:false});
			$('#offline_users').load('offline_users.php');
		}, 700);

	
		//Show emoticons
		$('#emoticon_dropper').on('click', function(){
			$('#emoticon_box').show();

			$('#emoticon_undropper').show();
			$('#emoticon_dropper').hide();
		});

		//pagination
		$('#load_more_span').on('click', function(){
			//$this->pageCounter();
		});

		//hide emoticons
		$('#emoticon_undropper').on('click', function(){
			$('#emoticon_box').hide();

			$('#emoticon_undropper').hide();
			$('#emoticon_dropper').show();
		});
		
		$('.each-user').on('click', function(){
			//clicked_name = $('.each-user').getElementsByTagName('');
		});

		//Hiding Login & SignUp background divs
		$('#background_div').hide();
		//$('#welcome_user').hide();



		//Make Enter key send message, cos button uses GET Request
		$("#msg_input_field").keypress(function(event){
			if (event.which == 13) {
				event.preventDefault();
				//$("form").submit();
				submit_chat();
			}
		});
		
	});

page_num = 0;
function pageCounter(){
	page_num++;
	//window.onload 
}

function getPageNum(){
	return page_num;
}