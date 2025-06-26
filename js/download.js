function downloadQR() {
    const qrImg = document.querySelector('.qr-code img');
    if (!qrImg) {
        console.error("QR Code image not found");
        return;
    }

    // temp a tag
    const a = document.createElement('a');
    a.href = qrImg.src;
    a.download = 'qrcode.png';

    document.body.appendChild(a);
    a.click();

    document.body.removeChild(a);
}

document.addEventListener('DOMContentLoaded', function() {
    // Find all download buttons (both buttons and anchor tags within .download-btn)
    const downloadButtons = document.querySelectorAll('.download-btn button, .download-btn a');
    
    // Add click event listeners to each button
    downloadButtons.forEach(button => {
        button.addEventListener('click', downloadQR);
    });
});
