$(document).ready(function() {
  
  const header = document.getElementsByTagName("header")[0]
  const categories = document.getElementById('categories')
  const projects = document.getElementsByClassName("link_to_project");
  
  function showlHeader() {
    header.classList.add('background')
  }

  function hidelHeader() {
    header.classList.remove('background')
  }

  window.addEventListener('scroll', function() {

    if ( window.scrollY > 100) {
      showlHeader()
      showCategories()
    } else {
      hidelHeader()
      hideCategories()
    }

  });

  function showCategories() {
    categories.classList.add('fixed')
  }

  function hideCategories() {
    categories.classList.remove('fixed')
  }

  // Funciones para capturar proyectos y pausar videos al cerrar el modal
  Array.from(projects).forEach(project => {
    
    project.addEventListener('click', function(e){
      var projectActual = project.getAttribute('data-bs-target')

      $(projectActual).on('hidden.bs.modal', function (e) {

        let projectSinHashtag = projectActual.slice(1)

        var div = document.getElementById(projectSinHashtag)
        var iframes = div.getElementsByTagName("iframe")

        Array.from(iframes).forEach(function callback(iframe, index) {
          var video = div.getElementsByTagName("iframe")[index].contentWindow
          video.postMessage('{"method":"pause"}', '*')
          
        })

      })

    })

  })

  // init Isotope (plugin de filtrado de categorias)
  var $grid = $('.grid').isotope({
    itemSelector: '.element-item',
    stagger: 30,
    transitionDuration: 400
  });
  // filter items on button click
  $('.filter-button-group').on( 'click', 'button', function() {
    var filterValue = $(this).attr('data-filter');

    // Sacar la clase 'active' de todos los botones
    $('.btn-category').removeClass('active')

    // Poner la clase 'active' al boton presionado
    $(this).addClass('active')

    $grid.isotope({ filter: filterValue });
  });

});