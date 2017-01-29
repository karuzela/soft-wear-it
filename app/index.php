<?php include_once("shirts.php") ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="./assets/css/uikit.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.default.css"/>
  <link rel="stylesheet" href="./assets/css/main.css"/>
  <script src="./assets/scripts/jquery.js"></script>
  <script src="./assets/scripts/uikit.min.js"></script>
  <script src="https://use.fontawesome.com/e126d2c437.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
  <script src="./assets/scripts/app.js"></script>
  <title>Soft Wear It</title>
  <meta name="keywords" content="t-shirts, geek, zabawne koszulki, design, branża IT">
<<<<<<< HEAD
  <meta name="description" content="Jesteś specjalistą IT? Wykorzystaj to, żeby dostać wyjątkowy T-shirt!">
=======
  <meta name="description" content="Szukasz wyjątkowego stylu? Prześlij nam swoje CV i odbierz wyjątkowy t-shirt">
>>>>>>> 102703763ce276af1024a356f8b6bfd94d1b9cb7
</head>

<body>
  <div class="intro-page">
    <div class="intro-page__additional-background">
      <div class="intro-page__content uk-container uk-flex uk-flex-center uk-flex-column uk-flex-space-between">
        <div class="content__logo-container">
          <img src="./assets/img/logo.png"/>
<<<<<<< HEAD
          <p>
            <span class="lang-version-pl">pl</span>
            <span class="lang-version-en">en</span>
          </p>
        </div>
        <div class="content__copy-container">
          <h1 class="">Jesteś specjalistą IT?
          </h1>
          <p>Wykorzystaj to, żeby 
            <span>dostać wyjątkowy T-shirt! 
=======
        </div>
        <div class="content__copy-container">
          <h1 class="">Szukasz wyjątkowego stylu?
          </h1>
          <p>Prześlij nam swoje CV i 
            <span>odbierz wyjątkowy t-shirt
>>>>>>> 102703763ce276af1024a356f8b6bfd94d1b9cb7
            </span>
          </p>
        </div>
        <div class="content__instructions-container">
          <div class="content__instruction">
<<<<<<< HEAD
            <p>WYBIERZ T-SHIRT I ZUPLOADUJ CV</p>
=======
            <p>wybierz koszulkę</p>
>>>>>>> 102703763ce276af1024a356f8b6bfd94d1b9cb7
            <div class=instruction__number>
              <span>1</span>
            </div>
          </div>
          <div class="content__instruction">
<<<<<<< HEAD
            <p>ROZWIĄŻ KRÓTKI TEST, KTÓRY DOSTANIESZ NA MAILA</p>
=======
            <p>sprawdź swoją wiedzę</p>
>>>>>>> 102703763ce276af1024a356f8b6bfd94d1b9cb7
            <div class=instruction__number>
              <span>2</span>
            </div>
          </div>
          <div class="content__instruction">
<<<<<<< HEAD
            <p>ODBIERZ T-SHIRT</p>
=======
            <p>dołącz do naszej społeczności</p>
>>>>>>> 102703763ce276af1024a356f8b6bfd94d1b9cb7
            <div class=instruction__number>
              <span>3</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<<<<<<< HEAD

=======
>>>>>>> 102703763ce276af1024a356f8b6bfd94d1b9cb7
  <div class="main-page">
    <div class="main-page__content uk-flex uk-flex-column uk-flex-center">
      <div class="main-page__header">
        <h1>wybierz koszulkę</h1>
      </div>
      <div class="t-shirts__container uk-flex uk-flex-center uk-flex-wrap">

