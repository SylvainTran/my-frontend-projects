function listerF(listFilms){
	var taille;
	var rep="<div class='table-users' style='overflow: scroll; height: 500px;'>";
	rep+="<div class='header'>Liste des films</div>";
	rep+="<table cellspacing='0'>";
	rep+="<tr><th>NUMERO</th><th>TITRE</th><th>DUREE</th><th>REALISATEUR</th><th>COUVERTURE</th></tr>";
	taille=listFilms.length;
	for(var i=0; i<taille; i++){
		rep+="<tr><td>"+listFilms[i].id+"</td><td>"+listFilms[i].title+"</td><td>"+listFilms[i].duration+"</td><td>"+listFilms[i].author+"</td><td><img src='../img/"+listFilms[i].cover+"' width=80 height=80></td></tr>";		 
	}
	rep+="</table>";
	rep+="</div>";
	$('#content-container').html(rep);
}
function showListByCat(listFilms){
	// Vider la page
	toggleAddFilmForm(false);
	$('#content-container').html("");
	var taille;
	var rep="<div class='table-users' style='overflow: scroll; height: 500px;'>";
	rep+="<div class='header'>Liste des films</div>";
	rep+="<table cellspacing='0'>";
	rep+="<tr><th>NUMERO</th><th>TITRE</th><th>DUREE</th><th>REALISATEUR</th><th>COUVERTURE</th></tr>";
	taille=listFilms.length;
	for(var i=0; i<taille; i++){
		rep+="<tr><td>"+listFilms[i].id+"</td><td>"+listFilms[i].title+"</td><td>"+listFilms[i].duration+"</td><td>"+listFilms[i].author+"</td><td><img src='../img/"+listFilms[i].cover+"' width=80 height=80></td></tr>";		 
	}
	rep+="</table>";
	rep+="</div>";
	$('#content-container').html(rep);
}
function refreshPage(listFilms){
	toggleAddFilmForm(false);
	// Empty page
	$('#content-container').html("");
	// Show red message
	$('#msg').html(listFilms.msg);
	// Remove red message after 5 secs
	setTimeout(function(){
		$('#msg').html("");
	}, 5000);
	// Re display the list of products
	setTimeout(function(){
		requests('list');
	}, 5000);
}

var view = function(action, donnees){
	switch (action){
		case 'create':
			refreshPage(donnees);
			break;
		case 'lister':
			listerF(donnees.listeFilms);
			break;
		case 'list-by-cat':
			showListByCat(donnees.listeFilms);
			break;
		default:
		break;
	}
}
