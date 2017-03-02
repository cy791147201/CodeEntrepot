--1记录session id
--2修改时间
--3session数据
--4其他根据需求
create table session(
 sid char(32) not null default'',
 utime int not null default 0,
 sdata text,
 uip char(15) not null default'',
 uagent varchar(200) not null default'',
 index session_sid(sid)
);
--1记录session id sid
--2修改时间 utime
--3session数据 sdata
--4ip uip
--5user_agent浏览器 uagent