<<<<<<< HEAD
        <?php foreach($shirts as $key => $shirt):?>
          <div class="t-shirts__piece-container uk-flex uk-flex-center uk-flex-column uk-flex-middle">
          <!-- modal with t-shirt selection -->
            <div id="<?php echo $shirt['name'];?>-modal" class="uk-modal modal-choose-t-shirt__container" uk-modal>
              <div class="uk-modal-dialog uk-modal-body modal-choose-tshirt">
                <img src="./assets/img/button-close.png" class="button-close-tshirt"/>
                <div class="uk-grid">
                  <div class="uk-width-medium-1-2 uk-width-1-1">
                    <div class="t-shirt__single">
                      <div class="t-shirt__white--modal uk-flex uk-flex-middle uk-flex-center">
                        <div class="t-shirt__design--modal <?php echo $shirt['class'];?>">
                        </div>
                      </div>
                    </div>
                  </div>
                  <form method="post" enctype="multipart/form-data">
                    <div class="modal-form-container uk-width-medium-1-2 uk-width-1-1">
                      <h1 class="modal-header"><?php echo $shirt['name'];?></h1>
                      <h2 class="design-by"><?php echo $shirt['author'];?></h2>
                      
                      <input type="hidden" name="type" value="<?php echo $shirt['name'];?>"/>
                        <div class="modal-form__field">
                          <select name="tshirt-size">
                            <option value="S">Wybierz rozmiar S</option>
                            <option value="M">Wybierz rozmiar M</option>
                            <option value="L">Wybierz rozmiar L</option>
                            <option value="XL">Wybierz rozmiar XL</option>
                          </select> 
                        </div>
                        <div class="modal-form__field">
                          <input name="email" type="email" pattern="[^ @]*@[^ @]*" placeholder="Podaj email"/>
                        </div>
                        <div class="modal-form__field modal-form__upload">
                          <input type="file" name="cv" id="uploadCV-<?php echo $shirt['class'];?>"/>
                          <label id="label__uploadCV-<?php echo $shirt['class'];?>" for="uploadCV-<?php echo $shirt['class'];?>">Załącz CV</label>
                          <div class="tooltip">
                            <span class="tooltiptext">Zuploaduj swoje CV do naszej bazy specjalistów IT. W odpowiedzi wyślemy do Ciebie krótki test, po rozwiązaniu którego otrzymasz wybrany przez siebie T-shirt.</span>
                          </div>
                        </div>
                        <div class="modal-form__field">
                          <button class="modal__button submit">Wyślij</button>
                        </div>
                        <div class="errors"></div>
                    </div>
                  </form>
                </div>
                <div class="uk-grid">
                  <div class="uk-width-1-1">
                    <div class="checkbox-container">
                      <input type="checkbox" id="checkbox-<?php echo $shirt['class'];?>" name="agreement" />
                      <label for="checkbox-<?php echo $shirt['class'];?>">Wyrażam zgodę na przetwarzanie moich danych osobowych przez Connectis sp. z o. o. (Al. Jerozolimskie 96, 00-807 Warszawa) oraz Asistera Poland sp. z o. o. (ul. Nowogrodzka 50/515, 00-695 Warszawa), współadministratorów zbioru danych osobowych, w celach rekrutacyjnych. Współadministratorzy zapewniają dostęp do danych osobowych oraz umożliwiają ich poprawianie. Podanie danych osobowych jest dobrowolne. Oświadczam, że zostałem poinformowany o uprawnieniach przysługujących mi na podstawie ustawy z dnia 29 sierpnia 1997 r. o ochronie danych osobowych (tekst jednolity: Dz.U. z 2015 r., poz. 2135 z późn. zm.) oraz że wgląd do moich danych mogą posiadać potencjalni pracodawcy będący klientami Connectis sp. z o. o. i Asistera sp. z o. o.</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- modal with design zoom -->
            <div id="<?php echo $shirt['class'];?>-design" class="uk-modal modal-zoom__container" uk-modal>
              <div class="uk-modal-dialog uk-modal-body modal-zoom">
                <img src="./assets/img/<?php echo $shirt['img'];?>.jpg"/>
                <img src="./assets/img/button-close.png" class="button-close-zoom"/>
              </div>
            </div> 
            <a href="#<?php echo $shirt['class'];?>-modal" data-uk-modal="target: #<?php echo $shirt['class'];?>-modal" id="<?php echo $shirt['class'];?>-button">
              <div class="t-shirt__single">
                <img src="./assets/img/tshirt.png" class="t-shirts__piece"/>
                <img src="./assets/img/<?php echo $shirt['img'];?>.jpg" class="t-shirts__design"/>
                <div class="t-shirts__button">
                  <span>wybieram</span>
                  <a href="<?php echo $shirt['class'];?>-design" data-uk-modal="target: #<?php echo $shirt['class'];?>-design" id="<?php echo $shirt['class'];?>-show" class="zoom-icon">
                    <img src="./assets/img/zoom-button.png"/>
                  </a>
                </div>
              </div>
            </a>
            <hr class="hr">
            <div class="t-shirts__copy">
              <h2><?php echo $shirt['name'];?></h2>
              <p><?php echo $shirt['author'];?></p>
            </div>
          </div>
        <?php endforeach;?>
