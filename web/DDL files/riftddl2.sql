

create table Customer
(	email varchar(50),
	street varchar(50),
	city varchar(50),
	state varchar(50),
	zip varchar(50),
	type varchar(10),
	password varchar(50),
	primary key (email)
);

create table Home
(	email varchar(50),
	name	varchar(50),
	gender varchar(10),
	bday date,
	marital varchar(50),
	primary key (email)
);

create table Business
( email varchar(50),
	name	varchar(50),
	gross_income varchar(255),
	category varchar(50),
	primary key (email)
);

create table Products
(	pid varchar(8),
	name varchar(50),
	gender varchar(8),
	price decimal(10,2) unsigned,
	type varchar(30),
	inventory_amount integer,
	color varchar(50),
	size varchar(50),
	primary key(pid)
);

create table Store
(	sid	varchar(10), 
	street varchar(50),
	city varchar(50),
	state varchar(50),
	zip varchar(50),
	num_of_employee	numeric(5,0),
	rid	varchar(7) not null,
	mid	varchar(10), 
	primary key (sid)
);

create table Region_manager
(	mid			varchar(10), 
  name	varchar(50),
  salary			numeric(8,2), 
	email		varchar(30),
	street varchar(50),
	city varchar(50),
	state varchar(50),
	zip varchar(50),
	rid			varchar(7) not null,
	password varchar(50),
	primary key (mid)
);

create table Region
(	 region varchar(50),
	 rid varchar(7),
	 mid varchar(10),
	 primary key (rid)
);

create table Store_Manager
(	mid			varchar(10), 
  name	varchar(50),
  salary			numeric(8,2), 
	email		varchar(30),
	street varchar(50),
	city varchar(50),
	state varchar(50),
	zip varchar(50),
	sid	varchar(10) not null,
	password varchar(50), 
	primary key (mid)
);

create table Salesperson
(	eid	varchar(10), 
 	name	varchar(50),
	salary numeric(8,2), 
	email	varchar(30),
	street varchar(50),
	city varchar(50),
	state varchar(50),
	zip varchar(50),
	sid	varchar(10) not null,
	password varchar(50),
	primary key (eid)
);

create table Transaction
(	tid integer,
	date varchar(10),
	total_price decimal(10,2) unsigned,
	total_quantity integer,
	email varchar(50) not null,
	eid varchar(50),
	primary key(tid)
);

create table Invoice
(	i_id integer,
	quantity integer,
	price decimal(10,2) unsigned,
	tid int(255) not null,
	pid varchar(8) not null
);


// Import data into tables, then use these DDL statements:


alter table Home
add foreign key (email) references Customer(email) 
	on delete cascade;

alter table Business
add foreign key (email) references Customer (email)
	on delete cascade;

alter table Store
add foreign key (mid) references Store_Manager(mid);
alter table Store add foreign key (rid) references Region(rid);

alter table Region_manager
add	foreign key (rid) references Region(rid) on delete cascade;

alter table Region
add foreign key (mid) references Region_manager (mid)
on delete set null;

alter table Store_manager
add foreign key (sid) references Store(sid)
on delete cascade;

alter table Salesperson
add foreign key (sid) references Store (sid);

alter table Transaction
add foreign key (email) references Customer(email);
alter table Transaction
add foreign key (eid) references Salesperson(eid);

SET FOREIGN_KEY_CHECKS=0;
alter table Invoice
add foreign key (tid) references Transaction (tid) on delete cascade;
alter table Invoice
add foreign key (pid) references Product (pid);

SET FOREIGN_KEY_CHECKS=1;
