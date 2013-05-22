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
	replyText = replyTextUrlArray.join("%20");
	replyLink = 'submitReply.php?submitReply=' + replyText;
	$('#pageDiv').empty();
	if($('#pageDiv').html() == '')
	{
		$('#pageDiv').load(replyLink);
	}
});

//update profile ajaxy stuff
$(document).on('click', '#updateProfile', function(){
	newNickname = $('#nickname').val();
	newNicknameArray = newNickname.split(' ');
	newNickname = newNicknameArray.join("%20");
	newNicknameLink = 'updateProfile.php?nickname=' + newNickname;
	$('#pageDiv').empty();
	if($('#pageDiv').html() == '')
	{
		$('#pageDiv').load(newNicknameLink);
	}
});

//submits blog post through ajax. 
$(document).on('click', '#submitBlogPost', function(){
	blogTitle = $('#blogTitle').val();
	blogTitleArray = blogTitle.split(' ');
	blogTitle = blogTitleArray.join("%20");
	blogText = $('#blogText').val();
	blogTextArray = blogText.split(' ')
	blogText = blogTextArray.join("%20");
	newBlogPostLink = 'submitBlogPost.php?blogTitle=' + blogTitle + '&blogText=' + blogText
	$('#pageDiv').empty();
	if($('#pageDiv').html() == '')
	{
		$('#pageDiv').load(newBlogPostLink);
	}
});
	
		
