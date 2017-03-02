create table emails(
	id int not null auto_increment,
	uid int not null default 0,
	title varchar(128) not null default'',
	ptime int not null default 0,
	mbody text,
	primary key(id)	
);
insert into emails(uid,title,ptime,mbody)values('1','1','1','11'),('1','1','1','11'),('1','1','1','11');

insert into emails(uid,title,ptime,mbody)values('2','2','2','22'),('2','2','2','22'),('2','2','2','22');

insert into emails(uid,title,ptime,mbody)values('3','3','3','33')('3','3','3','33'),('3','3','3','33');
