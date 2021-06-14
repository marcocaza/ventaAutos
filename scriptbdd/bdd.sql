create table productos(
    id int not null auto_increment primary key,
    modelo varchar(200) not null,
    marca varchar(200) not null,
    detalle varchar(500) not null,
    precioVenta float(10,2) not  null,
    creacion datetime not null,
    estado enum('1','0') not null default '1',
    rutafoto varchar(100)
);

insert into productos values
('','124 spider','abarth','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut ligula non urna consequat dignissim. Cras ut magna sagittis, euismod ipsum a, viverra ante. Morbi laoreet convallis felis, vitae molestie enim interdum sed. Aliquam erat volutpat. Fusce rhoncus elit rutrum orci consequat, id laoreet tortor fermentum.',2000.00,'2021-06-01','1','img/archivos/car1.png');
insert into productos values
('','595','abarth','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut ligula non urna consequat dignissim. Cras ut magna sagittis, euismod ipsum a, viverra ante. Morbi laoreet convallis felis, vitae molestie enim interdum sed. Aliquam erat volutpat. Fusce rhoncus elit rutrum orci consequat, id laoreet tortor fermentum.',2000.00,'2021-06-01','1','img/archivos/car2.png'),
('','4C','Alfa romeo','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut ligula non urna consequat dignissim. Cras ut magna sagittis, euismod ipsum a, viverra ante. Morbi laoreet convallis felis, vitae molestie enim interdum sed. Aliquam erat volutpat. Fusce rhoncus elit rutrum orci consequat, id laoreet tortor fermentum.',3000.00,'2021-06-01','1','img/archivos/car3.png'),
('','DB11','Aston Martin','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut ligula non urna consequat dignissim. Cras ut magna sagittis, euismod ipsum a, viverra ante. Morbi laoreet convallis felis, vitae molestie enim interdum sed. Aliquam erat volutpat. Fusce rhoncus elit rutrum orci consequat, id laoreet tortor fermentum.',5000.00,'2021-06-01','1','img/archivos/car4.png'),
('','A1','Audi','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut ligula non urna consequat dignissim. Cras ut magna sagittis, euismod ipsum a, viverra ante. Morbi laoreet convallis felis, vitae molestie enim interdum sed. Aliquam erat volutpat. Fusce rhoncus elit rutrum orci consequat, id laoreet tortor fermentum.',7000.00,'2021-06-01','1','img/archivos/car5.png'),
('','A3','Audi','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut ligula non urna consequat dignissim. Cras ut magna sagittis, euismod ipsum a, viverra ante. Morbi laoreet convallis felis, vitae molestie enim interdum sed. Aliquam erat volutpat. Fusce rhoncus elit rutrum orci consequat, id laoreet tortor fermentum.',10000.00,'2021-06-01','1','img/archivos/car6.png');