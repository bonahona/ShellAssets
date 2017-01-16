create table Tag(
  Id int not null primary key auto_increment,
  Name varchar(1024),
  PackageId int not null,
  foreign key(PackageId) references Package(Id)
);