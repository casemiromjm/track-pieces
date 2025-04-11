import sqlite3
import qrcode
from io import BytesIO
from PIL import Image
import img_db

def createDBConnection():
    con = sqlite3.connect("./database/pieces.db")

    return con

def storeQrcode(qrcode_data : int, qrcode_img : Image.Image, con : sqlite3.Connection):
    cur = con.cursor()

    qrcode_img_data = img_db.convertImgToBLOB(qrcode_img)
    
    cur.execute("INSERT INTO Qrcode (qrcode_img, qrcode_num) VALUES (?, ?)",
                (qrcode_img_data, qrcode_data)
    )

    con.commit()
