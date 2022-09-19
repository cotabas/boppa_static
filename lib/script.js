const closeButton = document.getElementsByClassName('close');
const popUp = document.getElementById('good_send');

if (window.location.search == '?sent=good') {
  popUp.style['visibility'] = 'visible'
}

closeButton[0].onclick = () => {
  popUp.style['visibility'] = 'hidden'
}
