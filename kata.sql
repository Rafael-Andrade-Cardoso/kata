/*=== Tabela para alunos ===*/
CREATE TABLE aluno (
 id_aluno INT NOT NULL AUTO_INCREMENT,
 observacao VARCHAR(255),
 id_pessoa_fisica INT NOT NULL,
 primary key(id_aluno)
)engine=InnoDB;

/*=== Tabela de artes marciais ===*/
CREATE TABLE arte_marcial (
 id_arte_marcial INT NOT NULL AUTO_INCREMENT,
 nm_arte_marcial VARCHAR(50),
 descricao VARCHAR(255),
 primary key(id_arte_marcial)
)engine=InnoDB;

/*=== Tabela de aulas ===*/
CREATE TABLE aula (
 id_aula INT NOT NULL AUTO_INCREMENT,
 id_arte_marcial INT NOT NULL,
 dt_aula DATE,
 observacao VARCHAR(255),
 id_horario INT NOT NULL,
 primary key(id_aula)
)engine=InnoDB;

/*=== Tabela para comunicados===*/
CREATE TABLE comunicado (
 id_comunicado INT NOT NULL AUTO_INCREMENT,
 titulo VARCHAR(100) NOT NULL,
 dt_vencimento DATETIME,
 dt_publicacao DATETIME NOT NULL,
 dt_criacao DATETIME NOT NULL,
 descricao TEXT NOT NULL,
 primary key(id_comunicado)
)engine=InnoDB;

/*=== Tabela de endereços de pessoa ===*/
CREATE TABLE endereco (
 id_endereco INT NOT NULL AUTO_INCREMENT,
 id_ta_cidade INT NOT NULL,
 id_pessoa INT NOT NULL,
 logradouro VARCHAR(255) NOT NULL,
 numero VARCHAR(10) NOT NULL,
 complemento VARCHAR(255) NOT NULL,
 CEP CHAR(8),
 primary key(id_endereco)
)engine=InnoDB;

/*=== Tabela de exames marcados ===*/
CREATE TABLE exame (
 id_exame INT NOT NULL AUTO_INCREMENT,
 id_ta_graduacao INT NOT NULL,
 id_arte_marcial INT NOT NULL,
 dt_exame DATE NOT NULL,
 valor DECIMAL(10,2) NOT NULL,
 local VARCHAR(255) NOT NULL,
 descricao VARCHAR(255) NOT NULL,
 id_matricula INT NOT NULL,
 primary key(id_exame)
)engine=InnoDB;

/*=== Tabela de horários da academia ===*/
CREATE TABLE horario (
 id_horario INT NOT NULL AUTO_INCREMENT,
 hr_inicio TIME NOT NULL,
 hr_termino TIME NOT NULL,
 dia_semana CHAR(1) NOT NULL,
 id_instrutor INT NOT NULL,
 primary key(id_horario)
)engine=InnoDB;

/*=== Tabela para instrutores===*/
CREATE TABLE instrutor (
 id_instrutor INT NOT NULL AUTO_INCREMENT,
 id_pessoa_fisica INT NOT NULL,
 primary key(id_instrutor)
)engine=InnoDB;

/*=== Tabela de ligação de instrutor à artes marciais e graduacao ===*/
CREATE TABLE instrutor_arte_marcial (
 id_instrutor_arte_marcial INT NOT NULL AUTO_INCREMENT,
 id_arte_marcial INT NOT NULL,
 id_ta_graduacao INT NOT NULL,
 observacao VARCHAR(255),
 id_instrutor INT NOT NULL,
 primary key(id_instrutor_arte_marcial)
)engine=InnoDB;

/*=== Tabela de matrícula de alunos ===*/
CREATE TABLE matricula (
 id_matricula INT NOT NULL AUTO_INCREMENT,
 id_ta_situacao INT NOT NULL,
 dia_vencimento DATE NOT NULL,
 dt_matricula DATE NOT NULL,
 desconto DECIMAL(3) NOT NULL,
 valor_mensalidade DECIMAL(10,2) NOT NULL,
 id_pessoa_fisica INT,
 id_aluno INT NOT NULL,
 primary key(id_matricula)
)engine=InnoDB;

