// SHA256:JS3Ciibx4XsY3XIoCCZ85PRHwcAs/ugs9jG13eL1EcU.
//scroll
$(document).on("click", ".scroll-form", function () {
  var id = $(".product"),
      top = parseInt($(id).offset().top);
  $('body,html').animate({scrollTop: top - 15}, 1000);
});

//drop-box
$(document).on("click", ".sales-drop .sales-drop__active", function () {
  let parent = $(this).closest(".sales-drop");
  parent.toggleClass("open");
  parent.find(".sales-drop__list").slideToggle();
});

$(document).on("click", ".sales-drop .sales-drop__list .btn-sales", function () {
  let clone = $(this).clone(),
      parent = $(this).closest(".sales-drop");
  let product_quantity = $(this).attr('data-quantity');
  let product_id = $(this).parents('.sales-drop').attr('data-product-id');
  
  add_product_sale_to_cart(product_id,product_quantity);

  parent.removeClass("open");
  parent.find(".sales-drop__active").html(clone);
  parent.find(".sales-drop__list").slideUp();

});




//product sale cart
function add_product_sale_to_cart(product_id, quantity){
    $.ajax({
        url: ajaxurl,
        data: {
            action: 'add_product_sale_to_cart',
            product_id: product_id,
            quantity: quantity

        },
        cache: false,

        type: 'POST',
        success: function(response){

            if(response.regular_product_price){
                $('.product-info__currentPrice__price .info__currentPrice')
                .html(response.regular_product_price);
            } else{
                $('.product-info__currentPrice__price .info__currentPrice')
                .html('');
            }
            if(response.sale_product_price){
                $('.product-info__currentPrice__price .info__salePrice span')
                .html(response.sale_product_price);
            }
        }

    })
}


// swiper //
var mainSlider;
$(document).ready(function () {
    $(".section-slider__left .slider").each(function (index, element) {
        let $this = $(this);
        mainSlider = new Swiper($this.find('.swiper-container')[0], {
            loop: false,
            speed: 1000,
            spaceBetween: 0,
            watchSlidesProgress: true,
            mousewheelControl: true,
            lazyLoading: true,
            lazy: {
                preloadImages: true,
                loadPrevNext: true,
                loadPrevNextAmount: 3,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            },
            pagination: {
                el: $this.closest(".slider").find(".slider__control .slider-count")[0],
                type: 'fraction',
                currentClass: 'pagination-current',
                totalClass: 'pagination-total',
                renderFraction: function (currentClass, totalClass) {
                    return '<p><span class="' + currentClass + '"></span><span class="pagination-line">/</span><span class="' + totalClass + '"></span></p>';
                }
            },
            on: {
                slideChange: function () {
                    let src = $this.closest(".slider").find('.swiper-slide').eq(mainSlider.activeIndex).attr('data-img');
                    $this.closest(".slider").find('.slider__img img').attr('src', src);
                },
            }
        });
    });
});

//
function lazyInit() {
    $('.lazy:not(.lazy-done)').lazy({
        afterLoad: function (element) {
            $(element).css({
                'visibility': 'visible',
            }).fadeTo(250, 1);
            $(element).addClass("lazy-done")
        },
    });
}

