CREATE TABLE tbl_usuarios(
id_usuario serial PRIMARY KEY, 
nome_usuario varchar,
email_usuario varchar,
senha_usuario varchar,
telefone_usuario varchar);

CREATE TABLE tbl_produtos(
cod_produto serial PRIMARY KEY,
nome TEXT,
descricao TEXT,
preco float,
excluido boolean,
data_exclusao TIMESTAMP,
codigovisual varchar(50),
custo NUMERIC(10,2),
margem_lucro NUMERIC(10,2),
icms NUMERIC(10,2),
imagem varchar);
	
INSERT INTO tbl_usuarios (nome_usuario, email_usuario, senha_usuario, telefone_usuario)VALUES
('Rodrigo Mada', 'rodrigo.mada@unesp.br', 'senha1', '(14) 98103-0887'),
('Rafael Jannini', 'rafael.jannini@unep.br', 'senha2', '(14) 99819-4478'),
('Sofia Ayumi', 'sofia.ayumi@unep.br', 'senha3', '(14) 99651-4577'),
('Vitor Hugo Guilhoto', 'vitor.guilhoto@unep.br', 'senha4', '(14) 98808-6626'),
('Raphael Fardin', 'rw.fardin-junior@unesp.br', 'senha5', '(14) 98808-7760');
	
INSERT INTO tbl_produtos (nome, descricao, preco, excluido, data_exclusao, codigovisual, custo, margem_lucro, icms, imagem)VALUES
('Nome Produto 1', 'Descrição Produto 1', 0.99, true, '2023-09-08 11:13:00', 'COD1', 0.49, 0.50, 0.15, 'caminho_imagem1.png'),
('Nome Produto 2', 'Descrição Produto 2', 10.99, false, NULL, 'COD2', 5.49, 5.50, 1.65, 'caminho_imagem2.png'),
('Nome Produto 3', 'Descrição Produto 3', 20.99, false, NULL, 'COD3', 13.49, 7.50, 3.15, 'caminho_imagem3.png'),
('Nome Produto 4', 'Descrição Produto 4', 30.99, false, NULL, 'COD4', 19.99, 11.00, 4.65, 'caminho_imagem4.png'),
('Nome Produto 5', 'Descrição Produto 5', 40.99, true, '2023-09-08 11:14:00', 'COD5', 23.49, 17.50, 6.15, 'caminho_imagem5.png');


