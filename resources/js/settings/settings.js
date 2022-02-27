/** @type {HTMLImageElement} profileImage */
const profileImage = document.getElementById('profile-image');
const currentImgSrc = profileImage.src;

/** @type {HTMLInputElement} imageInput */
const imageInput = document.getElementById('image');

imageInput.onchange = () => {
    if (imageInput.files[0]) {
        profileImage.src = URL.createObjectURL(imageInput.files[0]);
        document.getElementById('preview-text').hidden = false;
    }
    else {
        profileImage.src = currentImgSrc;
        document.getElementById('preview-text').hidden = true;
    }
}
