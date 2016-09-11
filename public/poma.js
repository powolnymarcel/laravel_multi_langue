jQuery(document).ready(function ($) {

});


//Va permettre d'afficher une modal avec un formulaire
    //url : l'url du href
    //title: title donné en parametre à la fonction
function PomaModal (url, title){
        //Affichage d'un mess pour prevennir de ce qui ce passe
    $('#poma-modal-content').html('...... Loading content, please wait ........');
    $('.modal-title').html(title);
    //On remplace le contenu par celui chargé via le LOAD
    $('#poma-modal-content').load(url, function(){
    });
    $('#poma-modal').modal('show');
}

function PomaConfirmDelete(url){
    if(confirm('Etes vous certain?')){
        window.location.href = url;
    }
    return false;
}

