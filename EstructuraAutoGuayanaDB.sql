--Creacion de dominios:
CREATE DOMAIN Nombre AS varchar(20) NOT NULL
    CONSTRAINT dom_nombre_check CHECK(VALUE ~ '[A-ZÁ-ÚÑ][A-Za-zÁ-Úá-úñÑ]');

CREATE DOMAIN dom_sexo as char(1) NOT NULL
    CONSTRAINT dom_sexo_check CHECK ((VALUE='M' OR VAlUE='F'));

CREATE DOMAIN dom_fecha_nac date
    CONSTRAINT dom_fecha_nac_check CHECK (VALUE>='01-01-1900' and VALUE<=now());

CREATE DOMAIN EstatusTrab as char(10) NOT NULL DEFAULT 'Activo'
    CONSTRAINT estatustrab_check CHECK(VALUE in ('Activo','Permiso','Retirado','Vacaciones'));

--Creación de tablas
CREATE TABLE cliente(
	cedula integer NOT NULL check(cedula>0),
	nombre Nombre NOT NULL,
	apellido1 Nombre NOT NULL,
	apellido2 Nombre NOT NULL,
	sexo dom_sexo,
	fecha_nac dom_fecha_nac,
	dir varchar(40),
	empresa varchar(20),
	ingresos real CHECK(ingresos>=0),

    PRIMARY KEY(cedula)
);

CREATE TABLE telefonos_cliente(
	id_cliente integer REFERENCES cliente(cedula) ON UPDATE CASCADE ON DELETE RESTRICT,
	telefono integer,

    PRIMARY KEY(id_cliente,telefono)
);

CREATE TABLE correos_cliente(
	id_cliente integer REFERENCES cliente(cedula) ON UPDATE CASCADE ON DELETE RESTRICT,
	correo varchar(20),

    PRIMARY KEY(id_cliente,correo)
);

CREATE TABLE vehiculo(
	id integer NOT NULL,
	precio real CHECK(precio>=0) NOT NULL ,
	modelo varchar(20) NOT NULL,
	fecha_fab date NOT NULL,
	placa varchar(10),
	lugar_fab varchar(20) NOT NULL,
	nro_cil integer NOT NULL CHECK(nro_cil>0),
	nro_puertas integer NOT NULL CHECK(nro_puertas>=0),
	peso integer NOT NULL CHECK(precio>0),
	capacidad integer NOT NULL CHECK(capacidad>=0),
	fecha_entrega date ,
	kilometraje integer NOT NULL CHECK(kilometraje>=0),
	monto_garantia_ext integer NOT NULL CHECK(precio>=0),

	PRIMARY KEY(id)
);

CREATE TABLE opciones_vehiculo(
	id_vehiculo serial NOT NULL REFERENCES vehiculo(id) ON UPDATE CASCADE ON DELETE RESTRICT,
	opcion varchar(20) NOT NULL,

	PRIMARY KEY(id_vehiculo,opcion)
);

CREATE TABLE color_vehiculo(
	id_vehiculo serial NOT NULL REFERENCES vehiculo(id) ON UPDATE CASCADE ON DELETE RESTRICT,
	color varchar(20) NOT NULL,

	PRIMARY KEY(id_vehiculo,color)
);

CREATE TABLE articulos(
	id integer NOT NULL,
	precio real NOT NULL CHECK(precio>=0),
	stock integer NOT NULL CHECK(stock>=0),
	descripcion varchar(20) NOT NULL,
    modelo varchar(20) NOT NULL,
    fabricante varchar(20) NOT NULL,

    PRIMARY KEY(id)
);

CREATE TABLE cargo(
	cod_cargo integer NOT NULL,
	nombre varchar(15) NOT NULL,
	sueldo real NOT NULL,

	PRIMARY KEY (cod_cargo)
);

CREATE TABLE departamento(
	cod_dpto integer NOT NULL,
	nombre varchar(20) UNIQUE NOT NULL,

	PRIMARY KEY (cod_dpto)
);

CREATE TABLE empleado (
	id serial NOT NULL,
    password varchar(20) NOT NULL,
	cedula integer UNIQUE NOT NULL,
	nombre Nombre,
	apellido1 varchar(20) NOT NULL,
	apellido2 varchar(20) NOT NULL,
	sexo dom_sexo,
	dir varchar(40) NOT NULL,
	fecha_nac dom_fecha_nac NOT NULL,
	fecha_contr date NOT NULL,
    status EstatusTrab,
	cod_cargo integer NOT NULL REFERENCES cargo(cod_cargo) ON UPDATE CASCADE ON DELETE RESTRICT, --FORANEA
	cod_dpto integer NOT NULL REFERENCES departamento(cod_dpto) ON UPDATE CASCADE ON DELETE RESTRICT, --FORANEA

	PRIMARY KEY (id)
);

CREATE TABLE telefonos_empleados(
	id_empleado serial NOT NULL REFERENCES empleado(id) ON UPDATE CASCADE ON DELETE RESTRICT, --FORANEA
	telefono integer NOT NULL, --CHEKEAR QUE TENGA 12 DIGITOS
	PRIMARY KEY (id_empleado,telefono)
);

CREATE TABLE correos_empleados(
	id_empleado serial NOT NULL REFERENCES empleado(id) ON UPDATE CASCADE
	ON DELETE RESTRICT, --FORANEA
	correo varchar(20) NOT NULL,

	PRIMARY KEY (id_empleado,correo)
);

