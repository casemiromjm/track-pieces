async function handleQrcodeScan(qrcodeMessage) {
    const match = qrcodeMessage.match(/\b\d{6}\b/);
    const qrcode_data = match ? match[0] : null;

    if (!qrcode_data || typeof qrcodeMessage !== "string") {
        alert("Error: qrcode not valid!")
        throw new Error("qrcode not valid")
    }

    document.getElementById('qrcode-data').textContent = qrcode_data;
}
