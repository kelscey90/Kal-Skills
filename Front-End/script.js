/*Responsive Navigation*/
var menubar = document.querySelector('#menubar');
var navbar = document.querySelector('#navbar');
var navbar_ul = document.querySelector('#navbar ul');

menubar.addEventListener("click", function(){
	navbar.classList.toggle("show");
	navbar_ul.classList.toggle("show");
});

/*Navigation Click*/
var btn = document.querySelectorAll('.btn');
for (var i = 0; i < btn.length; i++) {
	btn[i].addEventListener("click", function(){
		navbar.classList.toggle("show");
	});
}

/*Loading*/
var parallel = document.querySelector('.parallel');
window.addEventListener("load", function(){
	const loader = document.querySelector(".loader");
	loader.className += " hidden";
	parallel.style.animationName = "moveRight";
});

/*Active Class Pass onscoll*/
window.addEventListener('scroll', function(){ 
    scrollpos = window.scrollY;
    if(scrollpos < 350){
    	btn[0].classList.add("active");
    	btn[1].classList.remove("active");
    } else if(scrollpos <= 1000){
    	btn[1].classList.add("active");
    	btn[0].classList.remove("active");
    }
});

/*Hide Navigation onscroll*/
window.onscroll = function() {
	if (document.documentElement.scrollTop > 150 || document.body.scrollTop > 150) {
		    navbar.style.background = "#fff";
		    navbar.style.boxShadow = "0 0px 10px 0px #ddd";
	} else{
	  		navbar.style.background = "";
	  		navbar.style.boxShadow = "";
	  	}
}