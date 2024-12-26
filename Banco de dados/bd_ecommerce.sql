/* Criação das Tabelas */
CREATE TABLE tbl_usuario(
cod_usuario serial PRIMARY KEY,
nome_usuario varchar (200),
telefone_usuario varchar (200),
email_usuario varchar (200),
senha_usuario varchar (200),
endereco_usuario varchar(200),
numendereco_usuario varchar(6),
cep_usuario varchar(9),
tipo_usuario varchar(200)
);

CREATE TABLE tbl_compra(
cod_compra serial PRIMARY KEY,
data_compra date,
status_compra varchar (200),
cod_usuario int not null,
FOREIGN KEY (cod_usuario) REFERENCES tbl_usuario(cod_usuario)
);

CREATE TABLE tbl_produto(
cod_produto serial PRIMARY KEY,
nome_produto varchar (200),
preco_produto float,
descricao_produto varchar (200),
excluido_produto boolean,
data_exclusao_produto date,
imagem_produto varchar (200),
icms_produto float,
margem_lucro_produto float,
custo_produto float,
codigo_visual_produto int
);

CREATE TABLE tbl_compra_produto(
cod_produto int not null,
cod_compra int not null,
FOREIGN KEY (cod_produto) REFERENCES tbl_produto(cod_produto),
FOREIGN KEY (cod_compra) REFERENCES tbl_compra(cod_compra)
);

CREATE TABLE tbl_temp_compra(
sessao serial PRIMARY KEY,
cod_compra int not null,
FOREIGN KEY (cod_compra) REFERENCES tbl_compra(cod_compra)
);

/* Inserção de Dados nas Tabelas */
INSERT into tbl_usuario (nome_usuario, telefone_usuario, email_usuario, senha_usuario,endereco_usuario, numendereco_usuario ,cep_usuario,tipo_usuario) VALUES
('Osvalo Pereira', '14 98765-4321', 'osvaldo.pereira@gmail.com', 'osvaldo123','Rua Padre Senhator','17-38','65020-038','cliente'),
('Pedro Alvares', '15 12345-6789', 'pedro.alvares@gmail.com', 'pedro123','Avenida Nações Unidas','14-78','38473-457','cliente'),
('Luiz Antonio', '16 06745-9635', 'luiz.antonio@gmail.com', 'luiz123','Rua Agenor Filho','07-66','14365-674','cliente'),
('Maria Clara', '17 08457-8644', 'maria.clara@gmail.com', 'maria123','Avenida Getúlio Vargas','87-97','57523-246','cliente'),
('Fernado Mauricio', '18 97547-8963', 'fernando.mauricio@gmail.com', 'fernando123','Rua Pastor Claro','14-100','72455-776','cliente');

INSERT into tbl_compra (data_compra, status_compra, cod_usuario) VALUES
('10/09/2023', 'Em Andamento', 1),
('11/08/2023', 'Finalizado', 2),
('12/07/2023', 'Finalizado', 3),
('13/06/2023', 'Em Andamento', 4),
('14/05/2023', 'Em Andamento', 5),

INSERT into tbl_produto (nome_produto, preco_produto, descricao_produto, excluido_produto, data_exclusao_produto, imagem_produto, icms_produto, margem_lucro_produto, custo_produto, codigo_visual_produto)
('Vaso CTI', 10.99, 'Vaso personalizado com logo do Colégio Técnico Industrial', 'Não excluído',Null,'vasocti.png',0.30,5.00,5.99,1),
('Suculenta', 10.99, 'Planta suculenta podendo possuir vaso personalizado', 'Não excluído',Null,'suculenta.png',0.30,5.00,5.99,1),
('Cactus', 10.99, 'Vaso personalizado com logo do Colégio Técnico Industrial', 'Não excluído',Null,'cactus.png',0.30,5.00,5.99,1),
('Vaso Informática', 10.99, 'Vaso personalizado com logo do curso Informática', 'Não excluído',Null,'vasoinfo.png',0.30,5.00,5.99,1),
('Vaso Mecânica', 10.99, 'Vaso personalizado com logo do curso Mecânica', 'Não excluído',Null,'vasomec.png',0.30,5.00,5.99,1);

/* Consultas das Tabelas */
SELECT * FROM tbl_usuario;
SELECT * FROM tbl_compra;
SELECT * FROM tbl_produto;
SELECT * FROM tbl_compra_produto;
SELECT * FROM tbl_temp_compra;