/*=== Tabela ligação de matrícula à graduacao===*/
CREATE TABLE matricula_graduacao (
 id_matricula_graducao INT NOT NULL AUTO_INCREMENT,
 id_matricula INT NOT NULL,
 id_ta_graduacao INT NOT NULL,
 observacao VARCHAR(100),
 primary key(id_matricula_graducao)
)engine=InnoDB;

/*=== Tabela de mensalidades dos alunos ===*/
CREATE TABLE mensalidade (
 id_matricula INT NOT NULL AUTO_INCREMENT,
 id_mensalidade INT NOT NULL,
 dt_pagamento DATETIME NOT NULL,
 vl_pago DECIMAL(10,2),
 primary key(id_matricula)
)engine=InnoDB;

/*=== Tabela de menus ===*/
CREATE TABLE menu (
 id_menu INT NOT NULL AUTO_INCREMENT,
 id_menu_pai INT,
 nome VARCHAR(30),
 url VARCHAR(255),
 ordem INT,
 desc_menu VARCHAR(100),
 primary key(id_menu)
)engine=InnoDB;

/*=== Tabela para pessoa ===*/
CREATE TABLE pessoa (
 id_pessoa INT NOT NULL AUTO_INCREMENT,
 id_responsavel INT,
 nome VARCHAR(50) NOT NULL,
 dt_nascimento DATE NOT NULL,
 email VARCHAR(150),
 primary key(id_pessoa)
)engine=InnoDB;

/*=== Tabela de comunicados x pessoas ===*/
CREATE TABLE pessoa_comunicado (
 id_pessoa_comunicado INT NOT NULL AUTO_INCREMENT,
 id_pessoa INT NOT NULL,
 id_comunicado INT NOT NULL,
 primary key(id_pessoa_comunicado)
)engine=InnoDB;

/*=== Tabela de dados dos alunos ===*/
CREATE TABLE pessoa_dados (
 id_pessoa_dados INT NOT NULL AUTO_INCREMENT,
 peso DECIMAL(3,2) NOT NULL,
 altura DECIMAL(2,2) NOT NULL,
 dt_dados DATE NOT NULL,
 id_pessoa_fisica INT NOT NULL,
 primary key(id_pessoa_dados)
)engine=InnoDB;

/*=== Tabela de documentos de pessoa ===*/
CREATE TABLE pessoa_documento (
 id_pessoa_documento INT NOT NULL AUTO_INCREMENT,
 id_ta_documento INT NOT NULL,
 valor_documento VARCHAR(100),
 id_pessoa_fisica INT NOT NULL,
 primary key(id_pessoa_documento)
)engine=InnoDB;

/*=== Tabela para pessoa física ====*/
CREATE TABLE pessoa_fisica (
 id_pessoa_fisica INT NOT NULL,
 sobrenome VARCHAR(100) NOT NULL,
 tipo_sanguineo VARCHAR(3),
 sexo CHAR(1),
 primary key(id_pessoa_fisica)
)engine=InnoDB;

/*=== Tabela para telefones da tabela pessoa ===*/
CREATE TABLE pessoa_telefone (
 id_pessoa_telefone INT NOT NULL AUTO_INCREMENT,
 id_pessoa INT NOT NULL,
 id_ta_tipo_telefone INT NOT NULL,
 ddd CHAR(2) NOT NULL,
 telefone CHAR(20) NOT NULL,
 primary key(id_pessoa_telefone)
)engine=InnoDB;

/*=== Tabela de planos de aulas===*/
CREATE TABLE plano_aula (
 id_plano_aula INT NOT NULL AUTO_INCREMENT,
 id_ta_atividade INT NOT NULL,
 id_aula INT NOT NULL,
 primary key(id_plano_aula)
)engine=InnoDB;

