document.getElementById('forgot-password-form').addEventListener('submit', function(e){
    e.preventDefault(); // prevent actual form submission

    // hide the form
    this.classList.add('hidden');

    // Show the success message
    document.getElementById('success-message').classList.remove('hidden');

});