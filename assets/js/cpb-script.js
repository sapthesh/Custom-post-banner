document.addEventListener('DOMContentLoaded', function() {
    var closeButton = document.getElementById('cpb-banner-close');
    var bannerWrapper = document.getElementById('cpb-banner');

    if (closeButton && bannerWrapper) {
        closeButton.addEventListener('click', function() {
            bannerWrapper.style.display = 'none';
        });
    }
});
