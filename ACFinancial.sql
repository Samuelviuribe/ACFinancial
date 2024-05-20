DROP database if exists Randy;
CREATE database ACFinancial;
Use ACFinancial;
CREATE TABLE asesores (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
	usuario TEXT NOT NULL,
    nombre_completo TEXT NOT NULL,
	contraseña TEXT NOT NULL,
    telefono TEXT,
    direccion TEXT,
    correo TEXT,
    experiencia TEXT,
    especializacion TEXT
);

CREATE TABLE clientes (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    nombre TEXT NOT NULL,
	contraseña TEXT NOT NULL,
    asesor_id INTEGER,
    FOREIGN KEY (asesor_id) REFERENCES asesores(id)
);

CREATE TABLE usuarios (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
	usuario TEXT NOT NULL,
    nombre_completo TEXT NOT NULL,
    correo TEXT NOT NULL UNIQUE,
    contraseña TEXT NOT NULL
);


CREATE TABLE administradores (
    id_admin INTEGER PRIMARY KEY AUTO_INCREMENT,
	nombreAdmin TEXT NOT NULL,
    contraseña TEXT NOT NULL
);