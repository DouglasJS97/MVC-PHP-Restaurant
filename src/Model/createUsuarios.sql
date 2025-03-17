create table user
(
	id serial not null
		constraint usuarios_pkey
			primary key,
	nome varchar(60),
	email varchar(60),
	senha varchar(64)
);