INSERT INTO cfg_estabelecimento(id,codigo,descricao,concreto,pai_id,updated,inserted,user_inserted_id,user_updated_id) VALUES(1,1,'DEFAULT',true,null,'1900-01-01','1900-01-01',1,1);

INSERT INTO sec_group(id,groupname,estabelecimento_id,updated,inserted,user_inserted_id,user_updated_id) VALUES(1,'DEFAULT',1,'1900-01-01','1900-01-01',1,1);

INSERT INTO sec_role(id,role,descricao,estabelecimento_id,updated,inserted,user_inserted_id,user_updated_id)  VALUES( 1,'ROLE_DEFAULT','',1,'1900-01-01','1900-01-01',1,1);

INSERT INTO sec_group_role(group_id,role_id) VALUES(1,1);

INSERT INTO sec_user_role(user_id,role_id) VALUES(1,1);

INSERT INTO sec_user(id,username,nome,email,password,ativo,group_id,estabelecimento_id,updated,inserted,user_inserted_id,user_updated_id) VALUES(1,'admin','Admin','','$2y$13$NO92WWcpohWwurgTAtG5e.TBRjo2Jp/p3mSfnvNvsFCmtkD4lwqy.',true,1,1,'1900-01-01','1900-01-01',1,1);
