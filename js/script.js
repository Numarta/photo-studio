var swiper = new Swiper('.swiper-container', {
    slidesPerView: 1,
    spaceBetween: 30,
    slidesPerGroup: 1,
    loop: true,
    loopFillGroupWithBlank: true,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    breakpoints: {

        840: {
            slidesPerView: 2,
            slidesPerGroup: 2
        }
    }
});

$(function () {
    $('[data-toggle="popover"]').popover()
})

$(document).ready(function () {
    $('.mobile_nav').click(function () {
        $('.hor_nav').slideToggle('fast');
    });

    $('body').on('click', '.login_form', function () {
        $('#login_form').modal('show')
    });
    
    $('body').on('click', '.signup_form', function () {
        $('#signup_form').modal('show')
    });

    $('.fpsswrd').click(function(){
        $('.slide1').animate({left: '-100%'}, 500);
        $('#fpsswrd').animate({left: '0'}, 500);
    });
});

// Загрузка изображений на сервер
   $('.order .btn').click(function() {
     
    
           
            // Формируем в виде списка все загруженные изображения
            // data формируется в upload.php
            var dataSplit = data.split(':');
            if(dataSplit[1] == 'загружен успешно') {
               $('#file-inp').append('<li><a href="images/'+dataSplit[0]+'">'+fileName+'</a> загружен успешно</li>');
                       
            } else {
               $('#file-inp').append('<li><a href="images/'+data+'. Имя файла: '+dataArray[index].name+'</li>');
            }
           
         });
      // Показываем список загруженных файлов
      $('#file-inp').show();
      return false;
   });
