import pandas as pd
import pyodbc
import os

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