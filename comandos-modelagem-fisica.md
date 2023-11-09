# Comandos SQL para modelagem física
## Criar banco de dados
create database microblog_carlos CHARACTER SET utf8mb4;

## Criar tabela de usúario

create table(id int not noull primary key auto_increment,
nome varchar(45)not null,
email varchar(45)not null unique,
senha varchar(255)not null,
tipo enum('admin','editor')not null);


create table noticias(id int not null auto_increment primary key,
data datetime not null default current_timestamp,
titulo varchar(150)not null,
texto text not null,
resumo text not null,
imagem varchar(45) not null,
usuario_id int not null);


## Criar relacionamento entre tabelas  e a chave estrangeira
alter table noticias ADD CONSTRAINT fk_noticias_usuario
FOREIGN KEY(usuario_id) REFERENCES usuario(id);