=======

        <?php foreach($shirts as $key => $shirt):?>
           <div class="t-shirts__piece-container uk-flex uk-flex-center uk-flex-column uk-flex-middle">
          <!-- modal with t-shirt selection -->
          <div id="<?php echo $shirt['name'];?>-modal" class="uk-modal modal-choose-t-shirt__container" uk-modal>
            <div class="uk-modal-dialog uk-modal-body modal-choose-tshirt">
              <img src="./assets/img/button-close.png" class="button-close-tshirt"/>
              <div class="uk-grid">
                <div class="uk-width-medium-1-2 uk-width-1-1">
                  <div class="t-shirt__single">
                    <div class="t-shirt__white--modal uk-flex uk-flex-middle uk-flex-center">
                      <div class="t-shirt__design--modal <?php echo $shirt['class'];?>">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-form-container uk-width-medium-1-2 uk-width-1-1">
                  <h1 class="modal-header"><?php echo $shirt['name'];?></h1>
                  <h2 class="design-by"><?php echo $shirt['author'];?></h2>
                  <form method="post" enctype="multipart/form-data">
                  <input type="hidden" name="type" value="<?php echo $shirt['name'];?>"/>
                    <div class="modal-form__field">
                      <select name="tshirt-size">
                        <option value="S">Wybierz rozmiar S</option>
                        <option value="M">Wybierz rozmiar M</option>
                        <option value="L">Wybierz rozmiar L</option>
                        <option value="XL">Wybierz rozmiar XL</option>
                      </select> 
                    </div>
                    <div class="modal-form__field">
                      <input name="email" type="email" pattern="[^ @]*@[^ @]*" placeholder="Podaj email"/>
                    </div>
                    <div class="modal-form__field">
                      <input type="file" name="cv" id="uploadCV-<?php echo $shirt['class'];?>"/>
                      <label id="label__uploadCV-<?php echo $shirt['class'];?>" for="uploadCV-<?php echo $shirt['class'];?>">Załącz CV</label>
                    </div>
                    <div class="modal-form__field">
                      <button class="modal__button submit">Wyślij</button>
                    </div>
                    <div class="errors"></div>
                    <div class="modal-form__field">
                      <input type="checkbox" id="checkbox-<?php echo $shirt['class'];?>" name="agreement" />
                      <label for="checkbox-<?php echo $shirt['class'];?>">Lorem ipsum</label>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- modal with design zoom -->
          <div id="<?php echo $shirt['class'];?>-design" class="uk-modal modal-zoom__container" uk-modal>
            <div class="uk-modal-dialog uk-modal-body modal-zoom">
              <img src="./assets/img/<?php echo $shirt['img'];?>.jpg"/>
              <img src="./assets/img/button-close.png" class="button-close-zoom"/>
            </div>
          </div> 
          <div class="t-shirt__single">
            <img src="./assets/img/tshirt.png" class="t-shirts__piece"/>
            <img src="./assets/img/<?php echo $shirt['img'];?>.jpg" class="t-shirts__design"/>
            <div class="t-shirts__button">
              <a href="#<?php echo $shirt['class'];?>-modal" data-uk-modal="target: #<?php echo $shirt['class'];?>-modal" id="<?php echo $shirt['class'];?>-button"><span>wybieram</span>
              </a>
              <a href="<?php echo $shirt['class'];?>-design" data-uk-modal="target: #<?php echo $shirt['class'];?>-design" id="<?php echo $shirt['class'];?>-show" class="zoom-icon">
                <img src="./assets/img/zoom-button.png"/>
              </a>
            </div>
          </div>
          <hr class="hr">
          <div class="t-shirts__copy">
            <h2><?php echo $shirt['name'];?></h2>
            <p><?php echo $shirt['author'];?></p>
          </div>
        </div>
      <?php endforeach;?>
