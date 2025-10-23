CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(150) NOT NULL UNIQUE,
  senha VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (email, senha)
VALUES ('renannavarro@gmail.com', SHA2('123456', 256));
