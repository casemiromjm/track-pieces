function downloadQR(event) {
    const button = event.currentTarget;
    const img_path = button.getAttribute('qrcode-path');

    if (!img_path) {
        console.error("QR Code path not found");
        return;
    }

    // temp a tag
    const a = document.createElement('a');
    a.href = img_path;
    a.download = 'qrcode.png';

    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
}

document.addEventListener('DOMContentLoaded', function () {
    const downloadButtons = document.querySelectorAll('.download-btn');

    downloadButtons.forEach(button => {
        button.addEventListener('click', downloadQR);
    });
});
