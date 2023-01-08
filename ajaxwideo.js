function ajax(){
	var XHR = null;
	try
	{
		XHR = new XMLHttpRequest();
	}
	catch(e)
	{
			try
		{
			XHR = new  ActiveXObject("Msxm12.XMLHTTP");
		}catch(e2)
		{
				try
			{
				XHR = new  ActiveXObject("Microsoft.XMLHTTP");
			}catch(e3)
			{
				window.alert('błąd');
			}
		}
	}
	return XHR;
}

function wideo(add){
window.alert('link');
}


function wideoajax(add){
window.alert(add);
XHR= ajax();
	if ( XHR != null ){

		XHR.open("GET", add, true)
		
		XHR.onreadystatechange = function()
		{
			if (XHR.readyState == 4)
			{
				how = ilestron;
				ilestron ++ ;
				document.getElementById('wideo').innerHTML = XHR.responseText;
				return;
			}
		}
		XHR.send(null);
}
