

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
	primary key (email),
	foreign key (email) references Customer(email) 
	on delete cascade
);

create table Business
( email varchar(50),
	name	varchar(50),
	gross_income varchar(255),
	category varchar(50),
	primary key (email),
	foreign key (email) references Customer (email)
	on delete cascade
);

create table Products
(	pid varchar(8),
	name varchar(50),
	gender varchar(8),
	price integer,
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
	primary key (sid),
	foreign key (mid) references Store_Manager(mid),
	foreign key (rid) references Region(rid)
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
	primary key (mid),
	foreign key (rid) references Region(rid)
	on delete cascade;
);

create table Region
(	 region varchar(50),
	 rid varchar(7),
	 mid varchar(10),
	 primary key (rid),
	 foreign key (mid) references Region_manager (mid)
		on delete set null
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
	primary key (mid),
	foreign key (sid) references Store(sid)
	on delete cascade
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
	primary key (eid),
	foreign key (sid) references Store (sid)	
);

create table Transaction
(	tid integer,
	date varchar(10),
	total_price decimal(10,2) unsigned,
	total_quantity integer,
	email varchar(50) not null,
	eid varchar(50),
	primary key(tid),
	foreign key (email) references Customer(email),
	foreign key (eid) references Salesperson(eid)
);

create table Invoice
(	i_id integer,
	quantity integer,
	price decimal(10,2) unsigned,
	tid integer not null,
	pid varchar(8) not null,
	foreign key (tid) references Transaction (tid),
	foreign key (pid) references Product (pid)
);
