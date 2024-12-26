CREATE TABLE tbl_planta 
( 
 id_planta serial PRIMARY KEY,  
 tipo_planta VARCHAR,  
 preco_planta FLOAT,  
 descricao_planta VARCHAR,  
 data_adicao_planta DATE,  
 id_fornecedor INT 
); 
CREATE TABLE tbl_fornecedor 
( 
 id_fornecedor serial PRIMARY KEY,  
 nome_fornecedor VARCHAR,  
 cnpj_fornecedor VARCHAR,  
 endereco_fornecedor VARCHAR,  
 telefone_fornecedor VARCHAR 
); 

ALTER TABLE tbl_planta ADD FOREIGN KEY(id_fornecedor) REFERENCES tbl_fornecedor (id_fornecedor);

