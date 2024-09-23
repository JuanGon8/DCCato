# import mysql.connector

# # Configuración de la conexión a la base de datos
# conexion = mysql.connector.connect(
#     host="localhost",
#     user="root",
#     password="",
#     database="sistema"
# )

# # Crear un objeto Cursor para ejecutar consultas SQL
# cursor = conexion.cursor()

# # Sentencia SQL para actualizar los registros en la tabla "reclutamiento"
# sql = "UPDATE reclutamiento SET fecha_reingreso = '1999-12-31', fecha_baja = '1999-12-31'"

# try:
#     # Ejecutar la consulta
#     cursor.execute(sql)

#     # Confirmar los cambios en la base de datos
#     conexion.commit()

#     print("Registros actualizados exitosamente.")

# except Exception as e:
#     # En caso de error, deshacer los cambios
#     conexion.rollback()
#     print("Error:", e)

# finally:
#     # Cerrar el cursor y la conexión
#     cursor.close()
#     conexion.close()

# # CÓDIGO PARA RESTABLECER AUTOMÁTICAMENTE
# # SET @new_codigo := 16880;

# # UPDATE reclutamiento
# # SET codigo = (@new_codigo := @new_codigo + 1)
# # WHERE codigo >= 16881;


# # REINICIAR AUTOINCREMENTO
# # SELECT MAX(codigo) FROM reclutamiento;
# # ALTER TABLE reclutamiento AUTO_INCREMENT = 16967;

import mysql.connector

# Conexión a la base de datos
conexion = mysql.connector.connect(
    host="localhost",        # Cambia esto si tu host es diferente
    user="root",       # Tu usuario de MySQL
    password="", # Tu contraseña de MySQL
    database="sistema3" # Nombre de la base de datos
)

cursor = conexion.cursor()

# Consulta para actualizar los registros del 1 al 57 en la columna 'dep_r'
query = "UPDATE alta_reportes SET dep_r = %s WHERE folio BETWEEN 1 AND 57"

# Parámetro que se va a insertar
valor = ("Sistemas",)

# Ejecutar la consulta
cursor.execute(query, valor)

# Confirmar los cambios en la base de datos
conexion.commit()

# Mostrar cuántos registros se actualizaron
print(cursor.rowcount, "registros actualizados.")

# Cerrar la conexión
cursor.close()
conexion.close()
