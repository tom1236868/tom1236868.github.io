var Adults_A = document.getElementById('Adults_A').querySelectorAll('input');
var Adults_B = document.getElementById('Adults_B').querySelectorAll('input');
var Adults = document.getElementById('Adults').querySelectorAll('input');
var Teens_A = document.getElementById('Teens_A').querySelectorAll('input');
var Teens_B = document.getElementById('Teens_B').querySelectorAll('input');
var Teens_C = document.getElementById('Teens_C').querySelectorAll('input');
var professional_A = new Array();
var amateur_A = new Array();
var professional_B = new Array();
var amateur_B = new Array();
var professional_C = new Array();
var amateur_C = new Array();

//  <0 = amateur, 0 = none, >0 = professional
var checknow_A = 0;
var checknow_Teens_A = 0;
var checknow_B = 0;
var checknow_Teens_B = 0;
var checknow_C = 0;
var fee_total = 0;
var fee_text = document.getElementById('fee')

var iscouple = 0;
var partner_age = 0;

var labels = document.getElementsByTagName('label');

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
})


for (var i = 0; i < Adults_A.length; i++) {
    if (Adults_A[i].dataset.professional === '1') {
        professional_A.push(Adults_A[i]);
    } else {
        amateur_A.push(Adults_A[i]);
    }
}

for (var i = 0; i < Adults_B.length; i++) {
    if (Adults_B[i].dataset.professional === '1') {
        professional_B.push(Adults_B[i]);
    } else {
        amateur_B.push(Adults_B[i]);
    }
}

for (var i = 0; i < Adults.length; i++) {
    if (Adults[i].dataset.professional === '1') {
        professional_C.push(Adults[i]);
    } else {
        amateur_C.push(Adults[i]);
    }
}


function HandleProfessionalAmateur_A(chk) {
    CheckDisable_A();
    if (chk.dataset.professional === '1') {
        if (chk.checked === true) {
            if (chk.dataset.couple === '0') {
                AddItem_A(chk);
            }
            if (chk.dataset.couple === '1') {
                AddItem_C(chk);
            }
            if (checknow_A > 0) {
                fee_total += 500
            } else {
                fee_total += 2000
            }
            checknow_A += 1;
        } else {
            RemoveItem(chk);
            checknow_A -= 1;
            if (checknow_A > 0) {
                fee_total -= 500
            } else {
                fee_total -= 2000
            }
        }

        if (checknow_A > 0) {
            for (var i = 0; i < amateur_A.length; i++) {
                //amateur[i].disabled = true;
                amateur_A[i].setAttribute("disabled", "");
            }
        } else {
            for (var i = 0; i < amateur_A.length; i++) {
                //amateur[i].disabled = false;
                amateur_A[i].removeAttribute("disabled");
            }
        }
    } else {
        if (chk.checked === true) {
            if (chk.dataset.couple === '0') {
                AddItem_A(chk);
            }
            if (chk.dataset.couple === '1') {
                AddItem_C(chk);
            }
            if (checknow_A < 0) {
                fee_total += 500
            } else {
                fee_total += 2000
            }
            checknow_A -= 1;
        } else {
            checknow_A += 1;
            RemoveItem(chk);
            if (checknow_A < 0) {
                fee_total -= 500
            } else {
                fee_total -= 2000
            }
        }

        if (checknow_A < 0) {
            for (var i = 0; i < professional_A.length; i++) {
                //professional[i].disabled = true;
                professional_A[i].setAttribute("disabled", "");
            }
        } else {
            for (var i = 0; i < professional_A.length; i++) {
                //professional[i].disabled = false;
                professional_A[i].removeAttribute("disabled");
            }
        }
    }
    fee_text.innerText = fee_total
    console.log(fee_total)
}

