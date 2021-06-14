function myFunction(){
	var ingr = document.getElementById("ingr").value;
	var url = "https://edamam-edamam-nutrition-analysis.p.rapidapi.com/api/nutrition-data?ingr=";
	for(let i = 0; i<3; i=i+1){
		var x = ingr.replace(" ", "%20");
		ingr = x;
	}
	var finalURL = url.concat(x);
	myFetch(finalURL);
}   

function myFetch(finalURL){
	fetch(finalURL, {
		"method": "GET",
		"headers": {
			"x-rapidapi-key": "d976d9da80mshc5b45d938969a73p1632f4jsn4fb210361996",
			"x-rapidapi-host": "edamam-edamam-nutrition-analysis.p.rapidapi.com"
		}
		})
		.then(response => {
			return response.json();
		})
		.then(jsonResp =>{
			afisare(jsonResp.calories);
		})
		.catch(err => {
			console.error(err);
		});
}

function afisare(calories){
	if(calories == 0){
		calories = "input gresit";
	}
	let p = document.createElement("p");
	p.innerText = calories;
	document.getElementById("mainCalculator").appendChild(p);
}