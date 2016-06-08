function playGame(user_choice) {

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    var xhr=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    var xhr=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange=function() {
    if (xhr.readyState==4 && xhr.status==200) {
      document.getElementById("images").innerHTML=xhr.responseText;
    }
  }
  xhr.open("GET","playGame.php?user_choice="+user_choice,true);
  xhr.send();
}

function bet(betAmount){
	betVar = betAmount;
	document.getElementById("betValue").innerHTML =  betVar;
	$.post('playGame.php', {wager: betVar});
}
function clearbet(){
	betVar = 0;
	document.getElementById("betValue").innerHTML =  betVar;
}

function playCoinFlip(user_choice) {

  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    var xhr=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    var xhr=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhr.onreadystatechange=function() {
    if (xhr.readyState==4 && xhr.status==200) {
      document.getElementById("images").innerHTML=xhr.responseText;
    }
  }
  xhr.open("GET","playCoinFlip.php?user_choice="+user_choice,true);
  xhr.send();
}