function HandleProfessionalAmateur_B(chk) {
    CheckDisable_B();
    if (chk.dataset.professional === '1') {
        if (chk.checked === true) {
            if (chk.dataset.couple === '0') {
                AddItem_B(chk);
            }
            if (chk.dataset.couple === '1') {
                AddItem_C(chk);
            }
            if (checknow_B > 0) {
                fee_total += 500
            } else {
                fee_total += 2000
            }
            checknow_B += 1;
        } else {
            RemoveItem(chk);
            checknow_B -= 1;
            if (checknow_B > 0) {
                fee_total -= 500
            } else {
                fee_total -= 2000
            }
        }

        if (checknow_B > 0) {
            for (var i = 0; i < amateur_B.length; i++) {
                //amateur[i].disabled = true;
                amateur_B[i].setAttribute("disabled", "");
            }
        } else {
            for (var i = 0; i < amateur_B.length; i++) {
                //amateur[i].disabled = false;
                amateur_B[i].removeAttribute("disabled");
            }
        }
    } else {
        if (chk.checked === true) {
            if (chk.dataset.couple === '0') {
                AddItem_B(chk);
            }
            if (chk.dataset.couple === '1') {
                AddItem_C(chk);
            }
            if (checknow_B < 0) {
                fee_total += 500
            } else {
                fee_total += 2000
            }
            checknow_B -= 1;
        } else {
            RemoveItem(chk);
            checknow_B += 1;
            if (checknow_B < 0) {
                fee_total -= 500
            } else {
                fee_total -= 2000
            }
        }

        if (checknow_B < 0) {
            for (var i = 0; i < professional_B.length; i++) {
                //professional[i].disabled = true;
                professional_B[i].setAttribute("disabled", "");
            }
        } else {
            for (var i = 0; i < professional_B.length; i++) {
                //professional[i].disabled = false;
                professional_B[i].removeAttribute("disabled");
            }
        }
    }
    fee_text.innerText = fee_total
    console.log(fee_total)
}

function HandleProfessionalAmateur_C(chk) {
    CheckDisable_C();
    if (chk.dataset.professional === '1') {
        if (chk.checked === true) {
            AddItem_C(chk);
            if (checknow_C > 0) {
                fee_total += 500
            } else {
                fee_total += 2000
            }
            checknow_C += 1;
        } else {
            RemoveItem(chk);
            checknow_C -= 1;
            if (checknow_C > 0) {
                fee_total -= 500
            } else {
                fee_total -= 2000
            }
        }

        if (checknow_C > 0) {
            for (var i = 0; i < amateur_C.length; i++) {
                //amateur[i].disabled = true;
                amateur_C[i].setAttribute("disabled", "");
            }
        } else {
            for (var i = 0; i < amateur_C.length; i++) {
                //amateur[i].disabled = false;
                amateur_C[i].removeAttribute("disabled");
            }
        }
    } else {
        if (chk.checked === true) {
            AddItem_C(chk);
            if (checknow_C < 0) {
                fee_total += 500
            } else {
                fee_total += 2000
            }
            checknow_C -= 1;
        } else {
            RemoveItem(chk);
            checknow_C += 1;
            if (checknow_C < 0) {
                fee_total -= 500
            } else {
                fee_total -= 2000
            }
        }

        if (checknow_C < 0) {
            for (var i = 0; i < professional_C.length; i++) {
                //professional[i].disabled = true;
                professional_C[i].setAttribute("disabled", "");
            }
        } else {
            for (var i = 0; i < professional_C.length; i++) {
                //professional[i].disabled = false;
                professional_C[i].removeAttribute("disabled");
            }
        }
    }
    fee_text.innerText = fee_total
    console.log(fee_total)
}


function HandleTeens_A(chk) {
    if (chk.checked === true) {
        if (chk.dataset.couple === '0') {
            AddItem_A(chk);
        }
        if (chk.dataset.couple === '1') {
            AddItem_C(chk);
        }
        if (checknow_Teens_A > 0) {
            fee_total += 500
        } else {
            fee_total += 2000
        }
        checknow_Teens_A += 1;
    } else {
        RemoveItem(chk);
        checknow_Teens_A -= 1;
        if (checknow_Teens_A > 0) {
            fee_total -= 500
        } else {
            fee_total -= 2000
        }
    }
    CheckDisable_A();
    fee_text.innerText = fee_total
    console.log(fee_total)
}

