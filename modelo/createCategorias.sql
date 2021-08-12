create table public.categorias
(
	id serial not null
		constraint categorias_pk
			primary key,
	nome varchar
);
