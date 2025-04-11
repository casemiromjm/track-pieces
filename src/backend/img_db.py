from PIL import Image
from io import BytesIO
import sqlite3

def convertImgToBLOB(qrcode_img : Image.Image):
    img_bytes = BytesIO()
    qrcode_img.save(img_bytes, format="PNG")

    return img_bytes.getvalue()

def convertBLOBToImg(con : sqlite3.Connection, qrcode_data : int) -> Image.Image:
    cur = con.cursor()
    cur.execute("SELECT qrcode_img FROM Qrcode WHERE qrcode_num = ?", (qrcode_data,))
    blob_data = cur.fetchone()[0]

    return Image.open(BytesIO(blob_data))