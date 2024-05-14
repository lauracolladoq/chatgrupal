import './bootstrap';

// Función para ocultar/mostrar los comentarios de una publicación
document.querySelectorAll('[id^="toggleComments-"]').forEach(function (toggleButton) {
    toggleButton.addEventListener('click', function () {
        var postId = this.id.split('-').pop();
        var commentsDiv = document.getElementById('comments-' + postId);
        commentsDiv.style.display = commentsDiv.style.display === 'none' ? 'block' : 'none';
    });
});
