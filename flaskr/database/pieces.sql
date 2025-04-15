PRAGMA foreign_keys = ON;

-- uses ROWID as ID attribute

DROP TABLE IF EXISTS Qrcode;
CREATE TABLE Qrcode (
    qrcode_ID INTEGER PRIMARY KEY,
    qrcode_img BLOB UNIQUE NOT NULL,     -- qrcode image
    qrcode_num NUMERIC UNIQUE NOT NULL      -- qrcode number, i.e. content
);

DROP TABLE IF EXISTS Piece;
CREATE TABLE Piece (
    piece_ID INTEGER PRIMARY KEY,
    piece_photo BLOB UNIQUE NOT NULL,
    model TEXT NOT NULL,
    brand TEXT NOT NULL,
    value NUMERIC NOT NULL CHECK (value > 0),
    quantity NUMERIC NOT NULL CHECK (quantity > 0) DEFAULT 1,
    qrcode INTEGER UNIQUE NOT NULL,
    isBroke BOOL NOT NULL DEFAULT false,       -- if true, the piece get hidden in the db

    FOREIGN KEY (qrcode) REFERENCES Qrcode(qrcode_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Event;
CREATE TABLE Event (
    event_ID INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    date DATE
);

-- if a piece is here, it can not be selected to another event
DROP TABLE IF EXISTS PieceInEvent;
CREATE TABLE PieceInEvent (
    piece_ID INTEGER,
    event_ID INTEGER,
    PRIMARY KEY (piece_ID, event_ID),

    FOREIGN KEY (piece_ID) REFERENCES Piece(piece_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (event_ID) REFERENCES Event(event_ID) ON UPDATE CASCADE ON DELETE CASCADE
);
