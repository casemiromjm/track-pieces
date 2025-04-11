PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS Qrcode;
CREATE TABLE Qrcode (
    qrcode_ID INTEGER PRIMARY KEY NOT NULL,
    qrcode BLOB UNIQUE NOT NULL,     -- qrcode image
    qrcode_num NUMERIC UNIQUE NOT NULL      -- qrcode number, i.e. content
);

DROP TABLE IF EXISTS Piece;
CREATE TABLE Piece (
    piece_ID INTEGER PRIMARY KEY NOT NULL,
    piece_photo BLOB UNIQUE NOT NULL,
    qrcode INTEGER UNIQUE NOT NULL,
    inEvent BOOL NOT NULL DEFAULT false,      -- if true, it cant be selected to another event
    isBroke BOOL NOT NULL DEFAULT false,       -- if true, the piece get hidden in the db

    FOREIGN KEY (qrcode) REFERENCES Qrcode(qrcode_ID) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Event;
CREATE TABLE Event (
    event_ID INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    date DATE
);

DROP TABLE IF EXISTS PieceInEvent;
CREATE TABLE PieceInEvent (
    piece_ID INTEGER,
    event_ID INTEGER,
    PRIMARY KEY (piece_ID, event_ID),

    FOREIGN KEY (piece_ID) REFERENCES Piece(piece_ID),
    FOREIGN KEY (event_ID) REFERENCES Event(event_ID)
);

