function trocarTema() {
  const brilho = document.getElementById("brilho");
  const bodyElement = document.querySelector("body");

  if (bodyElement.classList.contains("text-white")) {
    brilho.classList.remove("bi-brightness-high");
    brilho.classList.add("bi-brightness-high-fill");
    bodyElement.classList.remove("text-white", "bg-dark");
    bodyElement.classList.add("text-dark", "bg-white");
    document.cookie = "theme=light; path=/";
  } else {
    brilho.classList.remove("bi-brightness-high-fill");
    brilho.classList.add("bi-brightness-high");
    bodyElement.classList.remove("text-dark", "bg-white");
    bodyElement.classList.add("text-white", "bg-dark");
    document.cookie = "theme=dark; path=/";
  }
  carregarTema();
}

function carregarTema() {
  const bodyElement = document.querySelector("body");
  const theme = getCookie("theme");

  if (theme === "light") {
    mudarImagemFundoTema("light");
    var sheet = document.createElement("style");
    sheet.innerHTML =
      ".corzinha {background-color: #fff;} .tabelinha {color: #000;}";
    document.body.appendChild(sheet);
    brilho.classList.remove("bi-brightness-high");
    brilho.classList.add("bi-brightness-high-fill");
    bodyElement.classList.remove("text-white", "bg-dark");
    bodyElement.classList.add("text-dark", "bg-white");
  } else {
    mudarImagemFundoTema("dark");
    var sheet = document.createElement("style");
    sheet.innerHTML =
      ".corzinha {background-color: #212529;} .tabelinha {color: #fff;}";
    document.body.appendChild(sheet);
    brilho.classList.remove("bi-brightness-high-fill");
    brilho.classList.add("bi-brightness-high");
    bodyElement.classList.remove("text-dark", "bg-white");
    bodyElement.classList.add("text-white", "bg-dark");
  }
}

function mudarImagemFundoTema(nomeTema) {
  const bodyElement = document.querySelector("body");
  if (nomeTema === "light") {
    bodyElement.style.backgroundImage = "url('../img/light-theme.jpg')";
  } else if (nomeTema === "dark") {
    bodyElement.style.backgroundImage = "url('../img/dark-theme.jpg')";
  }
}

function getCookie(name) {
  const value = "; " + document.cookie;
  const parts = value.split("; " + name + "=");
  if (parts.length === 2) {
    return parts.pop().split(";").shift();
  }
}
