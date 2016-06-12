var toptitre      = document.querySelector('.toptitre');
var titreSection  = document.querySelector('.is-titre');

toptitre.addEventListener('click', function () {
  console.log('coucou');
  titreSection.style.tranform = 'translate3d(0,-100%,0)';
});
