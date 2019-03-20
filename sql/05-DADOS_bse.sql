START TRANSACTION;

SET FOREIGN_KEY_CHECKS=0;

TRUNCATE TABLE bse_categ_pessoa;

INSERT INTO bse_categ_pessoa(id, descricao, inserted, updated, estabelecimento_id, user_inserted_id, user_updated_id)
VALUES(1, 'FILIAL PROP', now(), now(), 1, 1, 1);

INSERT INTO bse_categ_pessoa(id, descricao, inserted, updated, estabelecimento_id, user_inserted_id, user_updated_id)
VALUES(2, 'CLIENTE', now(), now(), 1, 1, 1);

INSERT INTO bse_categ_pessoa(id, descricao, inserted, updated, estabelecimento_id, user_inserted_id, user_updated_id)
VALUES(3, 'FORNECEDOR', now(), now(), 1, 1, 1);

INSERT INTO bse_categ_pessoa(id, descricao, inserted, updated, estabelecimento_id, user_inserted_id, user_updated_id)
VALUES(4, 'COLABORADOR', now(), now(), 1, 1, 1);

COMMIT;