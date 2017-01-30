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

  $('.checkbox-container').find("label").click(function() {
    $('.checkbox-container').find("label").html("Wyrażam zgodę na przetwarzanie moich danych osobowych przez Connectis sp. z o. o. (Al. Jerozolimskie 96, 00-807 Warszawa) oraz Asistera Poland sp. z o. o. (ul. Nowogrodzka 50/515, 00-695 Warszawa), współadministratorów zbioru danych osobowych, w celach rekrutacyjnych. Współadministratorzy zapewniają dostęp do danych osobowych oraz umożliwiają ich poprawianie. Podanie danych osobowych jest dobrowolne. Oświadczam, że zostałem poinformowany o uprawnieniach przysługujących mi na podstawie ustawy z dnia 29 sierpnia 1997 r. o ochronie danych osobowych (tekst jednolity: Dz.U. z 2015 r., poz. 2135 z późn. zm.) oraz że wgląd do moich danych mogą posiadać potencjalni pracodawcy będący klientami Connectis sp. z o. o. i Asistera sp. z o. o.");
  })
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


