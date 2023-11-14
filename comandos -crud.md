# COMANDOS SQL PARA OPERAÇÕES DE DADOS(CRUD)

## Resumo

C:CREATE (INSERT)-> Usado para inserir.
R:READ (SELECT)-> usado para ler /consultar dados
U: UPDATE(UPDATE)->usado para atualizar dados
D:DELETE(DELETE)-> usado para remover dados
## Exemplo

###  Insert na tabela de usuario

INSERT INTO usuario(nome, email,senha,tipo) VALUES('Carlos Alexandre','carllos@gmail.com','123','admin');


INSERT INTO usuario(nome,email,senha,tipo) VALUES('Fulano da Silva','fulano@gmail.com','456','editor'),
                                          ('Beltrano Soares','beltrano@msn.com','000penha','admin'),
                                          ('Chapolin Colorado','chapolin@vingadores,com.br','marreta','edito);

 ### Select na tabela usuario;
 SELECT * FROM USUARIO; 


 SELECT nome,email FROM usuario;   

 SELECT nome,email, FROM usuario where tipo ='admin';       

 ### UPDATE em dados da tabela de usuario

 UPDATE usuario SET  tipo='admin' WHERE id=7;                              