import mysql.connector
import matplotlib.pyplot as plt

try:
    conexion = mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="sistema_inventario"
    )
    cursor = conexion.cursor()
    cursor.execute("SELECT nombre, stock FROM productos")
    datos = cursor.fetchall()

    nombres = [fila[0] for fila in datos]
    stocks = [fila[1] for fila in datos]

    # Crear la grafica
    plt.bar(nombres, stocks, color='skyblue')
    plt.title('Niveles de Stock de Productos')
    plt.xlabel('Productos')
    plt.ylabel('Cantidad en Unidades')

    # Guardar la grafica como imagen
    plt.savefig('reporte_stock.png')
    print("Grafica generada con exito como 'reporte_stock.png'")

except Exception as e:
    print(f"Error: {e}")