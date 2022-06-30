
if (!sessionStorage.getItem('submits')) sessionStorage.setItem('submits', 0);

function deleteName() {
    sessionStorage.setItem('prevsubmits', sessionStorage.getItem('submits')); 
}

function onloadsubmit() {
    var pup = sessionStorage.getItem('submits');
    pup++;   
    sessionStorage.setItem('submits', pup);    
}


function modalLoginLoad () {
    if ( document.querySelector('.modal-registration').contains( document.querySelector(".woocommerce-error")) && parseInt(sessionStorage.getItem('submits'), 10) == ( parseInt(sessionStorage.getItem('prevsubmits'), 10) + 1 )) {
    return true;
    }  
}

function isEmpty(str) {
    return (!str || 0 === str.length);
}

String.prototype.isEmpty = function() {
    return (this.length === 0 || !this.trim());
};

function isAlpha(str) {
    return /^[a-z]*$/gi.test(str);
}

function isCyrAlpha(str) {
    return /^[а-яё]*$/gi.test(str);
}

   
//   document.querySelector('#is-alpha').addEventListener('click', () => {
//     let data = document.querySelector('#input').value;
//     document.querySelector('#output').appendChild(
//       document.createTextNode(`for ${data} isAlpha = ${data.isAlpha()}\n`)
//     );
//   }, true);

function splitter (a , b) {
    var c = a.split(b);
    return c;
}

function checkStringForLetters(str) {
    var counter = 0;
    for (var i = 0; i < str.length; i++) {
        if (str[i] === ' ' || isAlpha(str[i]) || isCyrAlpha(str[i]) ) counter++;
    }

    if (counter === str.length) return true;
    else return false;
}


var errorDetection = document.getElementsByClassName('woocommerce-message')[0];
var sashok = document.getElementsByClassName('woocommerce-message')[0];
var mishok = document.getElementsByClassName('private-area_head')[0];

if (errorDetection != null) {
    mishok.after(sashok);
    sashok.classList.add('woo-success-address');
}

////////////




// ////////////

// function getDigits(str) {

//     var newString = '';
//     for(var i = 0; i < str.length; i++) {
//         if (Number.isFinite( parseInt(str[i]) ) ){
//             newString += str[i];
//         }
//     }

//     return newString;
// }



// const podValue = document.getElementById('pod');
// const floorValue = document.getElementById('floor');
// const flatValue = document.getElementById('flat');

// // var splittedAddress = addressValue2.value.split(',');
// // splittedAddress.forEach( elem => {
// //     if( elem.indexOf('подъезд') >= 0) podValue.value = getDigits(elem.trim());
// //     if( elem.indexOf('этаж') >= 0) floorValue.value = getDigits(elem.trim());
// //     if( elem.indexOf('квартира') >= 0) flatValue.value = getDigits(elem.trim());

// // });


function click_all_cb( $name ){
    switch($name){
        case 'Прочее':{

        }break;
        case 'Основы блюд':{

        }break;
        
        case 'Молочные альтернативы':{

        }break;
        case 'Мясные альтернативы':{

        }break;
        
    }
}