/*=== Tabela de presenças ===*/
CREATE TABLE presenca (
 id_presenca INT NOT NULL AUTO_INCREMENT,
 observacao VARCHAR(255) NOT NULL,
 id_matricula INT NOT NULL,
 id_aula INT NOT NULL,
 primary key(id_presenca)
)engine=InnoDB;

/*=== Tabelas de atividades para planejamento de aulas ===*/
CREATE TABLE ta_atividade (
 id_ta_atividade INT NOT NULL AUTO_INCREMENT,
 nm_atividade VARCHAR(50) NOT NULL,
 desc_atividade VARCHAR(255) NOT NULL,
 primary key(id_ta_atividade)
)engine=InnoDB;

/*=== Tabela de cidades ===*/
CREATE TABLE ta_cidade (
 id_ta_cidade INT NOT NULL AUTO_INCREMENT,
 id_estado INT NOT NULL,
 nm_cidade VARCHAR(50) NOT NULL,
 primary key(id_ta_cidade)
)engine=InnoDB;

/*=== Tabela auxiliar para tipos de documentos ===*/
CREATE TABLE ta_documento (
 id_ta_documento INT NOT NULL AUTO_INCREMENT,
 nm_documento VARCHAR(100),
 descricao VARCHAR(255),
 primary key(id_ta_documento)
)engine=InnoDB;

/*=== Tabela para estados ===*/
CREATE TABLE ta_estado (
 id_estado INT NOT NULL AUTO_INCREMENT,
 id_ta_pais INT NOT NULL,
 nm_estado VARCHAR(255) NOT NULL,
 sigla VARCHAR(5),
 primary key(id_estado)
)engine=InnoDB;

/*=== Tabela para graduações (faixa branca, faixa amarela, etc) ===*/
CREATE TABLE ta_graduacao (
 id_ta_graduacao INT NOT NULL AUTO_INCREMENT,
 graduacao VARCHAR(50),
 primary key(id_ta_graduacao)
)engine=InnoDB;

/*=== Tabela auxiliar para país ===*/
CREATE TABLE ta_pais (
 id_ta_pais INT NOT NULL AUTO_INCREMENT,
 nm_pais VARCHAR(255) NOT NULL,
 primary key(id_ta_pais)
)engine=InnoDB;

/*=== Tabela auxiliar para situação do aluno ou da matrícula (ativo, suspenso, etc) ===*/
CREATE TABLE ta_situacao (
 id_ta_situacao INT NOT NULL AUTO_INCREMENT,
 nm_situacao VARCHAR(100),
 descricao_situacao VARCHAR(255),
 primary key(id_ta_situacao)
)engine=InnoDB;

/*=== Tabela auxiliar para tipo de telefone (residencial, celular, tabalho, etc) ===*/
CREATE TABLE ta_tipo_telefone (
 id_ta_tipo_telefone INT NOT NULL AUTO_INCREMENT,
 desc_tipo_telefone VARCHAR(20) NOT NULL,
 primary key(id_ta_tipo_telefone)
)engine=InnoDB;

/*=== Tabela auxiliar para tipo de usuário (comum, admin, etc)===*/
CREATE TABLE ta_tipo_usuario (
 id_ta_tipo_usuario INT NOT NULL AUTO_INCREMENT,
 ds_tipo_usuario VARCHAR(255) NOT NULL,
 primary key(id_ta_tipo_usuario)
)engine=InnoDB;

/*=== Tabela de turmas ===*/
CREATE TABLE turma (
 id_turma INT NOT NULL AUTO_INCREMENT,
 max_aluno INT NOT NULL,
 valor_mensalidade DECIMAL(10,2) NOT NULL,
 dt_inicio DATE NOT NULL,
 dt_final DATE NOT NULL,
 id_horario INT NOT NULL,
 primary key(id_turma)
)engine=InnoDB;

/*=== Tabela para usuários do sistema ===*/
CREATE TABLE usuario (
 id_usuario INT NOT NULL AUTO_INCREMENT,
 id_ta_tipo_usuario INT NOT NULL,
 id_ta_situacao INT NOT NULL,
 id_pessoa INT NOT NULL,
 login VARCHAR(100) NOT NULL,
 senha VARCHAR(255) NOT NULL,
 primary key(id_usuario)
)engine=InnoDB;



