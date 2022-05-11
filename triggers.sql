DROP TRIGGER IF EXISTS UserDelete;
DROP TRIGGER IF EXISTS EditPost;

DELIMITER //

CREATE TRIGGER UserDelete
BEFORE DELETE ON user
FOR EACH ROW
BEGIN   
    INSERT INTO user_history (user_id, username)
    SELECT user_id, username
    FROM user
    WHERE user.user_id = OLD.user_id;
END
//

CREATE TRIGGER UserUpdate
BEFORE UPDATE ON user
FOR EACH ROW
BEGIN
    INSERT INTO user_history VALUES(OLD.user_id, OLD.username, NOW());
END
//

CREATE TRIGGER EditPost
BEFORE UPDATE ON post
FOR EACH ROW
BEGIN
    IF OLD.content != NEW.content OR OLD.approved != NEW.approved
    THEN
        INSERT INTO post_history (post_id, user_id, old_content, new_content)
        VALUES (OLD.post_id, OLD.user_id, OLD.content, NEW.content);
    END IF;
END
//

DELIMITER ;
