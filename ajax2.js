window.onload = ajax;
window.onload = scrollHandler;

let zap = 1;

let potwierdzenie = true;
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
        window.alert('huj');
      }
    }
  }
  return XHR;
}

async function addfoto()
{
XHR= ajax();
  if ( XHR != null ){
	
  XHR.open("POST", "obrazy2.php", true);
	XHR.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	
//	XHR.addEventListener("progress", updateProgress, false);
//	async function updateProgress (oEvent) {
//			var percentComplete = oEvent.loaded / oEvent.total * 100;
//	}
	
   XHR.onreadystatechange = async function()
    {
      if (XHR.readyState == 4 && XHR.responseText)
      {
        document.getElementById('imagines').innerHTML="";
        await document.getElementById('imagines').insertAdjacentHTML('beforeend',XHR.responseText);
        potwierdzenie = true;
        showWH();
        zap++;
      }
    }
	XHR.send("zap="+zap);
  } 
}

var i=0;
async function scrollHandler()
{
        setTimeout(addfoto, 9);
}

$("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
			  xhr: function()
			  {
				var xhr = new window.XMLHttpRequest();
				xhr.upload.addEventListener("progress", function(evt){
					var percentComplete = Math.floor(evt.loaded / evt.total * 100);
								document.getElementById('loading').value = percentComplete;

				}, false);
				xhr.upload.addEventListener("load", function(){
								alert('done');
								ileplikow();
								setInterval(ileplikow,10000);
						}, false);
				return xhr;
			  },
            type: 'POST',
            url: 'plik.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false
        });
});  
  
  
	
async function ileplikow()
{
var XHR2 = ajax();
  if ( XHR2 != null ){
	
    XHR2.open("POST", "ileplikow.php", true);
    XHR2.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	
    XHR2.onreadystatechange = async function()
    {
      if (XHR2.readyState == 4 && XHR2.responseText)
      {
        document.getElementById('ileplikow').innerHTML = XHR2.responseText;
      }
    }
    XHR2.send("zap="+zap);
} 
}

function edit_zap1(x){
  zap =  '`url` LIKE "%'+x.value+'%"';
  document.getElementById('imagines').innerHTML = '';
  ileplikow();
}
function edit_zap2(x){
  zap = zap+' OR `url` LIKE "%'+x.value+'%"';
  document.getElementById('imagines').innerHTML = '';
  ileplikow();
}
