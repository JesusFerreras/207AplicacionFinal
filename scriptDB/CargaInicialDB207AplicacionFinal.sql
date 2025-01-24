delete from DB207AplicacionFinal.T01_Usuario;
insert into DB207AplicacionFinal.T01_Usuario(T01_CodUsuario,T01_Password,T01_DescUsuario,T01_Perfil) values
    ('admin', sha2('adminpaso', 256), 'Administrador', 'administrador'),
    ('heraclio', sha2('heracliopaso', 256), 'Heraclio Borbujo', 'usuario'),
    ('amor', sha2('amorpaso', 256), 'Amor Rodríguez', 'usuario'),
    ('victor', sha2('victorpaso', 256), 'Victor García', 'usuario'),
    ('alex', sha2('alexpaso', 256), 'Alex Asensio', 'usuario'),
    ('jesus', sha2('jesuspaso', 256), 'Jesús Ferreras', 'usuario'),
    ('luis', sha2('luispaso', 256), 'Luis Ferreras', 'usuario')
;

delete from DB207AplicacionFinal.T02_Departamento;
insert into DB207AplicacionFinal.T02_Departamento(T02_CodDepartamento,T02_DescDepartamento,T02_VolumenDeNegocio) values
    ('AAA', 'Departamento 1', 1.01),
    ('BBB', 'Departamento 2', 2.02),
    ('CCC', 'Departamento 3', 3.03),
    ('DDD', 'Departamento 4', 4.04)
;