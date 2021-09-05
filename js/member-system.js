
$('button.btn-member').click(function () {

    $('.mobile-member').toggle(); //已登入才顯示漢堡選單

});

// 手機左側選單
$('img.menu-icon').click(function () {
    $('.mobile-navbar').fadeToggle(150);
    if ($('.mobile-member').css('display', 'block')) $('.mobile-member').hide();
    $('.mobile-navbar').css('display', 'grid');
    $('header').css('background-color', '#ade8f4');
});
$('img.cross').click(function () {
    $('.mobile-navbar').fadeToggle(150);
    $('header').css('background-color', '#b1d660');
});
$('label.nav-item').click(function () {
    $(this).next().slideToggle(150);
});

// 無效連結用，讓有class=disable的物件連結失效
$('.disable').click(function (event) {
    event.preventDefault();
});

// 展開/收合商品細節
$('.order-top').click(function () {
    if ($(this).hasClass('rent')) return false;
    $(this).children('.order-right').children('img').toggleClass('rotate180');
    $(this).parent().children('.order-detail').slideToggle(350);
});

// 評論、回覆繳款、兌換的流程
$('.qr').children('button').click(function () {
    $(this).closest('article.rate0').fadeOut(100, function () {
        let rate1 = $(this).closest('.order-detail').children('article.rate1');
        rate1.fadeIn(100, function () {
            $("html, body").animate({ scrollTop: rate1.offset().top - $('header').height() }, 500);
        });
    });
});

$('article.rate1').find('button.btn-green').click(function (event) {
    event.preventDefault();
    $(this).closest('article.rate1').fadeOut(100, function () {
        let rate2 = $(this).closest('.order-detail').children('article.rate2');
        rate2.fadeIn(100, function () {
            $("html, body").animate({ scrollTop: rate2.offset().top - ($(window).height() - $('header').height()) / 2 }, 1000);
        });
    });
})

$('article.rate1').find('button.btn-black').click(function (event) {
    event.preventDefault();
    $(this).closest('article.rate1').fadeOut(100, function () {
        let rate0 = $(this).closest('.order-detail').children('article.rate0');
        rate0.fadeIn(100, function () {
            $("html, body").animate({ scrollTop: rate0.offset().top - ($(window).height() - $('header').height()) / 2 }, 1000);
        });
    });
})
$('article.rate2').find('button.btn-green').click(function () {
    $(this).closest('article.rate2').fadeOut(100, function () {
        $(this).closest('.order-detail').children('article.rate0').fadeIn(100);
    });
})
$('button#reply').click(function () {
    $(this).parent().fadeOut(100).prev().fadeOut(100, function () {
        $(this).next().next().fadeIn(100);
    });
});

$('article.reply1').find('button.btn-green').click(function (event) {
    event.preventDefault();
    $(this).closest('article.reply1').fadeOut(100, function () {
        $(this).next().fadeIn(100);
    });
});

$('article.reply1').find('button.btn-black').click(function (event) {
    event.preventDefault();
    $(this).closest('article.reply1').fadeOut(100, function () {
        $(this).prev().fadeIn(100).prev().fadeIn(100);
    });
});
$('article.reply2').find('button.btn-green').click(function () {
    $(this).closest('article.reply2').fadeOut(100, function () {
        $(this).prev().prev().fadeIn(100).prev().fadeIn(100);
    });
});
$('article.ex0').find('button.btn-green').click(function () {
    $(this).closest('article.ex0').fadeOut(100, function () {
        $('article.ex1').fadeIn(100);
    });
});

$('article.ex1').find('button.btn-green').click(function (event) {
    event.preventDefault();
    $(this).closest('article.ex1').fadeOut(100, function () {
        $(this).next().fadeIn(100);
    });
});

$('article.ex1').find('button.btn-black').click(function (event) {
    event.preventDefault();
    $(this).closest('article.ex1').fadeOut(100, function () {
        $(this).prev().fadeIn(100);
    });
});
$('article.ex2').find('button.btn-green').click(function () {
    $(this).closest('article.ex2').fadeOut(100, function () {
        $('article.ex0').fadeIn(100);
    });
});

