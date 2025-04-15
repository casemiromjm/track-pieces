import sqlite3
from PIL import Image
import img_funcs

def create_db_connection():
    con = sqlite3.connect("./database/pieces.db")

    return con

def close_db_connection(con : sqlite3.Connection):
    con.close()

def storeQrcode(qrcode_data : int, qrcode_img : Image.Image, con : sqlite3.Connection):
    cur = con.cursor()

    qrcode_img_data = img_funcs.convertImgToBLOB(qrcode_img)
    
    cur.execute("INSERT INTO Qrcode (qrcode_img, qrcode_num) VALUES (?, ?)",
                (qrcode_img_data, qrcode_data)
    )

    con.commit()
