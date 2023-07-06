# crosier-core

## Montagem do ambiente de DEV



Para iniciar uma nova base de dados em ambiente de DEV:

1) Utilizar o script `sql/CREATE_DATABASE-mysql8.sql` e alterar o nome do banco de `crosier_dev`
para o nome desejado (sempre informando com `_test` no final para já funcionar no ambiente de testes).
2) Em ambiente de DEV é possível utilizar a base crosier_logs_dev compartilhada.
3) Rodar o `php bin/console doctrine:migrations:migrate` para criar as tabelas.

