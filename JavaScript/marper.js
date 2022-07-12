//each item in navbar
var scrollHome = document.querySelector('.navbarCustom-home');
var scrollProfile = document.querySelector('.navbarCustom-profile');
var scrollPortfolio = document.querySelector('.navbarCustom-portfolio');
var scrollConnect = document.querySelector('.navbarCustom-connect');

//each id of section
var intro = document.getElementById('intro');
var profile = document.getElementById('profile');
var portfolio = document.getElementById('portfolio');
var connect = document.getElementById('connect');

//navbar autoscroll to section feature
scrollHome.addEventListener("mouseenter", function(){
	intro.scrollIntoView({behavior: 'smooth', block:'center'});
})

scrollProfile.addEventListener("mouseenter", function(){
	profile.scrollIntoView({behavior: 'smooth', block:'center'});
})
scrollPortfolio.addEventListener("mouseenter", function(){
	portfolio.scrollIntoView({behavior: 'smooth', block:'center'});
})
scrollConnect.addEventListener("mouseenter", function(){
	connect.scrollIntoView({behavior: 'smooth', block:'center'});
})


//modal for connect
var modalLink = document.querySelector('.connectLink');
var modalBackground = document.querySelector('.modal-background');
var closeModal = document.querySelector('.close');

var modalSent = document.querySelector('.modal-background-sent');
var closeModal2 = document.querySelector('.close-2');



modalLink.addEventListener('click',function(){
	modalBackground.classList.add('bg-active');
})

closeModal.addEventListener('click',function(){
	modalBackground.classList.remove('bg-active');
})

closeModal2.addEventListener('click',function(){
	modalSent.classList.remove('bg-active-2');
})



