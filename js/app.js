$(document).ready(function() {
  const header = document.getElementsByTagName("header")[0]
  const body = document.getElementsByTagName("body")[0]
  const nav = document.getElementById('menu')
  const toggle = document.getElementById('toggleIcon')
  const hamburger = document.getElementById('hamburger')
  const navigation = document.getElementById('navigation')
  const content = document.getElementById('content')
  
  function menuToggle() {
  	nav.classList.toggle('active')
  	toggle.classList.toggle('active')
  	
  	if (hamburger.classList.contains("fa-bars")) {
  		hamburger.classList.remove('fa-bars')
  		hamburger.classList.add('fa-times')
  	} else {
  		hamburger.classList.add('fa-bars')
  		hamburger.classList.remove('fa-times')
  		navigation.classList.remove('translate')
  	}
  }

  toggle.addEventListener('click', function(){
  	menuToggle()
  });

  function showlHeader() {
    header.classList.add('background')
  }

  function hidelHeader() {
    header.classList.remove('background')
  }

  window.addEventListener('scroll', function() {

    if ( window.scrollY > 100) {
      showlHeader()
    } else {
      hidelHeader()
    }

  });

  AOS.init();

});