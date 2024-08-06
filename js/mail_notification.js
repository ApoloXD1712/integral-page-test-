function submitUserForm() {
    var response = grecaptcha.getResponse();
    if (response.length == 0) {
        alertify.error('Por favor, confirme que no es un robot.');
        return false;
    }
    return true;
}