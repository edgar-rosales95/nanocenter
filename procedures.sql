DROP PROCEDURE IF EXISTS RegisterUser;
DROP PROCEDURE IF EXISTS AddProduct;
DELIMITER //

CREATE PROCEDURE `RegisterUser`(uname varchar(30), passhash text)
BEGIN
    START TRANSACTION;

    SELECT COUNT(*) INTO @usernameCount
    FROM user
    WHERE username = uname;

    IF @usernameCount > 0 THEN
        SELECT NULL as userid, "Username already exists" AS 'Error';
    ELSE
        INSERT INTO Customer (username, password) VALUES (uname, passhash);
        SELECT last_insert_id() AS userid, NULL as 'Error';
        -- FROM user
        -- WHERE username=uname;
    END IF;

    COMMIT;
END;
//

DELIMITER ;


DELIMITER //

CREATE PROCEDURE 'AddPrduct'(productn varchar(100), prices decimal(7,2), amountin int(11))
BEGIN 
	START TRANSACTION;

       	SELECT COUNT(*) INTO @productcount
	from Product
	where pname = productn;

       	IF @productCount > 0 THEN
       	    SELECT NULL as pname, "product already exists" AS 'Error';
        ELSE
      	    INSERT INTO Customer (pname, price, quantity) VALUES (productn, prices, amountin);

	END IF;

	COMMIT;
END:
//

DELIMITER ;



DELIMITER //

CREATE PROCEDURE 'RemovePrduct'(productn varchar(100), prices decimal(7,2), amountin int(11))
BEGIN 
	START TRANSACTION;

       	SELECT pname
	from Product
	where quantity = 0;

       	IF quantity =  0 THEN
       	    SELECT NULL as pname, "product is out of stock" AS 'Error';

	END IF;

	COMMIT;
END:
//

DELIMITER ;


