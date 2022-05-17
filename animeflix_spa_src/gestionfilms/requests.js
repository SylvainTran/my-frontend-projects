let requests = function(action) {
    let formFilm;
    switch(action){
        case 'create':
            formFilm=new FormData(document.getElementById('form--create-new-product'));
            formFilm.append('action', 'create');
            $.ajax({
                url: '../gestionFilms/animeController.php',
                type: 'POST',
                data: formFilm,
                contentType : false,
                processData : false,
                dataType: 'json',
                success: function(response) {
                    //alert(response);
                    view('create', response)
                },
                fail: function(err) {

                }
            });
            break;
        case 'list': 
            $.ajax({
                url  : "../gestionFilms/animeController.php",
                type :'POST',
                data : {action:'lister'},
                dataType : 'json',
                success: function(reponse){
                    //alert(reponse);
                    view('lister',reponse)
                },
                fail : function(err){
                    
                } 
            });
            break;
        case 'list-by-cat': 
            $.ajax({
                url  : "../gestionFilms/animeController.php",
                type :'POST',
                data : $('#dropdown-menu--category-form').serialize(),
                dataType : 'json',
                success: function(reponse){
                    //alert(reponse);
                    view('list-by-cat',reponse)
                },
                fail : function(err){
                    
                } 
            });        
            break;    
        default: 
        break;
    }
}