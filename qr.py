import gen_code
import qrcode
import os
import db
from PIL import Image

def generateQrcode(code : int):
    '''Generates a QR code and returns it'''
    qr = qrcode.QRCode(
        version=1,
        error_correction=qrcode.constants.ERROR_CORRECT_L,
        box_size=10,
        border=4,
    )

    qr.add_data(code)
    qr.make(fit=True)

    return qr

def outputQrImage(qr_code : qrcode.QRCode) -> Image.Image:
    '''Designed to output QR code image to the desktop, but inactive for now. Return the QR code image info'''
    path = os.path.join(os.path.expanduser("~"), "Desktop")

    img = qr_code.make_image(fill_color="black", back_color="white")
    #img.save(f"{path}/qrcode.png")         # useful for outputing the qrcode later

    return img

def main(db_con=None):
    qrcode_data = gen_code.generateRandomCode()
    qr = generateQrcode(qrcode_data)
    qr_img = outputQrImage(qr)

    db.storeQrcode(qrcode_data, qr_img, db_con)

    return qr_img

if __name__ == "__main__":
    main()
