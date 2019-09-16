START TRANSACTION;

SET FOREIGN_KEY_CHECKS=0;

TRUNCATE TABLE cfg_estabelecimento;
TRUNCATE TABLE sec_user;
TRUNCATE TABLE sec_group;
TRUNCATE TABLE sec_role;
TRUNCATE TABLE sec_group_role;
TRUNCATE TABLE sec_user_role;


INSERT INTO cfg_estabelecimento(id,codigo,descricao,concreto,pai_id,updated,inserted,user_inserted_id,user_updated_id) VALUES(1,1,'ADMIN',true,null,now(),now(),1,1);

INSERT INTO sec_user(id,username,nome,email,password,ativo,group_id,estabelecimento_id,updated,inserted,user_inserted_id,user_updated_id) VALUES(1,'admin','Admin','','$argon2id$v=19$m=65536,t=4,p=1$sBsDp1zTn/Bfu3uOhRLDwg$TnFcbthOzeMb13njZlGLYjuRCZ16+xO4YHa+wX1yYaU',true,1,1,now(),now(),1,1);



INSERT INTO sec_group(id,groupname,estabelecimento_id,updated,inserted,user_inserted_id,user_updated_id) VALUES(1,'ADMIN',1,now(),now(),1,1);
INSERT INTO sec_role(id,role,descricao,estabelecimento_id,updated,inserted,user_inserted_id,user_updated_id)  VALUES( 1,'ROLE_ADMIN','',1,now(),now(),1,1);
INSERT INTO sec_group_role(group_id,role_id) VALUES(1,1);
INSERT INTO sec_user_role(user_id,role_id) VALUES(1,1);


COMMIT;
