# Tarea UD2
> **ALUMNO**: DIEGO MATEOS ARLANZÓN

# Punto 2 - Transformación al modelo relacional

**EMPLEADO** (<u>id_empleado</u>, nombre, email, calle, numero)

- **Justificación**: direccion es un atributo compuesto; se representa con sus componentes calle y numero.

**TELEFONO_EMPLEADO** (<u>id_empleado*</u>, <u>telefono</u>)

- {id_empleado} referencia EMPLEADO.
- **Justificación**: telefono es multivaluado, por eso se crea una tabla independiente.

**DISEÑADOR** (<u>id_empleado*</u>, herramienta_diseño)

- {id_empleado} referencia EMPLEADO.
- **Justificación**: se crea una tabla para el subtipo y se conserva la clave de EMPLEADO.

**COLABORA** (<u>id_empleado*</u>, <u>id_videojuego*</u>, fecha, rol)

- {id_empleado} referencia DISEÑADOR.
- {id_videojuego} referencia VIDEOJUEGO.
- **Justificación**: COLABORA es una relación muchos a muchos y tiene atributos propios por lo que se requiere una tabla.

**PROGRAMADOR** (<u>id_empleado*</u>, lenguaje_principal, id_videojuego*)

- {id_empleado} referencia EMPLEADO.
- {id_videojuego} referencia VIDEOJUEGO.
- **Justificación**: se crea una tabla para el subtipo. La relación DESARROLLA se representa con una FK porque cada programador desarrolla un videojuego y cada videojuego puede tener varios programadores. No es necesaria una tabla adicional aunque seria util por si en el futuro se requiere añadir datos como a colabora, y en mi opinión sería más facil de entender.

**VIDEOJUEGO** (<u>id_videojuego</u>, titulo, precio, genero)

**PLATAFORMA** (<u>id_plataforma</u>, nombre, id_videojuego*)

- {id_videojuego} referencia VIDEOJUEGO y admite valores nulos.
- **Justificación**: cada videojuego puede estar asociado a varias plataformas, mientras que cada plataforma puede pertenecer a cero o un videojuego. Por eso, la FK se incluye en PLATAFORMA.


<!--  --> <div style="page-break-after: always;"></div>
# Punto 3 - Normalizar

> El punto "4. Justificar cada paso" -> se ha realizado dentro de los otros apartados

## 1. Identificar todas las dependencias funcionales.

**Tabla inicial:**

VENTA (<u>codigo_vendedor</u>, <u>codigo_producto</u>, email_vendedor, codigo_oficina_vendedor, ciudad_oficina, telefono_oficina, precio_producto, codigo_categoria_producto, descuento_categoria, fecha, cantidad)

- La clave primaria de VENTA es codigo_vendedor y codigo_producto.
- En ese ejemplo ficticio un vendedor solo puede vender un producto una vez.

### a) Dependencias funcionales completas

- (codigo_vendedor, codigo_producto) -> fecha, cantidad.

**Justificación**: necesitamos conocer tanto el vendedor como el producto para identificar la fecha de la venta y la cantidad vendida.

### b) Dependencias funcionales parciales

- codigo_vendedor -> email_vendedor, codigo_oficina_vendedor.
- codigo_producto -> precio_producto, codigo_categoria_producto.

**Justificación**: estos atributos dependen únicamente de una parte de la clave primaria compuesta.

### c) Dependencias funcionales transitivas

- codigo_oficina_vendedor -> ciudad_oficina, telefono_oficina.
- codigo_categoria_producto -> descuento_categoria.

**Justificación**: Son transitivas porque los atributos dependen de otros atributos que no forman parte de la clave primaria. Las cadenas de dependencias son las siguientes

- codigo_vendedor -> codigo_oficina_vendedor -> ciudad_oficina, telefono_oficina.
- codigo_producto -> codigo_categoria_producto -> descuento_categoria.

<!--  --> <div style="page-break-after: always;"></div>
## 2. Normalizar primero a 2FN, pero todavía no a 3FN, mostrando las tablas resultantes con sus claves.

**VENTA** (<u>codigo_vendedor*</u>, <u>codigo_producto*</u>, fecha, cantidad)

- {codigo_vendedor} referencia VENDEDOR.
- {codigo_producto} referencia PRODUCTO.

**VENDEDOR** (<u>codigo_vendedor</u>, email_vendedor, codigo_oficina_vendedor, ciudad_oficina, telefono_oficina)

**PRODUCTO** (<u>codigo_producto</u>, precio_producto, codigo_categoria_producto, descuento_categoria)

**Justificación**: Para alcanzar la 2FN, eliminamos las dependencias parciales identificadas en el apartado anterior, moviendo los datos del vendedor y del producto en tablas separadas.

## 3. Partiendo de las tablas en 2FN, normalizar a 3FN, mostrando las tablas finales con sus claves primarias y foráneas.

**VENTA** (<u>codigo_vendedor*</u>, <u>codigo_producto*</u>, fecha, cantidad)

- {codigo_vendedor} referencia VENDEDOR.
- {codigo_producto} referencia PRODUCTO.

**VENDEDOR** (<u>codigo_vendedor</u>, email_vendedor, codigo_oficina_vendedor*)

- {codigo_oficina_vendedor} referencia OFICINA.

**OFICINA** (<u>codigo_oficina_vendedor</u>, ciudad_oficina, telefono_oficina)

**PRODUCTO** (<u>codigo_producto</u>, precio_producto, codigo_categoria_producto*)

- {codigo_categoria_producto} referencia CATEGORIA.

**CATEGORIA** (<u>codigo_categoria_producto</u>, descuento_categoria)

**Justificación**: Para alcanzar la 3FN, eliminamos las dependencias transitivas que permanecen en las tablas VENDEDOR y PRODUCTO, creando tablas
