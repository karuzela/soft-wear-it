$(document).ready(function() {
  $('select').selectize();

  selectTshirt();

  $('[id$="-button"]').on("click", function() {
    var modalChooseTshirt = $(this).closest(".t-shirts__piece-container").find('.modal-choose-t-shirt__container');
    UIkit.modal(modalChooseTshirt, {center:true}).show();
    $(".button-close-tshirt").on("click", function() {
      UIkit.modal(modalChooseTshirt).hide();
    })
  })

  $('[id$="-show"]').on("click", function() {
    var modalZoom = $(this).closest(".t-shirts__piece-container").find('.modal-zoom__container');
    UIkit.modal(modalZoom, {center:true}).show();
    $(".button-close-zoom").on("click", function() {
      UIkit.modal(modalZoom).hide();
    })
  })

  $('*[class^="lang-version-"]').click(function() {
    $('*[class^="lang-version-"]').toggleClass("active");
  })

  $(".submit").on("click", function() {
    var _this = $(this);
    var form = _this.parents('form');
    var formData = new FormData(form[0]);

    $.ajax({
      url: 'upload.php',
      type: 'POST',
      data: formData,
      async: false,
      beforeSubmit: function(){
        $('.errors').html('');
      },
      success: function (data) {
        if(data.status == 1){
          alert('success');
        } else {
          $('.errors').html(data.errors);
        }
      },
      cache: false,
      contentType: false,
      processData: false
    });
    return false;
  });

  inputFileNamePreviewInit();
});


function selectTshirt() {
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

function inputFileNamePreviewInit() {
  $('[id^="uploadCV-"]').change(function (e) {
    var $this = $(this);
    $this.next().html($this.val().split('\\').pop());
  });
}