/*========== FOREIGN KEY ==========*/
ALTER TABLE menu ADD CONSTRAINT FK_menu_0 FOREIGN KEY (id_menu_pai) REFERENCES menu (id_menu);

ALTER TABLE pessoa_fisica ADD CONSTRAINT FK_pessoa_fisica_0 FOREIGN KEY (id_pessoa_fisica) REFERENCES pessoa (id_pessoa);

ALTER TABLE pessoa ADD CONSTRAINT FK_pessoa_responsavel FOREIGN KEY (id_responsavel) REFERENCES pessoa (id_pessoa);

ALTER TABLE pessoa_telefone ADD CONSTRAINT FK_pessoa_telefone_0 FOREIGN KEY (id_pessoa) REFERENCES pessoa (id_pessoa);
ALTER TABLE pessoa_telefone ADD CONSTRAINT FK_pessoa_telefone_1 FOREIGN KEY (id_ta_tipo_telefone) REFERENCES ta_tipo_telefone (id_ta_tipo_telefone);

ALTER TABLE ta_estado ADD CONSTRAINT FK_ta_estado_0 FOREIGN KEY (id_ta_pais) REFERENCES ta_pais (id_ta_pais);

ALTER TABLE usuario ADD CONSTRAINT FK_usuario_0 FOREIGN KEY (id_ta_tipo_usuario) REFERENCES ta_tipo_usuario (id_ta_tipo_usuario);
ALTER TABLE usuario ADD CONSTRAINT FK_usuario_1 FOREIGN KEY (id_ta_situacao) REFERENCES ta_situacao (id_ta_situacao);
ALTER TABLE usuario ADD CONSTRAINT FK_usuario_2 FOREIGN KEY (id_pessoa) REFERENCES pessoa (id_pessoa);

ALTER TABLE aluno ADD CONSTRAINT FK_aluno_0 FOREIGN KEY (id_pessoa_fisica) REFERENCES pessoa_fisica (id_pessoa_fisica);

ALTER TABLE instrutor ADD CONSTRAINT FK_instrutor_0 FOREIGN KEY (id_pessoa_fisica) REFERENCES pessoa (id_pessoa);
ALTER TABLE instrutor ADD CONSTRAINT FK_instrutor_1 FOREIGN KEY (id_pessoa_fisica) REFERENCES pessoa_fisica (id_pessoa_fisica);

ALTER TABLE matricula ADD CONSTRAINT FK_matricula_0 FOREIGN KEY (id_ta_situacao) REFERENCES ta_situacao (id_ta_situacao);
ALTER TABLE matricula ADD CONSTRAINT FK_matricula_1 FOREIGN KEY (id_pessoa_fisica) REFERENCES pessoa_fisica (id_pessoa_fisica);
ALTER TABLE matricula ADD CONSTRAINT FK_matricula_2 FOREIGN KEY (id_aluno) REFERENCES aluno (id_aluno);

ALTER TABLE mensalidade ADD CONSTRAINT FK_mensalidade_0 FOREIGN KEY (id_matricula) REFERENCES matricula (id_matricula);

ALTER TABLE pessoa_dados ADD CONSTRAINT FK_pessoa_dados_0 FOREIGN KEY (id_pessoa_fisica) REFERENCES pessoa_fisica (id_pessoa_fisica);

ALTER TABLE pessoa_documento ADD CONSTRAINT FK_pessoa_documento_0 FOREIGN KEY (id_ta_documento) REFERENCES ta_documento (id_ta_documento);
ALTER TABLE pessoa_documento ADD CONSTRAINT FK_pessoa_documento_1 FOREIGN KEY (id_pessoa_fisica) REFERENCES pessoa_fisica (id_pessoa_fisica);

ALTER TABLE ta_cidade ADD CONSTRAINT FK_ta_cidade_0 FOREIGN KEY (id_estado) REFERENCES ta_estado (id_estado);

