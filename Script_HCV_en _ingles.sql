create table `owners` (--dueños
  `user` varchar(20) not null,
  `password` varchar(20),
  `name` varchar(50),
  `mail` varchar(50),
  constraint PK_D primary key  (`user`)
);

create table `pets` (--mascotas
  `id` int not null auto_increment,
  `user` varchar(20) not null,
  `gender` boolean,
  `age` int,
  `name` varchar(50),
  `species` varchar(50),
  `race` varchar(50),
  `weight` int,
  `length` int,
  constraint FK_MU foreign key(`user`) references dueno(`user`),
  constraint PK_M primary key  (`id`)
);

create table `vaccines` (--vacunas
  `type` varchar(100) not null,
  `description` varchar(100),
  constraint PK_V primary key  (`type`)
);

create table `deworms` (--desparacitaciones
  `active_ingredient` varchar(100) not null,
  `description` varchar(100),
  constraint PK_DS primary key  (`active_ingredient`)
);

create table `vaccine_registers` (--registros de vacunas
	`user` varchar (20) not null,
	`pet_id` int not null,
	`vaccine_type` varchar (100) not null,
	`vaccine_date` date not null,
	`animal_weight` int,
	`animal_age` int,
	`animal_length` int,
	constraint FK_RVU foreign key (`user`) references owners (`user`),
	constraint FK_RVM foreign key (`pet_id`) references pets (`id`),
	constraint FK_RVT foreign key (`vaccinetype`) references vaccines (`type`),
	constraint PK_RV primary key (`user`, `pet_id`, `vaccine_type`, `vaccine_date`)
);

create table `deworm_registers` (--regustro de desparacitaciones
	`user` varchar (20) not null,
	`pet_id` int not null,
	`active_ingredient_deworm` varchar (100) not null,
	`deworm_date` date not null,
	constraint FK_RDU foreign key (`user`) references owners (`user`),
	constraint FK_RDM foreign key (`pet_id`) references pets (`id`),
	constraint FK_RDD foreign key (`active_ingredient_deworm`) references deworms (`active_ingredient`),
	constraint PK_RD primary key (user, idpet, activeingredientdeworm, deworm_date)
);

create table consult_registers (--registros de consulta
	`user` varchar (20) not null,
	`pet_id` int not null,
	`consult_date` date not null,
	`description` varchar (200),
	`weight` int,
	`age` int,
	`length` int,
	`cost` int,
	constraint FK_RCU foreign key (`user`) references owners (`user`),
	constraint FK_RCM foreign key (`pet_id`) references pets (`id`),
	constraint PK_RC primary key (`user`, `pet_id`, `consult_date`)
);












