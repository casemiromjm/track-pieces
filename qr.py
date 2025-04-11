import qrcode
from qrcode.image.pil import Image, PilImage, ImageDraw

with open("convites.csv") as file:

    invite_num = 0

    for line in file:

        line = line.split(',')

        if line[0] == ' ':
            continue

        student_name = line[0]
        invites_quantity = int(line[1])

        for i in range(1, invites_quantity+1):

            invite_num += 1

            qr = qrcode.QRCode(
                version=1,
                error_correction=qrcode.constants.ERROR_CORRECT_L,
                box_size=10,
                border=4,
            )

            # add data must have the student name and the count of invites

            qr.add_data(f"Formand@: {student_name} {i}/{invites_quantity}")
            qr.make(fit=True)

            img = qr.make_image(fill_color="black", back_color="white")

            img.save(f"./invites_qrcode/inv{invite_num}.png", format="PNG")
            print("QRCode created")