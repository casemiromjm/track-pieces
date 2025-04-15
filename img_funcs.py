from PIL import Image
from io import BytesIO
import base64
import sqlite3

def convertImgToBLOB(img : Image.Image):
    '''Gets a QR code and converts it to binary info. Return this binary data'''
    img_bytes = BytesIO()
    img.save(img_bytes, format="PNG")

    return img_bytes.getvalue()

def convertBLOBToQR(con : sqlite3.Connection, qrcode_data : int):
    '''Search for a specific QR code. Return the binary info about a QR code'''
    cur = con.cursor()
    cur.execute("SELECT qrcode_img FROM Qrcode WHERE qrcode_num = ?", (qrcode_data,))
    blob_data = cur.fetchone()[0]

    return blob_data

def convertImgToBase64(img):
    img = convertImgToBLOB(img)

    return base64.b64encode(img).decode()
