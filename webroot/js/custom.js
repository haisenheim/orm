/**
 * Created by owner on 24-Jul-18.
 */
$(document).ready(function(){

    $('#example').DataTable({
        "language": {
            "paginate": {
                "previous": "Precedent",
                "search":"Rechercher",
                "next":"Suivant"
            }
        }
    });

    $('table').addClass('table table-bordered');
    $('form input').addClass('form-control');
    $('form select').addClass('form-control');
    $('div.content').css({
        'border':'1px solid #999',
        'border-radius':'5px',
        'margin-top':'20px',
        'padding':'15px',
        'opacity':1,
        'background-color':'#FFF'
    });

});