CREATE TABLE dependientes(
	nro_correlativo serial NOT NULL,
	id_empleado serial NOT NULL REFERENCES empleado(id) ON UPDATE CASCADE ON DELETE RESTRICT, --FORANEA
	nombre Nombre,
	apellido1 varchar(20) NOT NULL,
	apellido2 varchar(20) NOT NULL,
	sexo dom_sexo,
	fecha_nac dom_fecha_nac NOT NULL,
	parentesco varchar(20) NOT NULL,

	PRIMARY KEY (nro_correlativo,id_empleado)
);

CREATE TABLE banco (
	rif_banco integer NOT NULL,
	nombre_banco varchar(30) NOT NULL,

	PRIMARY KEY (rif_banco)
);

CREATE TABLE aseguradora(
	rif_aseguradora varchar(20) NOT NULL,
	nombre_aseguradora varchar(30) NOT NULL,

	PRIMARY KEY(rif_aseguradora)
);

CREATE TABLE factura(
	nro_factura serial NOT NULL,
	fecha_emision date NOT NULL,
	tipo_financiamiento char(11) check (tipo_financiamiento in('Financiado','Contado')) NOT NULL,
	cuotas integer,
	pago_cuota real,
	interes real,
	tipo_garantia char(10) check (tipo_garantia in('Estandar','Extendida')),
	id_vehiculo serial NOT NULL REFERENCES vehiculo(id) ON UPDATE CASCADE ON DELETE RESTRICT, 
	precio_venta_ve real NOT NULL,
	rif_aseguradora varchar(20) NOT NULL REFERENCES aseguradora(rif_aseguradora) ON UPDATE CASCADE ON DELETE RESTRICT, 
	ci_cliente integer NOT NULL REFERENCES cliente(cedula) ON UPDATE CASCADE ON DELETE RESTRICT, 
	id_empleado serial NOT NULL REFERENCES empleado(id) ON UPDATE CASCADE ON DELETE RESTRICT, 
	rif_banco integer REFERENCES banco(rif_banco) ON UPDATE CASCADE ON DELETE RESTRICT, 
	comision real NOT NULL,

	PRIMARY KEY (nro_factura)
);

CREATE TABLE detalle(
    id_articulo integer NOT NULL REFERENCES articulos(id) ON UPDATE CASCADE ON DELETE RESTRICT,
    nro_factura serial NOT NULL REFERENCES factura(nro_factura) ON UPDATE CASCADE ON DELETE RESTRICT,
    precio_venta real NOT NULL CHECK(precio_venta>=0),
    descuento real NOT NULL CHECK(descuento>=0),
    cantidad integer NOT NULL CHECK(cantidad>0),

    PRIMARY KEY(id_articulo,nro_factura)
);
CREATE TABLE preguntas(
	nro_preg integer NOT NULL,
	pregunta varchar(40) NOT NULL,

	PRIMARY KEY(nro_preg)
);

CREATE TABLE respuestas (
	nro_factura serial NOT NULL REFERENCES factura(nro_factura) ON UPDATE CASCADE ON DELETE RESTRICT,
	nro_preg integer NOT NULL REFERENCES preguntas(nro_preg) ON UPDATE CASCADE ON DELETE RESTRICT,
	respuesta varchar(30),

	PRIMARY KEY (nro_factura,nro_preg)
);


-- Creación de indices
CREATE UNIQUE INDEX factura_vehiculo_ind ON factura(id_vehiculo);
CREATE INDEX factura_cliente_ind ON factura(ci_cliente);
CREATE INDEX factura_empleado_ind ON factura(id_empleado);
CREATE UNIQUE INDEX empleado_cedula_ind ON empleado(cedula);
CREATE INDEX empleado_departamento_ind ON empleado(cod_dpto,cod_cargo);



-- Creación de vistas
CREATE VIEW totalfactura_view AS
SELECT factura.nro_factura, SUM(detalle.precio_venta)+factura.precio_venta_ve AS total
FROM  factura,detalle
WHERE factura.nro_factura=detalle.nro_factura
GROUP BY factura.nro_factura;

CREATE VIEW departamentos_view AS
SELECT departamento.cod_dpto, departamento.nombre, COUNT(empleado.id) AS total_empleados, SUM(cargo.sueldo) AS total_sueldos, MAX(cargo.sueldo) AS max_sueldos, MIN(cargo.sueldo) AS min_sueldos
FROM departamento, empleado, cargo
WHERE departamento.cod_dpto=empleado.cod_dpto AND empleado.cod_cargo=cargo.cod_cargo
GROUP BY departamento.cod_dpto;

CREATE view sueldos_view AS
SELECT c.nombre as c_nomb,c.sueldo,e.id,e.nombre as e_nomb,e.apellido1,e.sexo,e.status,d.nombre as d_nomb
FROM cargo as c, empleado as e, departamento as d
WHERE e.cod_cargo = c.cod_cargo AND e.cod_dpto = d.cod_dpto;

CREATE view ventas_view AS
SELECT DISTINCT e.id,e.nombre,e.apellido1,tf.nro_factura,f.fecha_emision, SUM(tf.total) as total
FROM  empleado as e, totalfactura_view as tf , factura as f
WHERE tf.nro_factura = f.nro_factura AND f.id_empleado = e.id
GROUP BY e.id,tf.nro_factura,f.fecha_emision;

CREATE view desempenoGeneral_view AS
SELECT DISTINCT e.id,e.cedula,e.nombre,e.apellido1,e.dir,tf.nro_factura,f.fecha_emision,f.id_vehiculo,v.modelo,f.precio_venta_ve, SUM(tf.total) as total
FROM  empleado as e, totalfactura_view as tf , factura as f, vehiculo as v
WHERE tf.nro_factura = f.nro_factura AND f.id_empleado = e.id AND f.id_vehiculo = v.id
GROUP BY e.id,e.cedula,tf.nro_factura,f.fecha_emision,f.id_vehiculo,v.modelo,f.precio_venta_ve;
