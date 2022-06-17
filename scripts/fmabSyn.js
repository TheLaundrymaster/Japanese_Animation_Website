//The use of ajax to to get the summary for specific shows searched in the request using the kitsu API
//The summary is sent using the specific elementIds for each show
//Source: https://kitsu.docs.apiary.io/#introduction/json:api for the api
var request = new XMLHttpRequest();


request.onreadystatechange = function getInfo () {
    if (this.readyState === 4) {
        var summ = JSON.parse(this.responseText);
        const {data: {0: {attributes: {synopsis}}}} = summ

        document.getElementById("fmab").innerHTML =" "+ synopsis;

    }
};
request.open('GET', 'https://kitsu.io/api/edge/anime?filter[text]=fullmetal%20alchemist%20brotherhood,?page[size]=1&page[size]=2')

request.send();