PRAGMA foreign_keys = ON;

-- uses ROWID as ID attribute

DROP TABLE IF EXISTS Qrcode;
CREATE TABLE Qrcode (
    qrcode_num TEXT PRIMARY KEY,      -- qrcode data
    qrcode_img TEXT UNIQUE NOT NULL     -- qrcode image path
);

DROP TABLE IF EXISTS PieceType;
CREATE TABLE PieceType (
    type TEXT PRIMARY KEY
);

DROP TABLE IF EXISTS Piece;
CREATE TABLE Piece (
    piece_ID INTEGER PRIMARY KEY,
    piece_photo TEXT UNIQUE NOT NULL,   -- piece photo path
    type TEXT NOT NULL,
    brand TEXT,
    value NUMERIC NOT NULL CHECK (value > 0),
    quantity NUMERIC NOT NULL CHECK (quantity > 0) DEFAULT 1,
    qrcode TEXT UNIQUE NOT NULL,
    purchase_date DATE NOT NULL,
    isBroke BOOL NOT NULL DEFAULT false,       -- if true, the piece get hidden in the db
    isInEvent BOOL NOT NULL DEFAULT false,       -- if true, the piece get hidden in the db

    FOREIGN KEY (qrcode) REFERENCES Qrcode(qrcode_num) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (type) REFERENCES PieceType(type) ON DELETE CASCADE ON UPDATE CASCADE
);

DROP TABLE IF EXISTS Event;
CREATE TABLE Event (
    event_ID INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    date DATE NOT NULL
);

-- if a piece is in an event, it can not be selected to another event
DROP TABLE IF EXISTS PieceInEvent;
CREATE TABLE PieceInEvent (
    piece_ID INTEGER,
    event_ID INTEGER,
    PRIMARY KEY (piece_ID, event_ID),

    FOREIGN KEY (piece_ID) REFERENCES Piece(piece_ID) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (event_ID) REFERENCES Event(event_ID) ON UPDATE CASCADE ON DELETE CASCADE
);

-- Inserting some PieceType
INSERT INTO PieceType (type) VALUES ('taça'), ('copo'), ('travessa');