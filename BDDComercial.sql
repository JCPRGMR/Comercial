DELETE FROM horarios;
DELETE FROM pases_historial;
DELETE FROM comerciales;
DELETE FROM programas;
DELETE FROM tipos;
DELETE FROM clientes;

ALTER Table horarios AUTO_INCREMENT = 1;
ALTER Table pases_historial AUTO_INCREMENT = 1;
ALTER Table comerciales AUTO_INCREMENT = 1;
ALTER Table programas AUTO_INCREMENT = 1;
ALTER Table tipos AUTO_INCREMENT = 1;
ALTER Table clientes AUTO_INCREMENT = 1;