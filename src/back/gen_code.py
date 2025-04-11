import random

QR_CODE_SIZE = 6

def generateRandomCode():
    code = 0

    for i in range(QR_CODE_SIZE):

        if i == 0:  # first digit; cant start with 0
            digit = random.randint(1,9)
        else:       # other digits
            digit = random.randint(0,9)

        code += digit*(10**(QR_CODE_SIZE-(i+1)))

    return code
