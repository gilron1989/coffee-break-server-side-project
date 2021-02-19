function register() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("error").innerHTML = request.responseText;
        }
    }
    request.open("POST", 'register.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var data = JSON.stringify({
        id: document.getElementById("id").value,
        firstName: document.getElementById("firstName").value,
        lastName: document.getElementById("lastName").value,
        address: document.getElementById("address").value,
        password: document.getElementById("signupPass").value,
        clubMembership: document.getElementById("clubMembership").checked
    });
    request.send(data)

}

function addToCart(e) {
    if (!e.dataset.user) {
        alert("You Must Login in order to continue");
        return
    }
    var request = new XMLHttpRequest();
    request.open("POST", 'cart2.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var data = JSON.stringify({
        itemID: e.dataset.item,
        userID: e.dataset.user,
        status: 0,
        quantity: 1

    });
    request.send(data);
    location.reload();
}

function decreaseFromCart(e) {
    var request = new XMLHttpRequest();
    request.open("POST", 'cart3.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var data = JSON.stringify({
        itemID: e.dataset.item,
        userID: e.dataset.user
    });
    request.send(data);
    location.reload();

}

function increaseFromCart(e) {
    var request = new XMLHttpRequest();

    request.open("POST", 'cart4.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var data = JSON.stringify({
        itemID: e.dataset.item,
        userID: e.dataset.user
    });
    request.send(data);
    location.reload();

}

function removeFromCart(e) {
    var request = new XMLHttpRequest();

    request.open("POST", 'cart5.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var data = JSON.stringify({
        itemID: e.dataset.item,
        userID: e.dataset.user,
        quantity: e.dataset.quantity
    });
    request.send(data);
    setTimeout(1500);

    location.reload();
}

function validateInfo(e) {
    var check = e.dataset.totalprice;
    if (check > 0) {
        finishTrans(e);
    } else {
        alert("Your Cart Is Empty");
    }
}

function finishTrans(e) {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            document.getElementById("error").innerHTML = request.responseText;
        }
    }
    request.open("POST", 'checkout2.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var data = JSON.stringify({
        totalPrice: e.dataset.totalprice,
        userID: e.dataset.user,
        fname: document.getElementById("fname").value,
        email: document.getElementById("email").value,
        address: document.getElementById("adr").value,
        city: document.getElementById("city").value,
        noc: document.getElementById("cname").value,
        creditNum: document.getElementById("ccnum").value,
        expM: document.getElementById("expmonth").value,
        expY: document.getElementById("expyear").value,
        cvv: document.getElementById("cvv").value
    });
    request.send(data);
    console.log(data);
    setTimeout(1500);
}

function warrantyCheck(e) {
    var request = new XMLHttpRequest();
    if (request.readyState == 4 && request.status == 200) {
        document.getElementById("answer").innerHTML = request.responseText;
    }
    var data = JSON.stringify({
        transNum: document.getElementById("transNum").value
    });
    request.open("POST", 'warranty2.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    request.send(data);
    console.log(data);
}

function warrantyCheck() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            alert(request.responseText);
        }
    }
    request.open("POST", 'warranty2.php', true);
    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var data = JSON.stringify({
        transNum: document.getElementById("transNum").value
    });
    request.send(data);

}

function initMap() {
    // The location of Uluru
    const uluru = { lat: 32.085300, lng: 34.781769 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 14,
        center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}

function sendToPersonal() {
    window.location.href = "/ServerSide_final_project/includes/personalInfo.php";
}

function sendToCheckOut() {
    window.location.href = "/ServerSide_final_project/includes/checkout.php";

}

function sendToLogin() {
    window.location.href = "/ServerSide_final_project/includes/login.php";

}

function sendToIndex() {
    window.location.href = "/ServerSide_final_project/index.php";

}

function sendToCart() {
    window.location.href = "/ServerSide_final_project/includes/shopping-cart.php";
}

function sendtoshop() {
    window.location.href = "/ServerSide_final_project/includes/shop.php";
}

function sendToLogOut() {
    window.location.href = "/ServerSide_final_project/includes/logout.php";
}



function checkCounter() {
    var x = document.getElementById("cart-count").innerText;
    if (x == 0) {
        document.getElementById("cart-count").style.display = "none";
    } else {
        document.getElementById("cart-count").style.display = "inline-block";
    }
    // console.log(x)
}


function logPass() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function showPass() {
    var x = document.getElementById("signupPass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function hideLogin() {
    document.getElementById("login").style.display = "none";
}

function openSignup() {
    window.location.href = "/ServerSide_final_project/includes/register.html";
}