ALTER TABLE endereco ADD CONSTRAINT FK_endereco_0 FOREIGN KEY (id_ta_cidade) REFERENCES ta_cidade (id_ta_cidade);
ALTER TABLE endereco ADD CONSTRAINT FK_endereco_1 FOREIGN KEY (id_pessoa) REFERENCES pessoa (id_pessoa);

ALTER TABLE exame ADD CONSTRAINT FK_exame_0 FOREIGN KEY (id_ta_graduacao) REFERENCES ta_graduacao (id_ta_graduacao);
ALTER TABLE exame ADD CONSTRAINT FK_exame_1 FOREIGN KEY (id_arte_marcial) REFERENCES arte_marcial (id_arte_marcial);
ALTER TABLE exame ADD CONSTRAINT FK_exame_2 FOREIGN KEY (id_matricula) REFERENCES matricula (id_matricula);

ALTER TABLE horario ADD CONSTRAINT FK_horario_0 FOREIGN KEY (id_instrutor) REFERENCES instrutor (id_instrutor);

ALTER TABLE instrutor_arte_marcial ADD CONSTRAINT FK_instrutor_arte_marcial_0 FOREIGN KEY (id_arte_marcial) REFERENCES arte_marcial (id_arte_marcial);
ALTER TABLE instrutor_arte_marcial ADD CONSTRAINT FK_instrutor_arte_marcial_1 FOREIGN KEY (id_ta_graduacao) REFERENCES ta_graduacao (id_ta_graduacao);
ALTER TABLE instrutor_arte_marcial ADD CONSTRAINT FK_instrutor_arte_marcial_2 FOREIGN KEY (id_instrutor) REFERENCES instrutor (id_instrutor);

ALTER TABLE matricula_graduacao ADD CONSTRAINT FK_matricula_graduacao_0 FOREIGN KEY (id_matricula) REFERENCES matricula (id_matricula);
ALTER TABLE matricula_graduacao ADD CONSTRAINT FK_matricula_graduacao_1 FOREIGN KEY (id_ta_graduacao) REFERENCES ta_graduacao (id_ta_graduacao);

ALTER TABLE turma ADD CONSTRAINT FK_turma_0 FOREIGN KEY (id_horario) REFERENCES horario (id_horario);

ALTER TABLE aula ADD CONSTRAINT FK_aula_0 FOREIGN KEY (id_arte_marcial) REFERENCES arte_marcial (id_arte_marcial);
ALTER TABLE aula ADD CONSTRAINT FK_aula_1 FOREIGN KEY (id_horario) REFERENCES horario (id_horario);

ALTER TABLE plano_aula ADD CONSTRAINT FK_plano_aula_0 FOREIGN KEY (id_ta_atividade) REFERENCES ta_atividade (id_ta_atividade);
ALTER TABLE plano_aula ADD CONSTRAINT FK_plano_aula_1 FOREIGN KEY (id_aula) REFERENCES aula (id_aula);

ALTER TABLE presenca ADD CONSTRAINT FK_presenca_0 FOREIGN KEY (id_matricula) REFERENCES matricula (id_matricula);
ALTER TABLE presenca ADD CONSTRAINT FK_presenca_1 FOREIGN KEY (id_aula) REFERENCES aula (id_aula);

ALTER TABLE pessoa_comunicado ADD CONSTRAINT FK_pessoa_comunicado_0 FOREIGN KEY (id_pessoa) REFERENCES pessoa (id_pessoa);
ALTER TABLE pessoa_comunicado ADD CONSTRAINT FK_pessoa_comunicado_1 FOREIGN KEY (id_comunicado) REFERENCES comunicado (id_comunicado);

/*=========================================TRIGGERS========================================================*/