function HandleTeens_B(chk) {
    if (chk.checked === true) {
        if (chk.dataset.couple === '0') {
            AddItem_B(chk);
        }
        if (chk.dataset.couple === '1') {
            AddItem_C(chk);
        }
        if (checknow_Teens_B > 0) {
            fee_total += 500
        } else {
            fee_total += 2000
        }
        checknow_Teens_B += 1;
    } else {
        RemoveItem(chk);
        checknow_Teens_B -= 1;
        if (checknow_Teens_B > 0) {
            fee_total -= 500
        } else {
            fee_total -= 2000
        }
    }
    CheckDisable_B();
    fee_text.innerText = fee_total
    console.log(fee_total)
}



function CheckDisable() {
    CheckDisable_A();
    CheckDisable_B();
    CheckDisable_C();
}

function CheckDisable_A() {
    var age = Number(document.getElementById('hidden_age').innerHTML);

    for (var i = 0; i < Teens_A.length; i++) {
        Teens_A[i].removeAttribute("disabled", "");
    }
    /*
    for (var i = 0; i < Adults_A.length; i++) {
        Adults_A[i].removeAttribute("disabled", "");
    }
    */

    for (var i = 0; i < Teens_A.length; i++) {
        if (Number(Teens_A[i].dataset.age) < age || Number(Teens_A[i].dataset.age) > age + 3) {
            Teens_A[i].setAttribute("disabled", "");
        }
    }

    for (var i = 0; i < Teens_A.length; i++) {
        if (Number(Teens_A[i].dataset.age) <= partner_age + 3 && Number(Teens_A[i].dataset.age) >= partner_age && Number(Teens_A[i].dataset.couple) == 1) {
            Teens_A[i].removeAttribute("disabled", "");
        }
    }
    /*
    for (var i = 0; i < Adults_A.length; i++) {
        if (Number(Adults_A[i].dataset.age) > age || iscouple != 1) {
            Adults_A[i].setAttribute("disabled", "");
        }
    }

    for (var i = 0; i < Adults_A.length; i++) {
        if (Number(Adults_A[i].dataset.age) <= partner_age && Number(Adults_A[i].dataset.couple) == iscouple) {
            Adults_A[i].removeAttribute("disabled", "");
        }
    }
    */

}

function CheckDisable_B() {
    var age = Number(document.getElementById('hidden_age').innerHTML);

    for (var i = 0; i < Teens_B.length; i++) {
        Teens_B[i].removeAttribute("disabled", "");
    }

    /*
    for (var i = 0; i < Adults_B.length; i++) {
        Adults_B[i].removeAttribute("disabled", "");
    }
    */

    for (var i = 0; i < Teens_B.length; i++) {
        if (Number(Teens_B[i].dataset.age) < partner_age || Number(Teens_B[i].dataset.age) > partner_age + 3) {
            Teens_B[i].setAttribute("disabled", "");
        }
    }

    for (var i = 0; i < Teens_B.length; i++) {
        if (Number(Teens_B[i].dataset.age) <= age + 3 && Number(Teens_B[i].dataset.age) >= age && Number(Teens_B[i].dataset.couple) == 1) {
            Teens_B[i].removeAttribute("disabled", "");
        }
    }

    /*
    for (var i = 0; i < Adults_B.length; i++) {
        if (Number(Adults_B[i].dataset.age) > partner_age) {
            Adults_B[i].setAttribute("disabled", "");
        }
    }

    for (var i = 0; i < Adults_B.length; i++) {
        if (Number(Adults_B[i].dataset.age) <= age && iscouple == Number(Adults_B[i].dataset.couple)) {
            Adults_B[i].removeAttribute("disabled", "");
        }
    }
    */
}

