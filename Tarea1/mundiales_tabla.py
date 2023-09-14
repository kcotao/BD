import pandas as pd
import pyodbc
import os
import glob

## EXTRAER LA DATA DEL CSV
directorio= r"C:\Users\flavi\Desktop\BD\Tarea1"
dataframe = []
años=[]

for archivo in os.listdir(directorio):
    if archivo.endswith(".csv") and not archivo.endswith("y.csv"):
        archivo_csv = os.path.join(directorio, archivo)
        print(archivo_csv[40:44])
        años.append(archivo_csv[40:44])
        data = pd.read_csv(archivo_csv)
        dataframe.append(data)
print(años)

  
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


i=1
o=0
for df in dataframe:
    for row in df.itertuples():
        cursor.execute('''
        INSERT INTO mundiales (TABLA_ID,POSITION, EQUIPO, PARTIDOS, WIN, DRAW, LOSS, GOL_FOR, GOL_AGAINST, GOL_DIFF, PUNTOS, ANIO)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ''',
        i,
        row.Position,
        row.Team,
        row._3,
        row.Win,
        row.Draw,
        row.Loss,
        row._7,
        row._8,
        (row._7-row._8),
        row.Points,    
        años[o]
    )
        i= i+1
    o = o+1

conexion.commit()
conexion.close()    