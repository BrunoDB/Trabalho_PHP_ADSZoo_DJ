/*
<!-- ------------------------------------ --
        Universidade de Passo Fundo       
         Desenvolvimento para Web
              ADS - Nível III
          Djessyca Louise Saraiva
              150105@upf.br
---------------------------------------- -->
*/

/*
    Dados da base de dados:

    dsn = "pgsql:host=localhost;dbname=trab_ads_132";
    usuario = "postgres";
    senha   = "masterkey";
*/

drop table especie cascade;
drop table grupoZoo cascade;
drop table animal cascade;
drop table origem cascade;
drop table usuario cascade;

CREATE TABLE especie(
	id serial primary key,
	nome varchar(50) not null
);

CREATE TABLE grupoZoo (
	id serial primary key,
	nomeGrupo varchar(50) not null
);

CREATE TABLE origem (
	id serial primary key,
	origem varchar(50) not null
);

CREATE TABLE animal (
	id serial primary key,
	nome varchar(50) not null,
	especie integer not null,
	origem integer not null,
	grupoZoo integer not null,
constraint fk_animal_especie foreign key (especie) references especie(id),
constraint fk_animal_origem foreign key (origem) references origem(id),
constraint fk_animal_grupoZoo foreign key (grupoZoo) references grupoZoo(id)
);

CREATE TABLE usuario(
    id serial PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(32) NOT NULL
);
insert into usuario(email, senha) values('dj@upf.br', md5('123'));


/*
insert into grupoZoo values (01, 'GAnimais 001');
insert into grupoZoo values (02, 'GAnimais 002');
insert into grupoZoo values (03, 'GAnimais 003');
insert into grupoZoo values (04, 'GAnimais 004');

insert into especie values (01, 'Mamiferos');
insert into especie values (02, 'Répteis');
insert into especie values (03, 'Aves');

insert into origem values (01, 'Origem 1');
insert into origem values (02, 'Origem 1A');
insert into origem values (03, 'Origem 2');
insert into origem values (04, 'Origem 2A');

insert into animal values (01, 'Cachorro', 01, 02, 02);
insert into animal values (02, 'Passarinho', 02, 01, 01);
insert into animal values (03, 'Cobra', 03, 04, 02);
*/

/*
SELECT a.id, a.nome, e.nome, o.origem, gz.nomeGrupo
                    FROM animal a
                        LEFT JOIN especie e 
                        ON a.especie = e.id 
                            LEFT JOIN origem o 
                            ON a.origem = o.id 
                                LEFT JOIN grupoZoo gz
                                ON a.grupoZoo = gz.id;
*/