/*========== Trigger valida pessoa ==========*/
DELIMITER $$
CREATE TRIGGER tgr_insert_pessoa
BEFORE INSERT ON pessoa
FOR EACH ROW BEGIN
	-- Declando variável 
	DECLARE responsavel INT;
	-- Verifica se o e-mail é válido
	IF NEW.email NOT LIKE '%_@%_.__%' THEN
		SIGNAL SQLSTATE VALUE '45000'
			SET MESSAGE_TEXT = '[tabela:pessoa] - E-mail inválido.';
	END IF;
	-- Verifica se o responsável existe
	SET @responsavel = (SELECT IF((SELECT COUNT(*) from pessoa where id_pessoa = NEW.id_responsavel), 'true', 'false'));
	-- Se o responsável existir, compara as datas de nascimento
	IF @responsavel = 'true' THEN
		IF ((SELECT dt_nascimento FROM pessoa where id_pessoa = NEW.id_responsavel) > (NEW.dt_nascimento)) THEN
			SIGNAL SQLSTATE VALUE '45000'
			SET MESSAGE_TEXT = '[tabela:pessoa] - O responsável não pode ser mais novo que o aluno.';
		END IF;
	END IF;
	-- Verifica se a data de nascimento é maior que a data atual
	IF NEW.dt_nascimento > NOW() THEN
		SIGNAL SQLSTATE VALUE '45000'
			SET MESSAGE_TEXT = '[tabela:pessoa] - A data de nascimento não pode ser posterior a data atual.';
	END IF;
END$$
DELIMITER ;

/*========== Trigger valida pessoa_fisica ==========*/
DELIMITER $$
CREATE TRIGGER tgr_insert_pessoa_fisica
BEFORE INSERT ON pessoa_fisica
FOR EACH ROW BEGIN
	-- Verifica se o campo sexo é diferente de M e F
	IF NEW.sexo != 'F' AND NEW.sexo != 'M' THEN
		SIGNAL SQLSTATE VALUE '45000'
			SET MESSAGE_TEXT = '[tabela:pessoa_fisica] - sexo inválido. Utilize (F - feminino && M - Masculino)';
	END IF;
END$$
DELIMITER ;


/*========== Trigger valida comunicado ==========*/
DELIMITER $$
CREATE TRIGGER tgr_insert_comunicado
BEFORE INSERT ON comunicado
FOR EACH ROW BEGIN
	/* Declando variável e seta valores para as variáveis */
	DECLARE dtCriacao DATE;
	DECLARE dtVencimento DATE;
	DECLARE dtPublicacao DATE;
	SET @dtCriacao = NOW();
	SET @dtVencimento = NEW.dt_vencimento;
	SET @dtPublicacao = NEW.dt_publicacao;
	NEW.dt_criacao = @dtCriacao;
	/* Verifica se a data de vencimento é menor que a data de atual */
	IF @dtVencimento < NOW() THEN
		SIGNAL SQLSTATE VALUE '45000'
		SET MESSAGE_TEXT = '[tabela:comunicado] - A data de vencimento não pode ser menor que a data atual.';
	END IF;
	/* Verifica se a data de publicação é menor que a data atual */
	IF @dtPublicacao < NOW() THEN
		SIGNAL SQLSTATE VALUE '45000'
		SET MESSAGE_TEXT = '[tabela:comunicado] - A data de publicação não pode ser menor que a data atual.';
	END IF;
	/* Verifica se a data de vencimento é menor que a data da publicação */
	IF @dtVencimento < @dtPublicacao THEN
		SIGNAL SQLSTATE VALUE '45000'
		SET MESSAGE_TEXT = '[tabela:comunicado] - A data de vencimento não pode ser menor que a data da publicação.';
	END IF;
END$$
DELIMITER ;

/*========== Trigger valida matricula ==========*/
DELIMITER $$
CREATE TRIGGER tgr_insert_matricula
BEFORE INSERT ON matricula
FOR EACH ROW BEGIN
	-- Declando variável e seta valores para as variáveis
	DECLARE dtMatricula DATE;
	DECLARE diaVencimento INT;
	DECLARE ultimoDiaMes INT;
	SET @dtMatricula = NOW();
	SET @diaVencimento = NEW.dia_vencimento;
	-- Verifica se a data de vencimento é menor que 31
	IF @diaVencimento > 31 THEN
		SIGNAL SQLSTATE VALUE '45000'
		SET MESSAGE_TEXT = '[tabela:matricula] - O dia para vencimento não pode ser maior que 31.';
	END IF;
