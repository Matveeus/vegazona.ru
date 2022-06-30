var address = {};
var urlParam;
var suggestion1;

jQuery(window).load(function() {
    var addr = new URL(window.location.href);
    urlParam = addr.searchParams.get('address-book');
});

function join(arr /*, separator */) {
    var separator = arguments.length > 1 ? arguments[1] : ", ";
    return arr.filter(function(n){return n}).join(separator);
}

function checkForSuggestion(addressBefore) {

    var addressAfter = jQuery('#shipping_address_1').val();
    var newNickname = jQuery('#shipping_address_nickname').val();
        if(!jQuery.isEmptyObject(address)){
            if(urlParam === null) urlParam = 'shipping';
            var address2 = JSON.parse(sessionStorage.getItem('addressObject'));
            if (jQuery.trim(jQuery('#shipping_address_1').val()) === suggestion1.value){
                jQuery.ajax({
                    url: php_params.ajaxurl,
                    type: 'POST',
                    data: {
                        action:'mytag_function_name', 
                        postcode: address2.postal_code,
                        region: address2.region_with_type,
                        city: join([ address2.region_with_type, address2.settlement_with_type], " "),
                        urlparam: urlParam,
                        new_nickname: newNickname,
                    },
                    success: function(data){
                        console.log(data);
                    }, 
                    error: function(){
                        console.log('ERROR');
                    }
                });
            }
            else {
                alert("Введите адрес заново");
                return false;
            }
            
        } else {
            if (addressBefore !== addressAfter){
                alert("Вы не выбрали адрес");
                return false;
            }
            
        } 

        var address2Array = [];
        address2Array[0] = jQuery.trim(jQuery('#pod').val());
        address2Array[1] = jQuery.trim(jQuery('#floor').val());
        address2Array[2] = jQuery.trim(jQuery('#flat').val());
        sessionStorage.setItem('address2Object', JSON.stringify(address2Array));
}




