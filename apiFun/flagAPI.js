const input = document.getElementById("countryname");

//Add an event listern for when a key is pressed
input.addEventListener("keyup", findFlag);

async function findFlag(event) {
  const countryname = event.target.value;
  const URL = `https://restcountries.eu/rest/v2/name/${countryname}?fullText=true`;
  console.log(URL);

    //send network requests to the server
    const response = await fetch(URL);

    //Get the API json files
    const countryData = await response.json();
    console.log("Data: ", countryData);

    //display the flag data
    const result = document.getElementById("flag");
    result.innerHTML = `
        <img src=${countryData[0].flag} style="width: 30%; height: 30%">
      `;
}
