document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('choicesForm');
    const status = document.getElementById('status');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        const formData = new FormData(form);

        fetch('process_form.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            status.textContent = data;
            form.reset();
        })
        .catch(error => {
            status.textContent = 'An error occurred: ' + error.message;
            status.style.color = 'red';
        });
    });
});
