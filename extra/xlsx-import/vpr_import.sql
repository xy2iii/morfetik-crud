-- Set to 2
CREATE TABLE p_admet (
    id INT NOT NULL AUTO_INCREMENT,
    verbe VARCHAR(255) NOT NULL,
    flex VARCHAR(255) NOT NULL,
    prono VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

LOAD DATA INFILE './p_admet.csv' 
INTO TABLE p_admet 
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n';

UPDATE vslemmes a
INNER JOIN p_admet b ON a.Lemme = b.verbe
SET a.pronominal = 2

-- Set to 1
CREATE TABLE p_prono (
    id INT NOT NULL AUTO_INCREMENT,
    verbe VARCHAR(255) NOT NULL,
    flex VARCHAR(255) NOT NULL,
    prono VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
);

LOAD DATA INFILE './p_prono.csv' 
INTO TABLE p_prono 
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n';

UPDATE vslemmes a
INNER JOIN p_prono b ON a.Lemme = b.verbe
SET a.pronominal = 1