// 評論的點擊星星功能
$('.rate-star').children('img').hover(
    function () {
        let star = $(this).parent('.rate-star').children('img');
        let dataRate = $(this).parent('.rate-star').attr('data-rate');
        if (dataRate == "") {
            let index = $(this).index();
            for (let i = 0; i <= index; i++) {
                star.eq(i).attr('src', './SVG/member-system/star.svg');
            };
        };
    }, function () {
        let star = $(this).parent('.rate-star').children('img');
        let dataRate = $(this).parent('.rate-star').attr('data-rate');
        if (dataRate == "") {
            star.attr('src', './SVG/member-system/star-gray.svg');
        };
    }
);
$('.rate-star').children('img').click(function () {
    let star = $(this).parent('.rate-star').children('img');
    let dataRate = $(this).parent('.rate-star').attr('data-rate');
    star.attr('src', './SVG/member-system/star-gray.svg');
    let index = $(this).index();
    for (let i = 0; i <= index; i++) {
        star.eq(i).attr('src', './SVG/member-system/star.svg');
    };
    $(this).parent('.rate-star').attr('data-rate', index + 1);
});
// select 和 option
$('.select').click(function () {
    $(this).next().toggle();
});
$('ul.option > li').click(function () {
    console.log('hi');
    $(this).closest('.option-wrap').toggle();
    let text = $(this).text();
    $(this).closest('.option-wrap').prev().text(text);
});


$('.point-cat-item').children('img').css('opacity', '0');
$('#point-cat0').css('color', 'var(--grass)').children('img').css('opacity', '1');
$('.point-cat-item').click(function () {
    // 改變類別顏色
    $('.point-cat-item').css('color', '#707070').children('img').css('opacity', '0');
    $(this).css('color', 'var(--grass)').children('img').css('opacity', '1');
});
$('#point-cat0').click(function () {
    $('.order-box').show();
});
$('#point-cat1').click(function () {
    $('.order-box').hide();
    $('.type_id_1').show();
});
$('#point-cat2').click(function () {
    $('.order-box').hide();
    $('.type_id_2').show();
});
$('#point-cat3').click(function () {
    $('.order-box').hide();
    $('.type_id_3').show();
});
$('#point-cat4').click(function () {
    $('.order-box').hide();
    $('.type_id_4').show();
});
$('#point-cat5').click(function () {
    $('.order-box').hide();
    $('.type_id_5').show();
});

$('input#same').click(function () {
    let data_name = $(this).attr('data-name');
    let data_phone = $(this).attr('data-phone');
    let data_email = $(this).attr('data-email');
    let data_address = $(this).attr('data-address');

    if (($('input#name').val()) == "") {
        $('input#name').val(data_name);
    } else {
        $('input#name').val("");
    };

    if (($('input#phone').val()) == "") {
        $('input#phone').val(data_phone);
    } else {
        $('input#phone').val("");
    }

    if (($('input#address').val()) == "") {
        $('input#address').val(data_address);
    } else {
        $('input#address').val("");
    }

    if (($('input#email').val()) == "") {
        $('input#email').val(data_email);
    } else {
        $('input#email').val("");
    }
});

//兌換商品
$('button#point-exchange').click(function () {

    let btn = $(this);
    let objExchange = {
        prod_id: btn.attr('prod-id'),
        name: $('form#exchange-form').find('input#name').val(),
        email: $('form#exchange-form').find('input#email').val(),
        address: $('form#exchange-form').find('input#address').val(),
        phone: $('form#exchange-form').find('input#phone').val()
    };
    $.post("exchange.php", objExchange)
});

$('.achieve-box.completed').find('button').hide().closest('.achieve-box.completed').find('.btn-ach2').show();
$('.achieve-box.completed.recieved').find('button').hide().closest('.achieve-box.completed.recieved').find('.btn-ach3').show();

