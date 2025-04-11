import sqlite3

con = sqlite3.connect("/database/pieces.db")
cur = con.cursor()

con.close()