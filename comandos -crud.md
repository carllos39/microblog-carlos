# COMANDOS SQL PARA OPERAÇÕES DE DADOS(CRUD)

## Resumo

C:CREATE (INSERT)-> Usado para inserir dados
R:READ (SELECT)-> usado para ler /consultar dados
U: UPDATE(UPDATE)->usado para atualizar dados
D:DELETE(DELETE)-> usado para remover dados
## Exemplo

###  Insert na tabela de usuario
```sql
INSERT INTO usuario(nome, email,senha,tipo) VALUES('Carlos Alexandre','carllos@gmail.com','123','admin');
```
```sql
INSERT INTO usuario(nome,email,senha,tipo) VALUES('Fulano da Silva','fulano@gmail.com','456','editor'),
                                          ('Beltrano Soares','beltrano@msn.com','000penha','admin'),
                                          ('Chapolin Colorado','chapolin@vingadores.com.br','marreta','edito);
                                          ```

 ### Select na tabela usuario;
 ```sql
 SELECT * FROM USUARIO; 
 ```

```sql
 SELECT nome,email FROM usuario;
 ```   
```sql
 SELECT nome,email, FROM usuario where tipo ='admin'; 
 ```      

 ### UPDATE em dados da tabela de usuario
```sql
 UPDATE usuario SET  tipo='admin' WHERE id=7;    
```
  ### DELETE em dados da tabela de usuario    
  obs:Nunca esqueça de passasr uma condição  para o delete!
  ```sql
  DELETE FROM usuario WHERE id=5; 
  ```  



  ###  Insert na tabela de noticias
  ```sql
  INSERT INTO noticias(titulo,resumo,texto,imagem,usuario_id) VALUES(
    'Descoberto oxigênio em Venus',
    'Recentemente a sonda XYZ encontrou traços de oxigênio no planeta',
    'Nesta manhã, em um belo dia para astronomia , foi feita uma descoberta incrivel e muito bacana  demais da conta que legal...',
    'venus.jpg',
    1

  ); 
  ```    

```sql
    INSERT INTO noticias(titulo,resumo,texto,imagem,usuario_id) VALUES(
    'Nova versão do VSCode',
    'Recentemente o VSCode foi atualizado',
    'A Microsoft trouxe recursos de Inteligência Artificial',
    'vscode.jpg',
    7

  );
  ```    
```sql
      INSERT INTO noticias(titulo,resumo,texto,imagem,usuario_id) VALUES(
    'Onda de calor no Brasil',
    'Temperatura muito acima da média ',
    'Efeito do aquecimento global esta prejudicando a vida...',
    'sol.jpg',
    1

  ); 
  ```   

  ### Objetivo : consulta que mostre a data  eo titulo  da noticia  e o nome do autor  desta noticia.
  ##### Select com join(Consulta com junção de tabelas)
--- Especificamos  o nome da coluna junto com o nome da tabela
```sql 
  SELECT 
  noticias.data,
  noticias.titulo,
  usuario.nome 
  ----Especificamos quais tabelas  serão "juntadas /combinadas".
  FROM noticias join usuario
  ---Fazemos uma comparação  entre a chave estrangeira (fk)
  ---com a chave primario(pk)
  ON noticias.usuario_id= usuario.id
  ---opcional(ordenação/classificação psla data)
  ---DESC indica ordem descrecente(mais recente vem primeiro)
  ORDER BY data DESC;        
  ```