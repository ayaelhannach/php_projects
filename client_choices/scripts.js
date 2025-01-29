document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('choicesForm');
    const status = document.getElementById('status');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        // تعريف formData بشكل صحيح
        const formData = new FormData(form);

        fetch('http://localhost/client_choices/process_form.php', {
            method: 'POST',
            body: formData,
            mode: 'cors' // تأكد من أنك لا تستخدم no-cors
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
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
