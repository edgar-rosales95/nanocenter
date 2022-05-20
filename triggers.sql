DROP TRIGGER IF EXISTS UserDelete;
DROP TRIGGER IF EXISTS EditProduct;
DROP Trigger IF EXISTS ;
DELIMITER //

CREATE TRIGGER UserDelete
BEFORE DELETE ON Customer
FOR EACH ROW
BEGIN   
    INSERT INTO Deleted_user (userid, username)
    SELECT userid, username
    FROM user
    WHERE user.userid = OLD.userid;
END
//

CREATE TRIGGER UserUpdate
BEFORE UPDATE ON user
FOR EACH ROW
BEGIN
    INSERT INTO Deleted_user VALUES(OLD.userid, OLD.username, NOW());
END
//

CREATE TRIGGER Editshipment
BEFORE UPDATE ON Orders
FOR EACH ROW
BEGIN
    IF OLD.shipdate != NEW.shipdate
    THEN
        INSERT INTO Orders (shipdate)
        VALUES (currentdate);
    END IF;
END
//

DELIMITER ;




