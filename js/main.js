/*=============== SWIPER ===============*/
$(document).ready(function () {
    var swiper = new Swiper(".swiper", {
        loop: true,
        effect: 'fade',
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
});

/*=============== CURRENCY ===============*/
$(document).ready(function() {
    var currentCurrency = 'huf';
    updatePrices(currentCurrency);

    $('.menu-button').on('click', function() {
        var currency = $(this).text().toLowerCase();
        updatePrices(currency);
        updateTotal();
    });

    $('#currency').on('change', function() {
        updateTotal();
    });

    function updatePrices(currency) {
        $('.menu-price span').hide();

        var priceElement1 = $('#price-' + currency);
        var priceElement2 = $('#price-' + currency + '2');
        var priceElement3 = $('#price-' + currency + '3');
        var currencySymbol = getCurrencySymbol(currency);
        priceElement1.text(currencyPrices1[currency] + ' ' + currencySymbol).show();
        priceElement2.text(currencyPrices2[currency] + ' ' + currencySymbol).show();
        priceElement3.text(currencyPrices3[currency] + ' ' + currencySymbol).show();
        currentCurrency = currency;
    }

    function getCurrencySymbol(currency) {
        switch (currency) {
            case 'huf':
                return 'Ft';
            case 'eur':
                return 'EUR';
            case 'rsd':
                return 'RSD';
            default:
                return ''; 
        }
    }
});

/*=============== VEGOSSZEG ===============*/ 
function updateTotal() {
    var selectedCurrency = document.getElementById("currency").value;

    var elsoMenu = document.getElementById("elsomenu").valueAsNumber || 0;
    var masodikMenu = document.getElementById("masodikmenu").valueAsNumber || 0;
    var harmadikMenu = document.getElementById("harmadikmenu").valueAsNumber || 0;

    var vegosszeg1 = elsoMenu * currencyPrices1[selectedCurrency];
    var vegosszeg2 = masodikMenu * currencyPrices2[selectedCurrency];
    var vegosszeg3 = harmadikMenu * currencyPrices3[selectedCurrency];

    var totalVegosszeg = vegosszeg1 + vegosszeg2 + vegosszeg3;

    document.getElementById("totalPrice").innerText = totalVegosszeg + ' ' + selectedCurrency.toUpperCase();
}
  
/*=============== POPUP ===============*/ 
function showPopup() {
    var popup = document.getElementById('popup');
    var overlay = document.getElementById('overlay');
    popup.classList.add('show');
    overlay.classList.add('show');
  }
  
  document.getElementById('close-btn').addEventListener('click', function () {
    var popup = document.getElementById('popup');
    var overlay = document.getElementById('overlay');
    popup.classList.remove('show');
    overlay.classList.remove('show');
  });


  /*=============== CAROUSER ===============*/ 
  let currentIndex = 0;

  function showSlide(index) {
      const carouselInner = document.querySelector('.carousel-inner');
      const totalSlides = document.querySelectorAll('.carousel-item').length;
      index = (index + totalSlides) % totalSlides;
      const translateValue = -index * 100 + '%';
      carouselInner.style.transform = 'translateX(' + translateValue + ')';
      currentIndex = index;
  }

  function nextSlide() {
      showSlide(currentIndex + 1);
  }

  function prevSlide() {
      showSlide(currentIndex - 1);
  }