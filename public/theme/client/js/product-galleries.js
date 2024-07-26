document.addEventListener('DOMContentLoaded', function() {
    const mainImage = document.getElementById('mainImage');
    const thumbnails = document.querySelectorAll('.thumbnail-item');

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            // Cập nhật ảnh chính
            mainImage.src = this.dataset.image;

            // Cập nhật trạng thái active
            thumbnails.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const mainImage = document.getElementById('mainImage');
    const thumbnails = document.querySelectorAll('.thumbnail-item');

    // Khôi phục ảnh đã chọn từ localStorage nếu có
    const savedImage = localStorage.getItem('selectedImage');
    if (savedImage) {
        mainImage.src = savedImage;
        thumbnails.forEach(t => {
            if (t.dataset.image === savedImage) {
                t.classList.add('active');
            } else {
                t.classList.remove('active');
            }
        });
    }

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            const newImage = this.dataset.image;

            // Cập nhật ảnh chính
            mainImage.src = newImage;

            // Lưu ảnh đã chọn vào localStorage
            localStorage.setItem('selectedImage', newImage);

            // Cập nhật trạng thái active
            thumbnails.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });
});
