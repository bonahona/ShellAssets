create table Package(
  Id int not null primary key auto_increment,
  Name varchar(1024),
  Description varchar(16114),
  CreateDate varchar(128),
  AccessMask int default 0,
  UploadedById int not null,
  foreign key (UploadedById) references LocalUser(Id)
);