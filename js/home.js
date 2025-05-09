document.addEventListener("DOMContentLoaded", function () {
  const header = document.getElementsByTagName("header")[0];
  const categories = document.getElementById("categories");
  const projects = document.getElementsByClassName("link_to_project");
  const containerProjects =
    document.getElementsByClassName("container_projects");

  function showlHeader() {
    header.classList.add("background");
  }

  function hidelHeader() {
    header.classList.remove("background");
  }

  window.addEventListener("scroll", function () {
    if (window.scrollY > 100) {
      showlHeader();
      showCategories();
    } else {
      hidelHeader();
      hideCategories();
    }
  });

  function showCategories() {
    categories.classList.add("fixed");
  }

  function hideCategories() {
    categories.classList.remove("fixed");
  }

  const videoModal = document.getElementById("videoModal");

  // Función para carga diferida de videos
  videoModal.addEventListener("show.bs.modal", (event) => {
    const button = event.relatedTarget;
    const videoId = button.getAttribute("data-video-id");
    const hash = button.getAttribute("data-hash");

    const iframe = document.createElement("iframe");
    iframe.src = `https://player.vimeo.com/video/${videoId}?h=${hash}`;
    iframe.setAttribute("frameborder", "0");
    iframe.setAttribute("allow", "autoplay; fullscreen; picture-in-picture");
    iframe.setAttribute("allowfullscreen", "");
    iframe.style.position = "absolute";
    iframe.style.top = 0;
    iframe.style.left = 0;
    iframe.style.width = "100%";
    iframe.style.height = "100%";

    document.getElementById("modal-video-container").appendChild(iframe);
  });

  videoModal.addEventListener("hidden.bs.modal", () => {
    document.getElementById("modal-video-container").innerHTML = "";
  });

  // init Isotope (plugin de filtrado de categorias)
  var $grid = $(".grid").isotope({
    itemSelector: ".element-item",
    stagger: 30,
    transitionDuration: 400,
  });

  $grid.isotope({ filter: ".commercial" });

  // filter items on button click
  $(".filter-button-group").on("click", "button", function () {
    var filterValue = $(this).attr("data-filter");

    // Sacar la clase 'active' de todos los botones
    $(".btn-category").removeClass("active");

    // Poner la clase 'active' al boton presionado
    $(this).addClass("active");

    $grid.isotope({ filter: filterValue });
  });
});
