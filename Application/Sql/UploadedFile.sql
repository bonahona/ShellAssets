create table UploadedFile(
  Id int not null primary key auto_increment,
  CreateDate varchar(128),
  UploadedById int not null,
  PackageId int not null,
  foreign key (UploadedById) references LocalUser(Id),
  foreign key (PackageId) references Package(Id)
);