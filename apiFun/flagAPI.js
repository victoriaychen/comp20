const input = document.getElementById("countryname");
input.addEventListener("keyup", findFlag);

async function findCapital(event) {
  const countryname = event.target.value;
  const URL = `https://restcountries.eu/rest/v2/name/${countryname}?fullText=true`;
  console.log(URL);

    const response = await fetch(URL);
    const countryData = await response.json();
    console.log("Data: ", countryData);

    const result = document.getElementById("flag");
    result.innerHTML = `
        <img src=${countryData[0].flag} style="width: 30%; height: 30%">
      `;
}
