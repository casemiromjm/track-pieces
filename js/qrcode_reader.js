function startQrcodeScanner() {
    const htmlQrcode = new Html5Qrcode("reader");
    htmlQrcode.start(
        { facingMode: "environment" },
        {},
        handleQrcodeScan
    ).catch(err => console.error("Error starting scanner:", err));
}

async function handleQrcodeScan(qrcodeMessage) {
    const match = qrcodeMessage.match(/\b\d{6}\b/);
    const qrcode_data = match ? match[0] : null;

    if (!qrcode_data || typeof qrcodeMessage !== "string") {
        alert("Error: qrcode not valid!")
        throw new Error("qrcode not valid")
    }

    const form = document.getElementById("qrcode-form");
    const input_qrcode_data = document.getElementById("qrcode-data");

    input_qrcode_data.value = qrcode_data;
    form.submit();
}
