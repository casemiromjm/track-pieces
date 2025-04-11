import gen_code
import qrcode
import os

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

def outputQrImage(qr_code : qrcode.QRCode):
    path = os.path.join(os.path.expanduser("~"), "Desktop")

    img = qr_code.make_image(fill_color="black", back_color="white")
    #img.save(f"{path}/qrcode.png")         # useful for print the qrcode later on

    return img


def main():
    code = gen_code.generateRandomCode()
    qr = generateQrcode(code)
    qr_img = outputQrImage(qr)

    





if __name__ == "__main__":
    main()