jQuery().ready( function() {


    jQuery('.header-burger').click(function(event) {
        jQuery('.header-burger,.header-lower-block').toggleClass('active');
        jQuery('body').toggleClass('lock');
    })

    jQuery('.product-filter-open-button').click(function(event) {
        if ( !jQuery('.shop-page-container aside.widget-area').hasClass('active-filter')) { 
            jQuery('.shop-page-container aside.widget-area').toggleClass('active-filter');
            jQuery('.filter-overlay').fadeIn();
            jQuery('body').toggleClass('lock');
        }
        
        
    })
    
    jQuery(".filter-overlay").bind("click",function(e){
    if(jQuery(e.target).attr("class") == "filter-overlay")
        if ( jQuery('.shop-page-container aside.widget-area').hasClass('active-filter')) { 
            jQuery(".filter-overlay").fadeOut();
            jQuery('body').toggleClass('lock');
            jQuery('.shop-page-container aside.widget-area').toggleClass('active-filter');
        }
    })
    
    jQuery(".filter-close-button").click(function(event) {
        jQuery(".filter-overlay").fadeOut();
            jQuery('body').toggleClass('lock');
            jQuery('.shop-page-container aside.widget-area').toggleClass('active-filter');
    })

function removeFlat(suggestions) {
    return suggestions.filter(function(suggestion) {
        return suggestion.data.flat_type !== "кв";
    });
}

jQuery(".form-row-address_1-input").suggestions({
    serviceUrl: "https://suggestions.dadata.ru/suggestions/api/4_1/rs",
    token: "47cc7bfa26e68ebdab48957756686c2a2dd40931",
    type: "ADDRESS",
    onSuggestionsFetch: removeFlat,
    onSelect: function(suggestion) {
        console.log(suggestion);
        suggestion1 = suggestion;
        address = suggestion.data;
    
        sessionStorage.setItem('addressObject', JSON.stringify(address));
    }
});


jQuery("#account_phone").mask("+7 (999) 999-99-99");


///////////////////     Модальное окно регистрации     ///////////////////
jQuery('#login-button').click(function() {
    jQuery(".modal-window").fadeIn();
    jQuery('body').toggleClass('active-modal');
    return false;
});



jQuery('.modal-registration-close').click(function() {
    jQuery(".modal-window").fadeOut();
    jQuery('body').removeClass('active-modal');
    return false;
});

jQuery(".modal-window").bind("click",function(e){
    if(jQuery(e.target).attr("class") == "modal-container")
        jQuery(".modal-window").fadeOut();
})

    jQuery(".modal-login-select-header").click( function(){
        if( !jQuery(this).hasClass( "modal-login-selected" )){
            jQuery('.modal-login-block').toggle( "slide" );
            jQuery('.modal-register-block').toggle( "slide" );
            jQuery('.modal-login-selected').removeClass('modal-login-selected');
            jQuery(this).addClass('modal-login-selected');

        }
    })


///////////////////     Модальное окно смены пароля     ///////////////////
jQuery('#change_password').click(function() {
    jQuery(".modal-window-password-background").fadeIn();
    return false;
});

jQuery('.change-pass-close').click(function() {
    jQuery(".modal-window-password-background").fadeOut();
    return false;
});

    header_fixation();
///////////////////     Фиксация хэдера     ///////////////////

    function header_fixation(){

        var header = jQuery('.header'),
            scrollPrev = 0;

        jQuery(window).scroll(function() {
            var scrolled = jQuery(window).scrollTop();

            if ( scrolled > scrollPrev ) {
                header.addClass('out');
            } else {
                header.removeClass('out');
            }
            scrollPrev = scrolled;
        });
    }

//
// jQuery(window).scroll(function(){
//     if (jQuery(window).scrollTop() > 90) {
//         jQuery('.header-lower').addClass('fixed-block');
//         jQuery('.header-upper').addClass('margin-for-fixed');
//
//     }
//     else {
//         jQuery('.header-lower').removeClass('fixed-block');
//         jQuery('.header-upper').removeClass('margin-for-fixed');
//     }
// });

///////////////////     Проверка формы регистрации на стороне клиента     ///////////////////

jQuery.fn.contains = function(txt) { return jQuery(this).indexOf(txt) >= 0; }

jQuery.validator.addMethod("wordCheck", function(value, element) {
    return checkStringForLetters(value);
});

jQuery.validator.addMethod("oneWordCheck", function(value, element) {
    if( value.indexOf(" ") >= 0 ) {
        var arrayOfWords = splitter(value, " ");
        var counter = 0;
        for (var i = 0; i< arrayOfWords.length; i++) {
            if( arrayOfWords[i] !== '' ) counter++;
        }
        if(counter === 1) return true;
        else return false;
    }
    else return true;
});

jQuery.validator.addMethod("passwordCheck", function(value, element) {

    if( !/[A-Z]/.test(value) ) return false;
    else if( !/[a-z]/.test(value) ) return false;
    else if( !/[0-9]/.test(value) ) return false;
    return true;
}, "Пароль должны содержать не менее 8-ми символов, в том числе цифры, прописаные и строчные буквы");



    jQuery('#reg_form').validate({
        rules: {
            first_name: { 
                required: true,
                minlength: 2,
                wordCheck: true,
                oneWordCheck: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 8,
                passwordCheck: true
            },
            rep_password: {
                required: true,
                minlength: 8,
                equalTo: "#reg_password"
            }
        },
        
        messages: {
            first_name: {
                required: "Обязательное поле",
                minlength: "Введите минимум 2 символа",
                wordCheck: "Некорректное имя",
                oneWordCheck: "Введите 1 слово"
            },
            email: {
                required: "Обязательное поле",
                email: "Некорорректный email"
            },
            password: {
                required: "Обязательное поле",
                minlength: "Минимум 8 символов"
            },
            rep_password: {
                required: "Обязательное поле",
                minlength: "Минимум 8 символов",
                equalTo: "Пароли не совпадают"
            }

        }
    });
    jQuery('#login_form').validate({
        rules: {
            username: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        messages: {
            username: {
                required: "Обязательное поле",
                email: "Некорорректный email"
            },
            password: {
                required: "Обязательное поле",
            }

        }



    });
    jQuery('#edit_acc_form').validate({
        rules: {
            account_first_name: {
                required: true,
                minlength: 2,
                wordCheck: true,
                oneWordCheck: true
                
            },
            account_last_name: {
                minlength: 2,
                wordCheck: true,
                oneWordCheck: true

            },
            account_email: {
                required: true,
                email: true
            },
            account_phone: {
            },
            password_current: {
                
            }, 
            password_1: {
                minlength: 8,
                passwordCheck: true
            },
            password_2: {
                minlength: 8,
                equalTo: "#password_1"
            }

        },
        messages: {
            account_first_name: {
                required: "Обязательное поле",
                minlength: "Введите минимум 2 символа",
                wordCheck: "Некорректное имя",
                oneWordCheck: "Введите 1 слово"
            },
            account_last_name: {
                minlength: "Введите минимум 2 символа",
                wordCheck: "Некорректное фамилия",
                oneWordCheck: "Введите 1 слово"
            },
            account_email: {
                required: "Обязательное поле",
                email: "Некорорректный email"
            },
            account_phone: {
            },


        }

    });
    

    jQuery('#address_edit_form').validate();
    
    // jQuery.validator.addClassRules("form-row-address-nickname-input", {
    //     required: true,
    // });

    jQuery.validator.addClassRules({
        'form-row-address-nickname-input': {
          required: true,
          
        },
        'form-row-address_1-input': { 
          required: true,
        }
      });
    ;
    

///////////////////     Проверка чекбоксов при отправке формы     ///////////////////
jQuery('#register-submit').on('click', function () {
    if ( !jQuery('#private-privacy-check').is(':checked') ) {
        jQuery('.private-privacy-text').addClass('red-text');
        jQuery('.private-privacy-link').addClass('red-text');
        return false;
    }
})

jQuery('#register-submit').on('click', function () {
    if (  !jQuery('#terms-of-use-check').is(':checked') ) {
        jQuery('.terms-of-use-accept-text').addClass('red-text');
        jQuery('.terms-of-use-accept-link').addClass('red-text');
        return false;
    }
})


///////////////////     Проверка чекбоксов при нажатии    ///////////////////
jQuery('#private-privacy-check').on('click', function () {
    if ( jQuery('#private-privacy-check').is(':checked') ) {
        jQuery('.private-privacy-text').removeClass('red-text');
        jQuery('.private-privacy-link').removeClass('red-text');
        // checkbox checked 
    } else {
        jQuery('.private-privacy-text').addClass('red-text');
        jQuery('.private-privacy-link').addClass('red-text');
        // checkbox unchecked 
    }
})

jQuery('#terms-of-use-check').on('click', function () {
    if ( jQuery('#terms-of-use-check').is(':checked') ) {
        jQuery('.terms-of-use-accept-text').removeClass('red-text');
        jQuery('.terms-of-use-accept-link').removeClass('red-text');
        // checkbox checked 
    } else {
        jQuery('.terms-of-use-accept-text').addClass('red-text');
        jQuery('.terms-of-use-accept-link').addClass('red-text');
        // checkbox unchecked 
    }
})

})

///////////////////     Открывает модальное окно со входом после перезагрузки, если при входе возникла ошибка    ///////////////////
function $modalLoginlooder (foo) {
    if ( foo ) {
        jQuery(".modal-window").fadeIn();
        return false;
    }
    
}

///////////////////     Удаляет повторные сообщения Woocommerce    ///////////////////
var supervise = {};
    jQuery('.woocommerce-message').each(function() {
        var txt = jQuery(this).text();
        if (supervise[txt])
            jQuery(this).remove();
        else
    supervise[txt] = true;
});



