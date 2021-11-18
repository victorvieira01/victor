
/*

http://testeseries.great-site.net/
(se não funcionar de primeira atualiza a pagina, hospedagem gratuida do infinityfree falha muito);



CREATE TABLE s_status (
  
id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  
status varchar(25) NOT NULL
);



INSERT INTO s_status (status) VALUES ('pendente');

INSERT INTO s_status (status) VALUES ('realizado');



CREATE TABLE series (
 
 id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
 id_status int(11) NOT NULL DEFAULT '1',
 serie varchar(25) NOT NULL,
  ano int not null, 
  numero_temporadas int not null,
  categoria varchar(25) not null,
  sinopse text not null,   
  data_cadastrado datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);


/*