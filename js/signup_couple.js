var Adults = document.getElementById('Adults_3').querySelectorAll('input');
var Teens = document.getElementById('Teens_1').querySelectorAll('input');
var d_Teens = document.getElementById('Teens_3').querySelectorAll('input');
var professional = new Array();
var amateur = new Array();
//  <0 = amateur, 0 = none, >0 = professional
var checknow = 0;
var checknow_Teen = 0;
var fee_total = 0;
var fee_text = document.getElementById('fee')

for (var i = 0; i < Adults.length; i++) {
    if (Adults[i].dataset.professional === '1') {
        professional.push(Adults[i]);
    } else {
        amateur.push(Adults[i]);
    }
}


function HandleProfessionalAmateur(chk) {
    if (chk.dataset.professional === '1') {
        if (chk.checked === true) {
            if (checknow > 0) {
                fee_total += 500
            } else {
                fee_total += 2000
            }
            checknow += 1;
        } else {
            checknow -= 1;
            if (checknow > 0) {
                fee_total -= 500
            } else {
                fee_total -= 2000
            }
        }

        if (checknow > 0) {
            for (var i = 0; i < amateur.length; i++) {
                amateur[i].setAttribute("disabled", "");
            }
        } else {
            for (var i = 0; i < amateur.length; i++) {
                amateur[i].removeAttribute("disabled");
            }
        }
    } else {
        if (chk.checked === true) {
            if (checknow < 0) {
                fee_total += 500
            } else {
                fee_total += 2000
            }
            checknow -= 1;
        } else {
            checknow += 1;
            if (checknow < 0) {
                fee_total -= 500
            } else {
                fee_total -= 2000
            }
        }

        if (checknow < 0) {
            for (var i = 0; i < professional.length; i++) {
                professional[i].setAttribute("disabled", "");
            }
        } else {
            for (var i = 0; i < professional.length; i++) {
                professional[i].removeAttribute("disabled");
            }
        }
    }
    CheckDisable();
    fee_text.innerText = fee_total;
    console.log(fee_total);
}

function HandleTeens(chk) {
    if (chk.checked === true) {
        if (checknow_Teen > 0) {
            fee_total += 500
        } else {
            fee_total += 2000
        }
        checknow_Teen += 1;
    } else {
        checknow_Teen -= 1;
        if (checknow_Teen > 0) {
            fee_total -= 500
        } else {
            fee_total -= 2000
        }
    }
    fee_text.innerText = fee_total;
    console.log(fee_total);
}


function CheckDisable() {
    var age = Number(document.getElementById('hidden_age').innerHTML);
    for (var i = 0; i < Teens.length; i++) {
        if (Number(Teens[i].dataset.age) < age || Number(Teens[i].dataset.age) > age + 3) {
            Teens[i].setAttribute("disabled", "");
        }
    }
    for (var i = 0; i < d_Teens.length; i++) {
        if (Number(d_Teens[i].dataset.age) < age || Number(d_Teens[i].dataset.age) > age + 3) {
            d_Teens[i].setAttribute("disabled", "");
        }
    }
    for (var i = 0; i < Adults.length; i++) {
        if (Number(Adults[i].dataset.age) > age) {
            Adults[i].setAttribute("disabled", "");
        }
    }
}