<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
$(document).ready(function() {
    $('#chk').change(function() {
        var isChecked = $(this).is(':checked');
        
        // Invia la richiesta AJAX al server PHP
        $.ajax({
            url: '../php/log.php',
            type: 'POST',
            data: { checked: isChecked }
        });
    });
});