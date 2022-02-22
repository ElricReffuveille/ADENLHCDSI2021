jQuery(document).ready(function($) {
    
    $('form').on('submit', function(event) {
        event.preventDefault();
        
        if ($('#desc').val() != "" && $('#date').val() != "") {
            //Valeurs du formulaire
            let description = $('#desc').val();
            let echeance = $('#date').val();

            //Compteur de tache
            let cpt = 0;
            cpt = $('.task-item').length + 1;

            //Nouvelle tâche
            let task = "";
            task += '<li id="task'+cpt+'" class="task-item">';
            task += '<div class="row">';
            task += '<div class="col">';
            task += '<p class="task-number">'+cpt+'</p>';
            task += '<p class="task-content">';
            task += '<span id="task-desc">'+description+'</span>';
            task += '<time id="task-date" datetime="'+echeance+'">'+$.datepicker.formatDate('dd M yy', new Date(echeance))+'</time>';
            task += '</p>';
            task += '</div>';
            task += '<div class="col">';
            task += '<div class="task-btn fas fa-check btn-icon"></div>';
            task += '<div class="task-btn fas fa-pen btn-icon"></div>';
            task += '<div class="task-btn fas fa-trash btn-icon"></div>';
            task += '</div>';
            task += '</div>';
            task += '</li>';
            
            //Ajout nouvelle tâche
            $('.tasks').append(task);

            //Valeurs du formulaire
            $('#desc').val("");
            $('#date').val("");
        }
    });

    //CLIC CHECK
    $(document).on('click', '.fa-check', function() {
            $(this).parent().parent().css( "background-color", "lightgreen" );
            $(this).css("color", "lightgrey");
    });
    
    //CLICK MODIF
    $(document).on('click', '.fa-pen', function() {

    });

    //CLIC DEL
    $(document).on('click', '.fa-trash', function() {
        $(this).parent().parent().remove();
    });


});

