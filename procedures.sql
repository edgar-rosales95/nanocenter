DROP PROCEDURE IF EXISTS RegisterUser;

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
        INSERT INTO user (username, password) VALUES (uname, passhash);
        SELECT last_insert_id() AS userid, NULL as 'Error';
        -- FROM user
        -- WHERE username=uname;
    END IF;

    COMMIT;
END;
//
DELIMITER ;

DROP PROCEDURE IF EXISTS WritePost;

DELIMITER //

CREATE PROCEDURE WritePost(param_parent int, param_user int, param_content nvarchar(500))
BEGIN

    SELECT COUNT(*) INTO @adminCount
    FROM user NATURAL JOIN user_roles
    WHERE user_id = param_user;

    INSERT INTO post(parent_post, user_id, content, approved)
    VALUES (param_parent, param_user, param_content, @adminCount);
END;
//

DELIMITER ;

DROP PROCEDURE IF EXISTS EditPost;

DELIMITER //

CREATE PROCEDURE EditPost(param_post int, param_user int, param_content nvarchar(500))
BEGIN

    SELECT COUNT(*) INTO @adminCount
    FROM user NATURAL JOIN user_roles
    WHERE user_id = param_user;

    UPDATE post
    SET content=param_content, approved = @adminCount
    WHERE post_id = param_post AND user_id = param_user;
END;
//

DELIMITER ;

DROP PROCEDURE IF EXISTS GetRoles;

DELIMITER //

CREATE PROCEDURE `GetRoles`(param_user_id int)
BEGIN
    SELECT role.name
    FROM user_roles NATURAL JOIN role
    WHERE user_roles.user_id = param_user_id;
END
//

DELIMITER ;

DROP PROCEDURE IF EXISTS IsAdmin;

DELIMITER //

CREATE PROCEDURE `IsAdmin`(param_user_id int)
BEGIN
    SELECT COUNT(*) AS result
    FROM user_roles NATURAL JOIN role
    WHERE user_roles.user_id = param_user_id
    AND role.name = "admin";
END
//

DELIMITER ;

DROP PROCEDURE IF EXISTS GetPosts;

DELIMITER //

CREATE PROCEDURE `GetPosts`()
BEGIN
    SELECT *
    FROM user_posts;
END
//

DELIMITER ;
~
