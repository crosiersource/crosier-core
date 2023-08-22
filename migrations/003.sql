INSERT INTO sec_role
(id, role, descricao, estabelecimento_id, updated, inserted, user_inserted_id, user_updated_id)
VALUES
  (null, 'ROLE_ALLOWED_TO_SWITCH_IF_SAME_EMAIL', 'Permite que o usuário alterne entre outros usuários que possuam o mesmo e-mail.', 1, now(), now(), 1, 1);