document.addEventListener('DOMContentLoaded', function() {
    var buttons = document.querySelectorAll('.dynamicButton');

    buttons.forEach(function(button) {
        button.addEventListener('mouseover', function() {
            button.style.backgroundColor = '#007bff';
            button.style.transform = 'scale(1.1)';
        });

        button.addEventListener('mouseout', function() {
            button.style.backgroundColor = '';
            button.style.transform = '';
        });
    });
});
