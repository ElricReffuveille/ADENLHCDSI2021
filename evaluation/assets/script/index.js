let articles = document.querySelectorAll('article');

articles.forEach(article => article.addEventListener('click', e => {

  article.classList.remove("not_current");
  article.classList.add("current");

  button = article.querySelector('button');
  button.addEventListener('click', e => {
    //Pas opti mais manque de temps
    location.reload();
  });
}));