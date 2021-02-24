DELETE FROM sec_user WHERE api_token = '999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999';

INSERT INTO sec_user(id, api_token, api_token_expires_at, username, nome, email, password, ativo, group_id, estabelecimento_id, updated, inserted, user_inserted_id, user_updated_id)
VALUES (null, '999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999', '9999-12-31', 'functest', 'FUNCTEST', '', '', true, 1, 1, now(), now(), 1, 1);

select LAST_INSERT_ID() into @lastInsertId;

INSERT INTO sec_user_role(user_id, role_id)
VALUES (@lastInsertId, 1);