>>>>>>> 102703763ce276af1024a356f8b6bfd94d1b9cb7

      </div>
      <div class="main-page__header">
        <h1>Designers</h1>
      </div>
    </div>
<<<<<<< HEAD

    <div class="designers__container uk-grid">
      <div class="uk-width-medium-1-2 uk-width-small-1-1">
        <div class="uk-grid">
          <div class="uk-width-1-2">
            <div class="designers__kula">
              <img src="./assets/img/kula-background.png" class="kula__background"/>
              <div class="kula__photo">
              </div>
            </div>
          </div>
          <div class="uk-width-1-2">
            <div class="kula__copy">
              <h3>Lis Kula</h3>
              <hr class="hr">
              <p>Rysownik, autor okładek muzycznych, murali i mniej lub bardziej komercyjnych ilustracji. W swoich pracach kładzie nacisk na detale i naćkane kompozycje. Pracował między innymi nad projektami dla 20th Century Fox, Nike, Converse, Levi’s czy Vice. Lubi kreskówki, komiksy i zwierzęta. Prywatnie miły chłopak.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="uk-width-medium-1-2 uk-width-small-1-1">
        <div class="uk-grid">
          <div class="uk-width-1-2">
            <div class="miskacz__copy">
              <h3>Miskacz</h3>
              <hr class="hr">
              <p>Artysta, grafik, tatuażysta. Tworzy w oryginalnym stylu będącym połączeniem neotraditional ze stylem cartoon. Grube kontury, wyraźne kreski i żywe kolory to jego specjalność. Miskacz wielokrotnie zdobywa wysokie miejsca i wyróżnienia na konwentach tatutażu, choćby ostatnio w Warszawie (październik 2016) i w Krakowie (czerwiec 2016).</p>
            </div>
          </div>
          <div class="uk-width-1-2">
            <div class="designers__miskacz">
              <img src="./assets/img/miskacz-background.png" class="miskacz__background"/>
              <div class="miskacz__photo">
              </div>
            </div>
          </div>
        </div>
      </div>
=======
    <div class="designers__container uk-flex uk-flex-middle uk-flex-center uk-flex-space-between">

      <div class="designers__kula uk-flex">
        <div class="kula__photo">
          <img src="./assets/img/lis_kula.png"/>
        </div>
        <div class="kula__copy">
          <h3>Lis Kula</h3>
          <hr class="hr">
          <p>Lorem ipsum dolor sit amet, per eu saperet fierent invidunt. In sumo adipisci vel, te etiam putent praesent mei, volutpat scribentur sed eu. Eum cu duis illud satus.</p>
        </div>
      </div>

      <div class="designers__miskacz uk-flex">
        <div class="miskacz__copy">
          <h3>Miskacz</h3>
          <hr class="hr">
          <p>Lorem ipsum dolor sit amet, per eu saperet fierent invidunt. In sumo adipisci vel, te etiam putent praesent mei, volutpat scribentur sed eu. Eum cu duis illud satus.</p>
        </div>
        <div class="miskacz__photo">
          <img src="./assets/img/miskacz.png"/>
        </div>
      </div>

>>>>>>> 102703763ce276af1024a356f8b6bfd94d1b9cb7
    </div>

    <footer>
      <p> footer </p>
    </footer>
  </div>
</body>
</html>
