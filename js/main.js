const inputFileButton = document.getElementById('upload-profile');
const profilePhoto = document.querySelector('.upload-profile-image');
profilePhoto.addEventListener('click',() => {
    inputFileButton.click();
})