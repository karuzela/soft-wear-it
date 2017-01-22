$(document).ready(function() {
  $('select').selectize();

  selectTshirt();

  $("#pizza-master-button").on("click", function() {
    UIkit.modal("#pizza-master-modal", {center:true}).show();
  })

  $("#pizza-master-show").on("click", function() {
    UIkit.modal("#pizza-master-design", {center:true}).show();
  })

  $(".button-close-zoom").on("click", function() {
    UIkit.modal("#pizza-master-design").hide();
  })
});

function selectTshirt () {
  $(".t-shirt__single").hover(function() {
    var tshirt = $(this).find(".t-shirts__piece");
    var button = $(this).find(".t-shirts__button");
    var src = (tshirt.attr('src') === './assets/img/tshirt.png')
      ? './assets/img/tshirt_active.png'
      : './assets/img/tshirt.png';
      
    tshirt.attr('src', src);
    button.toggleClass("active");
  });
}
