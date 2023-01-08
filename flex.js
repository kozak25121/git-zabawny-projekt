 $(window).scroll(async function()
{
    if($(this).scrollTop()>300) {
	$('.paseka').css('display','block');$('.paseka').css('position','fixed;');
	}
    else {
	$('.paseka').css('display','none');
	}
} );