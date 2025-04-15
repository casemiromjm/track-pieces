import gen_code
import qrcode
import os
import db_funcs as dbc
from PIL import Image

def generateQrcode(code : int):
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
    path = os.path.join(os.path.expanduser("~"), "Desktop")

    img = qr_code.make_image(fill_color="black", back_color="white")
    #img.save(f"{path}/qrcode.png")         # useful for outputing the qrcode later

    return img

def main():
    qrcode_data = gen_code.generateRandomCode()
    qr = generateQrcode(qrcode_data)
    qr_img = outputQrImage(qr)

    db_con = dbc.createDBConnection()

    dbc.storeQrcode(qrcode_data, qr_img, db_con)

    db_con.close()






if __name__ == "__main__":
    main()
