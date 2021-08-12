create table public.pratos
(
	id serial not null
		constraint pratos_pkey
			primary key,
	nome varchar(256),
	categoria_id integer
		constraint pratos_categoria
			references public.categorias
);