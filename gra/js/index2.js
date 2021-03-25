'use strict';

var tinderContainer = document.querySelector('.tinder');
var allCards = document.querySelectorAll('.tinder--card');
var nope = document.getElementById('nope');
var love = document.getElementById('love');

function initCards(card, index) {
  var newCards = document.querySelectorAll('.tinder--card:not(.removed)');

  newCards.forEach(function (card, index) {
    card.style.zIndex = allCards.length - index;
    card.style.transform = 'scale(' + (20 - index) / 20 + ') translateY(-' + 30 * index + 'px)';
    card.style.opacity = (10 - index) / 10;

  });
  
  tinderContainer.classList.add('loaded');

}

initCards();

//test
var logininfo = document.getElementsByClassName("login-info")[0];
logininfo.onclick = function() {
var cards = document.getElementsByClassName("tinder--card")[0];
cards.classList.remove("removed");
}


// $(".tinder--card:not(.removed) img")[0].src = "https://us.123rf.com/450wm/vipdesignusa/vipdesignusa1603/vipdesignusa160300025/52899445-the-reverse-side-of-a-playing-card-.jpg?ver=6";


function createButtonListener(love) {
  return function (event) {
	//document.getElementsByClassName('tinder--cards')[0].innerHTML +="<div class='tinder--card'><img src='https://us.123rf.com/450wm/vipdesignusa/vipdesignusa1603/vipdesignusa160300025/52899445-the-reverse-side-of-a-playing-card-.jpg?ver=6'><h3>Demo card 5</h3><p>This is a demo for Tinder like swipe cards</p></div>";
    var cards = document.querySelectorAll('.tinder--card:not(.removed)');
    var moveOutWidth = document.body.clientWidth * 1.5;

    if (!cards.length) return false;

    var card = cards[0];

    card.classList.add('removed');

    if (love) {
      card.style.transform = 'translate(' + moveOutWidth + 'px, -100px) rotate(-30deg)';
    } else {
      card.style.transform = 'translate(-' + moveOutWidth + 'px, -100px) rotate(30deg)';
    }

    initCards();
	
	

		

  };
}

var nopeListener = createButtonListener(false);
var loveListener = createButtonListener(true);

nope.addEventListener('click', nopeListener);
love.addEventListener('click', loveListener);