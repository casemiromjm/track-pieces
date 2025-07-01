async function handleQrcodeScan(qrcodeMessage) {
    const qrcode_data = qrcodeMessage.match(/\bd{6}\b/) ? qrcodeMessage.match(/\bd{6}\b/)[0] : null;

    //TODO
}
