$(document).ready(function(){
	$('a').click(function(event) {
		event.preventDefault();
		$('#welcome').hide();
		welcomeMessage = $('#welcome').html();
	});
});
$(document).on('click', '#loadMe', function()
{
	//get url from clicked object
	urlName = $(this).attr('href');
	//empty pageDiv Element
	$('#pageDiv').empty();
	//load pageDiv Element
	if($('#pageDiv').html() == '')
	{
		$('#pageDiv').load(urlName)
		$('#pageDiv').prepend(welcomeMessage)
	}
	
});

$(document).on('click', '#submitNewThread', function(){
	postTitle = $('#postTitle').val();
	postText = $('#postText').val();
	postTextUrlArray = postText.split(' ');
	postText = postTextUrlArray.join("%20");
	postTitleUrlArray = postTitle.split(' ');
	postTitle = postTitleUrlArray.join("%20");
	submitData = 'submitPost.php?' + "postTitle=" + postTitle + "&" + "postText=" + postText
	$('#pageDiv').empty();
	if($('#pageDiv').html() == '')
	{
		$('#pageDiv').load(submitData)
	}
	
});
	
$(document).on('click', '#replyToThread', function(){
	replyText = $('#replyText').val();
	replyTextUrlArray = replyText.split(' ');
	replytext = replyTextUrlArray.join("%20");
	replyLink = 'submitReply.php?submitReply=' + replyText;
	$('#pageDiv').empty();
	if($('#pageDiv').html() == '')
	{
		$('#pageDiv').load(replyLink);
	}
});

		
