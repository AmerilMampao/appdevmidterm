CREATE TABLE mytbl(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    isbn VARCHAR(255),
        title VARCHAR(255),
        authors VARCHAR(255),
        book_type VARCHAR(255),
        book_qty VARCHAR(255),
        Date_Published VARCHAR(255)
    );

CREATE TABLE admintable(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR (255),
    account_type VARCHAR(1),
    password VARCHAR (255)
);

INSERT INTO admintable(
    email,
    account_type,
    password
)
VALUES(
    '@admin@',
    '1',
    '@admin@'
);

INSERT INTO mytbl(
    isbn,
    title,
    authors,
    book_type,
    book_qty,
    Date_Published
)
VALUES(
    'ZXC12040SKLL',
    'Harry Potter',
    'JK Rowlings',
    'Fantasy',
    '20',
    '29/04/2025'
),(
    'ABC839Z0SKQL',
    'Tralalelo Tralala',
    'BrainRot King',
    'Meme',
    '10',
    '29/04/2025'
);