//兌換成就獎品
$('button#ach-exchange').click(function () {

    let btn = $(this);
    let objExchange = {
        ach_id: btn.attr('prod-id'),
        name: $('form#exchange-form').find('input#name').val(),
        email: $('form#exchange-form').find('input#email').val(),
        address: $('form#exchange-form').find('input#address').val(),
        phone: $('form#exchange-form').find('input#phone').val()
    };
    $.post("ach-exchange.php", objExchange)
});


//回復會員資訊
$('.link3_lty > a').click(function (event) {
    event.preventDefault();
    let data_last_name = $(this).attr('data-last-name');
    let data_first_name = $(this).attr('data-first-name');
    let data_phone = $(this).attr('data-phone');
    let data_address = $(this).attr('data-address');
    let data_gender = $(this).attr('data-gender');
    let data_birthdate = $(this).attr('data-birthdate');

    $('.userLastname_lty input').val(data_last_name);
    $('.userfirstname_lty input').val(data_first_name);
    $('.gender_lty .select').text(data_gender);
    $('.birth_lty input').val(data_birthdate);
    $('.phone_lty input').val(data_phone);
    $('.address_lty input').val(data_address);
});

// 修改會員資訊
$('.link2_lty > a').click(function (event) {
    event.preventDefault();
    let objProfile = {
        last_name: $('.userLastname_lty input').val(),
        first_name: $('.userfirstname_lty input').val(),
        phone: $('.phone_lty input').val(),
        address: $('.address_lty input').val(),
        gender: $('.gender_lty .select').text(),
        birthdate: $('.birth_lty input').val()
    };
    $.post("updateUser.php", objProfile);

    // if(obj['success']){

    //成功訊息
    alert('會員資訊修改成功');

    //當成功訊息執行同時，等數秒後，執行自訂程式
    setTimeout(function () {
        location.reload();
    }, 1000);
    // } else {
    //     // alert(`${obj['info']}`);
    // }
    // console.log(obj);
    // }, 'json')
});



// 優惠券
$('.coupon-cat > h3').click(function () {
    $(this).css({
        color: '#fff',
        background: 'url(./SVG/member-system/coupon-icon.svg) center center/ 100% auto no-repeat'
    }).siblings().css({
        color: '#707070',
        background: 'none'
    })
});

$('.coupon-group').click(function () {
    $(this).next().slideToggle(250);
})
$('.coupon-btn button').click(function () {
    $(this).closest('.coupon-discri0').slideUp(250);
})
$('.coupon-cat > h3:nth-child(3)').click(function () {
    $('.coupon-group').hide();
    $('.old-coupon').show();
});
$('.coupon-cat > h3:nth-child(2)').click(function () {
    $('.coupon-group').hide();
    $('.new-coupon').show();
});
$('.coupon-cat > h3:nth-child(1)').click(function () {
    $('.coupon-group').show();
});


// checkbox全選功能
let clicked = false;
$('input#select-all').click(function () {
    if (!clicked) {
        $('.favorite-checkbox > input:not(:checked)').click();
        clicked = true;
    } else {
        $('.favorite-checkbox > input:checked').click();
        clicked = false;
    }
});

// 
$('.favorite-delete').click(function () {
    let checked = $('.favorite-checkbox > input:checked');
    checked.closest('.order-box').fadeOut(250);
    let arr = [];
    $.each(checked, function (key, obj) {
        let id = $('.favorite-checkbox > input:checked').eq(key).attr('id');
        arr[key] = parseInt(id);
    });
    console.log(arr);
    $.post("remove-favorite.php", { delArray: arr }, function (obj) {
        if (obj['success']) {

            //成功訊息
            // alert('刪除成功');

            //當成功訊息執行同時，等數秒後，執行自訂程式
            // setTimeout(function(){
            //     location.reload();
            // }, 1000);
        } else {
            // alert(`${obj['myPostArray']}`);
        }
        console.log("hi");
    }, 'json')
});

//登出
$('#logout').click(function (event) {
    //避免元素的預設事件被觸發
    event.preventDefault();

    $.get('logout.php', function (obj) {
        if (obj['success']) {
            alert('登出成功');

            setTimeout(function () {
                location.href = 'index.php'; // louout後跳到哪
            }, 500);
        }
    }, 'json');
});