function CheckDisable_C() {
    var age = Number(document.getElementById('hidden_age').innerHTML);

    for (var i = 0; i < Adults.length; i++) {
        Adults[i].setAttribute("disabled", "");
    }

    for (var i = 0; i < Teens_C.length; i++) {
        Teens_C[i].setAttribute("disabled", "");
    }

    for (var i = 0; i < Teens_C.length; i++) {
        if (age <= Number(Teens_C[i].dataset.age) && Number(Teens_C[i].dataset.age) <= age + 3) {
            Teens_C[i].removeAttribute("disabled", "");
        }

        if (partner_age <= Number(Teens_C[i].dataset.age) && Number(Teens_C[i].dataset.age) <= partner_age + 3) {
            Teens_C[i].removeAttribute("disabled", "");
        }
    }


    for (var i = 0; i < Adults.length; i++) {
        if (partner_age >= Number(Adults[i].dataset.age)) {
            Adults[i].removeAttribute("disabled", "");
        }

        if (age >= Number(Adults[i].dataset.age)) {
            Adults[i].removeAttribute("disabled", "");
        }
    }

}

function CheckPartner() {
    var tab = document.getElementById("player2-tab")
    var tab2 = document.getElementById("couple-tab")
    if (CheckPartner_name() && CheckPartner_birthday() && CheckPartner_email()) {
        iscouple = 1;
        CheckDisable_A();
        CheckDisable_B();
        CheckDisable_C();
        tab.setAttribute("class", "nav-link");
        tab2.setAttribute("class", "nav-link");

    } else {
        iscouple = 0;
        CheckDisable_A();
        CheckDisable_B();
        CheckDisable_C();
        tab.setAttribute("class", "nav-link disabled");
        tab2.setAttribute("class", "nav-link disabled");
    }
}

function CheckPartner_name() {
    var name_1 = document.getElementById('Name').value;
    var name = document.getElementById('partnerName').value;
    document.getElementById("player2-tab").innerHTML = name + "(單人組別)";
    document.getElementById("couple-tab").innerHTML = name_1 + "&" + name + "(雙人組別)";
    document.getElementById("select-player2").innerHTML = name;
    document.getElementById("select-couple").innerHTML = "雙人比賽";
    if (name != '') {
        return true;
    } else {
        return false;
    }
}

function CheckPartner_birthday() {
    var birthday = document.getElementById('partnerAge').value;
    if (birthday != '') {
        GetAge(birthday);
        return true;
    } else {
        return false;
    }
}

function CheckPartner_email() {
    var email = Number(document.getElementById('partnerEmail').value);
    if (email != '') {
        return true;
    } else {
        return false;
    }
}

function GetAge(dateString) {
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    partner_age = age;
    console.log("PartnerAge= ", age);
}

function AddItem_A(chk) {
    var idVal = chk.id;
    var target;
    for (var i = 0; i < labels.length; i++) {
        if (labels[i].htmlFor == idVal) {
            target = labels[i];
            break;
        }
    }
    var itemName = target.innerHTML

    var tag = document.createElement("button");
    tag.setAttribute("class", "btn btn-primary m-1");
    tag.setAttribute("id", idVal);
    var text = document.createTextNode(itemName);
    tag.appendChild(text);
    var element = document.getElementById("modal-player1");
    element.appendChild(tag);
}

function AddItem_B(chk) {
    var idVal = chk.id;
    var target;
    for (var i = 0; i < labels.length; i++) {
        if (labels[i].htmlFor == idVal) {
            target = labels[i];
            break;
        }
    }
    var itemName = target.innerHTML

    var tag = document.createElement("button");
    tag.setAttribute("class", "btn btn-primary m-1");
    tag.setAttribute("id", idVal);
    var text = document.createTextNode(itemName);
    tag.appendChild(text);
    var element = document.getElementById("modal-player2");
    element.appendChild(tag);
}

function AddItem_C(chk) {
    var idVal = chk.id;
    var target;
    for (var i = 0; i < labels.length; i++) {
        if (labels[i].htmlFor == idVal) {
            target = labels[i];
            break;
        }
    }
    var itemName = target.innerHTML

    var tag = document.createElement("button");
    tag.setAttribute("class", "btn btn-primary m-1");
    tag.setAttribute("id", idVal);
    var text = document.createTextNode(itemName);
    tag.appendChild(text);
    var element = document.getElementById("modal-couple");
    element.appendChild(tag);
}

function RemoveItem(chk) {
    var section = document.getElementsByTagName("BUTTON");

    for (var i = 0; i < section.length; i++) {
        if (section[i].id == chk.id) {
            var target = section[i];
            target.remove();
            break;
        }
    }
}