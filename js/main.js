const password = document.getElementById('password');
const confirmPassword = document.getElementById('confirm_pwd');
const error = document.getElementById('confirm_error');
const form = document.getElementById('reg-form');
const uploadProfilePicture = document.getElementById('upload-profile');


uploadProfilePicture.addEventListener('change',(pictureEvent) => {
	if(pictureEvent.target.files && pictureEvent.target.files[0]){
		let reader = new FileReader();
		reader.onload = (e) => {
			document.querySelector('#profile-image').src = e.target.result
			document.querySelector('.camera-icon').style = "display:none";
		}
	reader.readAsDataURL(pictureEvent.target.files[0]);
	}
})

form.addEventListener('submit',(formEvent) => {
if(password.value.trim() !== confirmPassword.value.trim()){
	formEvent.preventDefault();
	error.innerHTML = "Password not matched";
}
})

