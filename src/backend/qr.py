import gen_code
import qrcode

def generateQrcode(code : int):
    qr = qrcode.QRCode(
        version=1,
        error_correction=qrcode.constants.ERROR_CORRECT_L,
        box_size=10,
        border=4,
    )

    # add data must have the student name and the count of invites

    qr.add_data(code)
    qr.make(fit=True)

    return qr

def main():
    code = gen_code.generateRandomCode()

    print(code)

if __name__ == "__main__":
    main()
