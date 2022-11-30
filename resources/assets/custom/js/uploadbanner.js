const imgDiv = document.querySelector('.banner-div');
const banner = document.querySelector('#banner');
const bannerfile = document.querySelector('#banner-file');
const bannerBtn = document.querySelector('#bannerBtn');

imgDiv.addEventListener('mouseenter', function () {
    bannerBtn.style.display = "block";
});

imgDiv.addEventListener('mouseleave', function () {
    bannerBtn.style.display = "none";
});

bannerfile.addEventListener('change', function () {
    const choosedFile = this.files[0];
    if (choosedFile) {

        const reader = new FileReader();

        reader.addEventListener('load', function () {
            banner.setAttribute('src', reader.result);
        });
        reader.readAsDataURL(choosedFile);
    }
});
