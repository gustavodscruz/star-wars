/**
 *
 */
const carregaHello = async () => {
  const response = await fetch("http://localhost:8000/");
  const dados = await response.json();
  console.log(dados.results);
  return dados.results;
};

/**
 * Loads information into the 'lista-pessoas' element by clearing its contents.
 * @param {Array} data - The data to be loaded. Typically an array or list of people objects.
 */
const loadInfo = (data) => {
  const lista = document.getElementById("lista-pessoas");
  lista.innerHTML = "";
  data.forEach((u) => {
    let h1 = document.createElement("h1");
    h1.textContent = u.title;
    let p = document.createElement("p");
    p.textContent = u.opening_crawl;
    lista.appendChild(h1);
    lista.appendChild(p);
  });
};

document.getElementById("carregar-dados").addEventListener("click", () => {
  carregaHello()
    .then((dados) => loadInfo(dados))
    .catch((error) => console.error(`Erro: ${error}`));
});
