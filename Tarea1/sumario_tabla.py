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

df= pd.read_csv("FIFA - World Cup Summary.csv")
print(df)

for row in df.itertuples():
    cursor.execute('''
    INSERT INTO sumario (ANIO,HOST,CHAMPION,RUNNER_UP,THIRD_PLACE,TEAMS,MATCHES_PLAYED,GOALS_SCORED,AVG_GOALS_PER_GAME)
    VALUES (?,?,?,?,?,?,?,?,?)''',
    row.YEAR,
    row.HOST,
    row.CHAMPION,
    row._4,
    row._5,
    row.TEAMS,
    row._7,
    row._8,
    row._9
    )
conexion.commit()
conexion.close()