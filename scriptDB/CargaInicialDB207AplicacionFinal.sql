delete from DB207AplicacionFinal.T01_Usuario;
insert into DB207AplicacionFinal.T01_Usuario(T01_CodUsuario,T01_Password,T01_DescUsuario,T01_Perfil) values
    ('admin', sha2('adminpaso', 256), 'Administrador', 'administrador'),
    ('heraclio', sha2('heracliopaso', 256), 'Heraclio Borbujo', 'usuario'),
    ('amor', sha2('amorpaso', 256), 'Amor Rodríguez', 'usuario'),
    ('ivan', sha2('ivanpaso', 256), 'Iván Campos', 'usuario'),
    ('antonio', sha2('antoniopaso', 256), 'Antonio Jañez', 'usuario'),
    ('victor', sha2('victorpaso', 256), 'Victor García', 'usuario'),
    ('alex', sha2('alexpaso', 256), 'Alex Asensio', 'usuario'),
    ('jesus', sha2('jesuspaso', 256), 'Jesús Ferreras', 'usuario'),
    ('luis', sha2('luispaso', 256), 'Luis Ferreras', 'usuario')
;

delete from DB207AplicacionFinal.T02_Departamento;
insert into DB207AplicacionFinal.T02_Departamento(T02_CodDepartamento,T02_DescDepartamento,T02_VolumenDeNegocio,T02_FechaBajaDepartamento) values
    ('DPA', 'Departamento 01', 1.01, null),
    ('DPB', 'Departamento 02', 2.02, now()),
    ('DPC', 'Departamento 03', 3.03, null),
    ('DPD', 'Departamento 04', 4.04, null),
    ('DPE', 'Departamento 05', 5.05, null),
    ('DPF', 'Departamento 06', 6.06, now()),
    ('DPG', 'Departamento 07', 7.07, null),
    ('DPH', 'Departamento 08', 8.08, null),
    ('DPI', 'Departamento 09', 9.09, null),
    ('DPJ', 'Departamento 10', 10.1, now()),
    ('DPK', 'Departamento 20', 20.2, null),
    ('DPL', 'Departamento 30', 30.3, null),
    ('DPM', 'Departamento 40', 40.4, null),
    ('DPN', 'Departamento 50', 50.5, now()),
    ('DPO', 'Departamento 60', 60.6, null),
    ('DPP', 'Departamento 70', 70.7, null),
    ('DPQ', 'Departamento 80', 80.8, null),
    ('DPR', 'Departamento 90', 90.9, now())
;