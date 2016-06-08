function checkUserName(userName) {
  var xhr = new XMLHttpRequest();

// Register the embedded handler function
  xhr.onreadystatechange = function () {
  
    if (xhr.readyState == 4 && xhr.status == 200) {
		 document.getElementById("err_submit").innerHTML=xhr.responseText;
    }
  }
  xhr.open("GET", "login_validate.php?userName=" + userName, true);
  xhr.send(null);


}

function checkPassword(password) {
  var xhr = new XMLHttpRequest();

// Register the embedded handler function
  xhr.onreadystatechange = function () {
  
    if (xhr.readyState == 4 && xhr.status == 200) {
		 document.getElementById("err_submit").innerHTML=xhr.responseText;
    }
  }
  xhr.open("GET", "login_validate.php?password=" + password, true);
  xhr.send(null);


}

function filterObjects(filter) {

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    var xhr=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    var xhr=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange=function() {
    if (xhr.readyState==4 && xhr.status==200) {
      document.getElementById("storetable").innerHTML=xhr.responseText;
    }
  }
  xhr.open("GET","filter_store.php?filter="+filter,true);
  xhr.send();
}

function addToCart(addcart) {

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    var xhr=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    var xhr=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange=function() {
    if (xhr.readyState==4 && xhr.status==200) {
      document.getElementById("cart_nav").innerHTML=xhr.responseText;
    }
  }
  xhr.open("GET","addItemCart.php?addcart="+addcart,true);
  xhr.send();
}

function removeFromCart(item) {

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    var xhr=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    var xhr=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange=function() {
    if (xhr.readyState==4 && xhr.status==200) {
      document.getElementById("cart_container").innerHTML=xhr.responseText;
    }
  }
  xhr.open("GET","removeItemCart.php?item="+item,true);
  xhr.send();
}

 