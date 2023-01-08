function smoothScroll(target,duration){
	try{ var targetPos = target.offsetTop;}catch(error){ var targetPos = document.querySelector(target).offsetTop; }
	var startPosition = window.pageYOffset;
	var distance = targetPos - startPosition;
	var st = null;
	function animation(currentTime){
		if(st === null) 
			st = currentTime;
		var te = currentTime - st;
		var run = ease(te,startPosition,distance,duration);
		window.scrollTo(0,run);
		if(te < duration) requestAnimationFrame(animation);
	}
	function ease(t,b,c,d){
		t/=d/2;
		if (t<1) return c/2*t*t+b;
		t--;
		return -c/2*(t*(t-2)-1)+b;
	}
	
	requestAnimationFrame(animation);
}

document.getElementById('offfoto').addEventListener('mouseup', downcase);
document.getElementById('offfoto').addEventListener('mousedown', uppers);
document.getElementById('offfoto').addEventListener('touchstart', uppers);
document.getElementById('offfoto').addEventListener('touchend', downcase);
let poprzednio;
function uppers(e) {
			poprzednio = e.clientX;
			if(!poprzednio)
			poprzednio = e.changedTouches[0].clientX;
}

function downcase(e) {
			var rurznica = poprzednio - e.clientX;
			if(!rurznica && rurznica != 0)
			var rurznica = (poprzednio - e.changedTouches[0].clientX);
		if( rurznica < -10){
			left();
		}
		if( rurznica > 10){
			right();
		}
		if( rurznica < 2 && rurznica > -2){
			tera.data.id='';
			document.getElementById("offfoto").style.display = "none";
			clearInterval(id);
		}
}

const obs = new IntersectionObserver(entries =>{
	entries.forEach(en =>{
			en.target.classList.toggle("show", en.isIntersecting);
			if(typeof en.target.firstElementChild.src === 'undefined'){
				if(en.isIntersecting){
					en.target.querySelector('source').src = en.target.querySelector('source').dataset.src;
					en.target.querySelector('video').load();
					en.target.querySelector('video').play();
				}else{
					en.target.querySelector('source').src = '';
					en.target.querySelector('video').pause();
				}
				
			}else{
				if(en.isIntersecting){
					en.target.querySelector('img').src = en.target.querySelector('img').dataset.src;
				}else{
					en.target.querySelector('img').src = en.target.querySelector('img').dataset.class;
				}
			}
	})
},{
	threshold: 0,
	rootMargin: "300px",
})

let uns;
function kurwa_obserwer(){
	uns = document.querySelectorAll('.un');
	uns.forEach(un =>{
			obs.observe(un);
	})
}
setInterval(kurwa_obserwer,100);

if(document.cookie.split('shows=')[1] === 'undefined'){
	document.cookie = "shows=1 ; expires=Thu, 18 Dec 3022 12:00:00 UTC";
}
let shows = parseInt(document.cookie.split('shows=')[1]);
function show(){
	let inputas = document.querySelectorAll('.inputas');
	if(shows){ shows = false; document.cookie = "shows=0 ; expires=Thu, 18 Dec 3022 12:00:00 UTC"; } else { shows = true; document.cookie = "shows=1 ; expires=Thu, 18 Dec 3022 12:00:00 UTC"; }
	inputas.forEach(un =>{
		un.classList.toggle("inputas-N", shows);
	})
	
}

function showWH(){
	let inputas = document.querySelectorAll('.inputas');
	inputas.forEach(un =>{
		un.classList.toggle("inputas-N", shows);
	})
	
}