import mysql.connector

try:
    # Conexión a la base de datos de XAMPP
    conexion = mysql.connector.connect(
        host="localhost",
        user="root",
        password="",
        database="sistema_inventario"
    )

    cursor = conexion.cursor()
    
    # Consulta para obtener los datos
    cursor.execute("SELECT nombre, precio, stock FROM productos")
    productos = cursor.fetchall()

    print("\n========================================")
    print(" REPORTE DE INVENTARIO (PYTHON)")
    print("========================================\n")

    total_general = 0

    for p in productos:
        nombre, precio, stock = p
        valor_producto = precio * stock
        total_general += valor_producto
        print(f" Producto: {nombre}")
        print(f"   Valor en almacén: ${valor_producto:,.2f} ({stock} unidades)")
        print("-" * 40)

    print(f"\n INVERSIÓN TOTAL: ${total_general:,.2f}")
    print("========================================\n")

except mysql.connector.Error as err:
    print(f" Error de conexión: {err}")

finally:
    if 'conexion' in locals() and conexion.is_connected():
        cursor.close()
        conexion.close()