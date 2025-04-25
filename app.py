from flask import Flask, render_template, request, redirect, url_for
import db
import img_funcs

app = Flask(__name__)

@app.route('/', methods=['POST', 'GET'])
def home():
    if request.method == 'POST':
        if 'generate_qrcode' in request.form:
            return redirect(url_for('generate_qrcode'))
        elif 'add_piece' in request.form:
            return redirect(url_for('add_piece'))
        elif 'search_piece' in request.form:
            return redirect(url_for('search_piece'))
    return render_template("index.html")

@app.route('/generate_qrcode', methods=['POST', 'GET'])
def generate_qrcode():

    import qr

    db_con = db.create_db_connection()

    qr_img = qr.main(db_con)

    qr_b64 = img_funcs.convertImgToBase64(qr_img)

    db.close_db_connection(db_con)

    return render_template('gen_qrcode.html', qr_image=qr_b64)


@app.route('/add_piece', methods=['GET', 'POST'])
def add_piece():
    #TODO
    return render_template("add_piece.html")

@app.route('/search_piece', methods=['GET', 'POST'])
def search_piece():
    #TODO
    return render_template("search_piece.html")

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000)