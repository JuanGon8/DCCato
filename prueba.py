import mysql.connector

# Configuración de la conexión a la base de datos
conexion = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="sistema"
)

# Crear un objeto Cursor para ejecutar consultas SQL
cursor = conexion.cursor()

# Sentencia SQL para actualizar los registros en la tabla "reclutamiento"
sql = "UPDATE reclutamiento SET fecha_reingreso = '1999-12-31', fecha_baja = '1999-12-31'"

try:
    # Ejecutar la consulta
    cursor.execute(sql)

    # Confirmar los cambios en la base de datos
    conexion.commit()

    print("Registros actualizados exitosamente.")

except Exception as e:
    # En caso de error, deshacer los cambios
    conexion.rollback()
    print("Error:", e)

finally:
    # Cerrar el cursor y la conexión
    cursor.close()
    conexion.close()

# CÓDIGO PARA RESTABLECER AUTOMÁTICAMENTE
# SET @new_codigo := 16880;

# UPDATE reclutamiento
# SET codigo = (@new_codigo := @new_codigo + 1)
# WHERE codigo >= 16881;
