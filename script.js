function validateForm() {
	const firstName = document.querySelector('input[name="first_name"]');
	const lastName = document.querySelector('input[name="last_name"]');
	if (firstName.value.trim() === '' || lastName.value.trim() === '') {
		alert('Please enter your first and last name.');
		return false;
	}
	return true;
}