import pandas as pd
import pyodbc
import os

## CONECTARSE A SQL Y CREAR UN CURSOR
direccion_servidor = 'DESKTOP-1SM3CK0\SQLEXPRESS'
nombre_bd = 'futbol'
nombre_usuario = 'flavio'
password = 'flavio'

try:
    conexion = pyodbc.connect('Driver={SQL Server};Server=' + direccion_servidor + ';Database=' + nombre_bd + ';UID=' + nombre_usuario + ';PWD=' + password)
    # OK! conexión exitosa
except Exception as e:
    # Atrapar error
    print("Ocurrió un error al conectar a SQL Server: ", e)
cursor = conexion.cursor()


flag = True
while flag:
    print("Ingrese una opcion:")
    print("1.Mostrar Campeones\n2.Mostar Goleadores\n3.Mostrar Tercer Lugar mas veces\n4.Mostrar País más golees recibidos\n5.Buscar un país\n6.Top 3 países en el mundial\n7.Mayor cantidad ganados\n8.Países ganando en casa\n9.Más vecesen el podio\n10.Mayores rivales")
    entrada = input(str())
    if entrada == "1":
        cursor.execute('''
            SELECT CHAMPION, ANIO FROM sumario
        ''')
        # Recuperar los resultados de la consulta
        resultados = cursor.fetchall()
        # Mostrar los resultados
        for resultado in resultados:
            print(f"Campeón: {resultado.CHAMPION}, Año: {resultado.ANIO}")
    elif entrada == "2":
        cursor.execute('''select TOP 5
        EQUIPO,
        SUM(GOL_FOR) AS goles_metidos
        FROM
        mundiales
        GROUP BY
        EQUIPO
        ORDER BY
        goles_metidos DESC;''')
        resultados = cursor.fetchall()
        for resultado in resultados:
            equipo = resultado.EQUIPO
            goles = resultado.goles_metidos
            print(f"Pais: {equipo} con la increible cantidad de {goles} goles.")
    elif entrada == "3":
        cursor.execute('''
        SELECT TOP 5
            THIRD_PLACE,
            COUNT(*) AS Veces_Tercer_Lugar
        FROM
            sumario
        GROUP BY
            THIRD_PLACE
        ORDER BY
            Veces_Tercer_Lugar DESC;
        ''')
        resultados = cursor.fetchall()
        for resultado in resultados:
            tercer_lugar = resultado.THIRD_PLACE
            veces_tercer_lugar = resultado.Veces_Tercer_Lugar
            print(f"País: {tercer_lugar}, Veces en Tercer Lugar: {veces_tercer_lugar}")
    elif entrada == "4":
        cursor.execute('''
        SELECT TOP 1
        EQUIPO,
        SUM(GOL_AGAINST) AS goles_contra
        FROM
        mundiales
        GROUP BY
        EQUIPO
        ORDER BY
        goles_contra DESC;
    ''')
        resultados = cursor.fetchall()
        for resultado in resultados:
            equipo = resultado.EQUIPO
            goles = resultado.goles_contra
            print(f"Pais: {equipo} ha recibido {goles} goles en contra")
    elif entrada == "5":
        continue
    elif entrada == "6":
        cursor.execute('''
        SELECT TOP 3
            EQUIPO AS País,
            STRING_AGG(CAST(ANIO AS VARCHAR), ', ') AS Años_Participación
        FROM
            mundiales
        GROUP BY
            EQUIPO
        ORDER BY
            COUNT(*) DESC;
        ''')    
        resultados = cursor.fetchall()
        for resultado in resultados:
            pais = resultado.EQUIPO
            años = resultado.Años_participacion
            print(f"Pais {pais} ha sido top 3 en los años {años}")
    elif entrada == "7":
        continue
    elif entrada == "8":
        cursor.execute('''
        SELECT HOST, CHAMPION from sumario
        WHERE HOST = CHAMPION;
        ''')
        resultados = cursor.fetchall()
        for resultado in resultados:
            campeon = resultado.CHAMPION
            host = resultado.HOST
            print(f"El campeon fue :{campeon}, en su hogar {host}")
    elif entrada == "9":
        cursor.execute('''WITH Podio AS (
    SELECT ANIO, HOST AS Pais FROM sumario
    UNION ALL
    SELECT ANIO, CHAMPION AS Pais FROM sumario
    UNION ALL
    SELECT ANIO, RUNNER_UP AS Pais FROM sumario
    UNION ALL
    SELECT ANIO, THIRD_PLACE AS Pais FROM sumario
    )
    SELECT TOP 1
        Pais,
        COUNT(*) AS veces_en_podio
    FROM Podio
    GROUP BY
        Pais
    ORDER BY
        veces_en_podio DESC;''')
        resultados = cursor.fetchall()
        for resultado in resultados:
            pais = resultado.Pais
            veces_podio = resultado.veces_en_podio
            print(f"El pais {pais} ha estado {veces_podio} en el top 3")
    elif entrada == "10":
        continue
    elif entrada == "terminar" or "Terminar":
        flag = False
    else:
        print("Porfavor escribe una peticion valida, gracias.")