END$$
DELIMITER ;

/*========== Trigger valida pessoa_dados ==========*/
DELIMITER $$
CREATE TRIGGER tgr_pessoa_dados
BEFORE INSERT ON pessoa_dados
FOR EACH ROW BEGIN
	-- Declando variável e seta valores para as variáveis
	DECLARE altura FLOAT;
	DECLARE peso FLOAT;
	DECLARE dtDados DATE;
	SET @dtDados = NEW.dt_dados;
	SET @altura = NEW.altura;
	SET @peso = NEW.peso;
	-- Verifica se a data de vencimento é menor que 31
	IF @altura > 3.00 THEN
		SIGNAL SQLSTATE VALUE '45000'
		SET MESSAGE_TEXT = '[tabela:comunicado] - Reveja o campo altura da pessoa. (altura < 3)';
	END IF;
	IF @peso > 600.00 THEN
		SIGNAL SQLSTATE VALUE '45000'
		SET MESSAGE_TEXT = '[tabela:comunicado] - Reveja o campo peso da pessoa. (peso < 600)';
	END IF;
	IF @dtDados > NOW() THEN
		SIGNAL SQLSTATE VALUE '45000'
		SET MESSAGE_TEXT = '[tabela:comunicado] - A data de coleta dos dados não pode ser maior que a data atual.';
	END IF;
END$$
DELIMITER ;

/*========== Trigger valida mensalidade ==========*/
DELIMITER $$
CREATE TRIGGER tgr_mensalidade
BEFORE INSERT ON mensalidade
FOR EACH ROW BEGIN
	-- Declando variável e seta valores para as variáveis
	DECLARE dtPagamento DATE;
	SET @dtPagamento = NEW.dt_pagamento;
	-- Verifica se a data de vencimento é menor que 31
	IF @dtPagamento > NOW() THEN
		SIGNAL SQLSTATE VALUE '45000'
		SET MESSAGE_TEXT = '[tabela:comunicado] - Cadastre o pagamento apenas após ter eftuado-o';
	END IF;
END$$
DELIMITER ;


/*========================================= INSERTS TESTS ========================================================*/
INSERT INTO pessoa (nome, dt_nascimento, email) VALUES ('Bruno Asato', '1993-06-18', 'asato@gmail.com');
INSERT INTO pessoa (id_responsavel, nome, dt_nascimento, email) VALUES (1, 'Teste 2', '1993-06-18', 'teste@gmail.com');

INSERT INTO pessoa (id_responsavel, nome, dt_nascimento, email) VALUES (1, 'teste3', '1994-06-18', 'teste@gmail.com');

INSERT INTO pessoa_fisica (id_pessoa_fisica, sobrenome, tipo_sanguineo, sexo) VALUES (1, 'Asato', 'O+', 'M');
INSERT INTO pessoa_fisica (id_pessoa_fisica, sobrenome, tipo_sanguineo, sexo) VALUES (5, 'Asato', 'O+', 'M');

INSERT INTO ta_tipo_usuario (ds_tipo_usuario) VALUES ('Administrador');

INSERT INTO ta_situacao (nm_situacao, descricao_situacao) VALUES ('Ativo', 'Usuário ativo no sistema');

INSERT INTO usuario (id_ta_tipo_usuario, id_ta_situacao, id_pessoa, login, senha) VALUES (1, 1, 1, 'admin', 'admin');


INSERT INTO comunicado (titulo, dt_vencimento, dt_publicacao, dt_criacao, descricao) 
	VALUES ('TESTE', '2015-11-01', '2015-10-30', '','Corpo do comunicado'); 


INSERT INTO pessoa_dados (id_pessoa_fisica, peso, altura, dt_dados) 
	VALUES (1, 200.00, 2.5, '2015-07-10'); 











