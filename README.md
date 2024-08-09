# crosier-core

## Montagem do ambiente de DEV



Para iniciar uma nova base de dados em ambiente de DEV:

- Utilizar o script `sql/CREATE_DATABASE-mysql8.sql` e alterar o nome do banco de `crosier_dev`
para o nome desejado (sempre informando com `_test` no final para já funcionar no ambiente de testes).
- Rodar o `php bin/console doctrine:migrations:migrate` para criar as tabelas.

