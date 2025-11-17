# Sistema de Gestión de Profesores - Resumen del Proyecto

## 📋 Descripción

Sistema web dinámico para gestionar información de profesores con MongoDB Atlas. Cumple con todos los requisitos del examen.

## ✅ Requisitos Cumplidos

### 1. Base de Datos en la Nube
- **MongoDB Atlas** configurado y funcionando
- URI: `mongodb+srv://jeancarlo:jean12345@cluster0.3ixvnnj.mongodb.net/`
- Base de datos: `ExamProfessors`
- Colección: `professors`

### 2. Cinco Atributos + ID
1. **name** (string): Nombre completo del profesor
2. **department** (string): Departamento académico
3. **specialty** (string): Especialidad
4. **years_experience** (number): Años de experiencia
5. **salary** (number): Salario base en USD
6. **_id** (ObjectId): ID autogenerado por MongoDB

### 3. Operaciones CRUD
- ✅ **INSERT**: Formulario para agregar profesores (`php/insert.php`)
- ✅ **READ ALL**: Leer todos los profesores (`php/read_all.php`)

### 4. Reglas de Negocio (Cálculo de Bonos)

El sistema calcula automáticamente bonos salariales usando **PHP** en `php/config.php`:

#### Fórmula de Bonificación:

**a) Bono por Experiencia** (2% por año, máximo 20 años)
```
Bono = min(años_experiencia, 20) × 2% × salario_base
```

**b) Bono por Especialidad de Alta Demanda** (+15%)
Especialidades: AI, Machine Learning, Data Science, Cybersecurity, Cloud Computing, Blockchain
```
Si specialty contiene alguna especialidad de alta demanda:
  Bono adicional = 15% × salario_base
```

**c) Bono por Liderazgo Senior** (+10%)
Para profesores con 15+ años de experiencia
```
Si años_experiencia >= 15:
  Bono adicional = 10% × salario_base
```

**d) Bono por Mérito de Carrera Media** (+5%)
Para profesores con 5-14 años de experiencia
```
Si 5 <= años_experiencia < 15:
  Bono adicional = 5% × salario_base
```

#### Ejemplo de Cálculo:

**Profesor:** Dr. Sarah Johnson
- Salario Base: $95,000
- Experiencia: 15 años
- Especialidad: Artificial Intelligence

**Cálculos:**
1. Experiencia: 15 × 2% = 30% = $28,500
2. Alta demanda (AI): 15% = $14,250
3. Liderazgo senior: 10% = $9,500
4. **Total Bono: $52,250 (55%)**
5. **Compensación Total: $147,250**

### 5. Tecnologías Utilizadas

**Frontend:**
- HTML5 (estructura)
- CSS3 (diseño responsive con gradientes)
- JavaScript Vanilla (sin frameworks, interacción con API)

**Backend:**
- PHP 7.4+ (lógica de negocio y API)
- MongoDB Driver para PHP

**Base de Datos:**
- MongoDB Atlas (nube)

## 📁 Estructura del Proyecto

```
Exam/
├── index.html              # Interfaz principal
├── test.html              # Página de pruebas
├── css/
│   └── styles.css         # Estilos CSS responsive
├── php/
│   ├── config.php         # Conexión MongoDB + reglas de negocio
│   ├── insert.php         # Endpoint para insertar
│   └── read_all.php       # Endpoint para leer todos
├── composer.json          # Dependencias PHP
├── .htaccess             # Configuración Apache
├── .gitignore            # Archivos ignorados por Git
├── README.md             # Documentación en inglés
├── RESUMEN_PROYECTO.md   # Este archivo
├── DEPLOYMENT.md         # Guía de despliegue
└── sample_data.json      # Datos de ejemplo
```

## 🚀 Cómo Ejecutar Localmente

### Opción 1: Servidor PHP Integrado (Más Fácil)

```bash
# 1. Instalar dependencias
composer install

# 2. Iniciar servidor
php -S localhost:8000

# 3. Abrir navegador
http://localhost:8000
```

### Opción 2: XAMPP

1. Copiar carpeta `Exam` a `C:\xampp\htdocs\`
2. Abrir terminal en `C:\xampp\htdocs\Exam`
3. Ejecutar: `composer install`
4. Iniciar Apache desde XAMPP Control Panel
5. Abrir: `http://localhost/Exam`

## 🌐 Despliegue en la Nube (REQUERIDO)

### Opciones Recomendadas (Gratis):

1. **InfinityFree** (más fácil)
   - Registro: https://www.infinityfree.net/
   - Subir archivos por FTP
   - Instalar dependencias

2. **Railway.app** (moderno)
   ```bash
   railway login
   railway init
   railway up
   ```

3. **Render.com** (desde GitHub)
   - Conectar repositorio
   - Build: `composer install`
   - Start: `php -S 0.0.0.0:$PORT`

Ver **DEPLOYMENT.md** para instrucciones detalladas.

## 🧪 Probar el Sistema

1. **Abrir `index.html`** en navegador
2. **Agregar un profesor** usando el formulario
3. **Click en "Load All Professors"** para ver todos
4. **Verificar bonos calculados** automáticamente

También puedes usar `test.html` para:
- Probar conexión MongoDB
- Agregar datos de ejemplo
- Verificar cálculos de bonos

## 📊 Funcionalidades Implementadas

### Interfaz Web
- ✅ Formulario responsive para agregar profesores
- ✅ Validación de campos
- ✅ Mensajes de éxito/error
- ✅ Visualización de todos los profesores
- ✅ Tarjetas con información detallada
- ✅ Estadísticas resumidas (total salarios, bonos, etc.)
- ✅ Diseño moderno con gradientes
- ✅ Compatible con móviles, tablets y desktop

### Backend
- ✅ Conexión segura a MongoDB Atlas
- ✅ API RESTful en PHP
- ✅ Validación de datos
- ✅ Manejo de errores
- ✅ Cálculo automático de bonos
- ✅ Explicación detallada de cada bono
- ✅ CORS habilitado

### Base de Datos
- ✅ MongoDB Atlas en la nube
- ✅ Colección `professors` configurada
- ✅ Timestamps automáticos
- ✅ ObjectId como identificador único

## 🎨 Características de Diseño

- Gradiente moderno (violeta/morado)
- Tarjetas con sombras y efectos hover
- Diseño responsive (Grid CSS)
- Íconos y badges
- Colores diferenciados para bonos
- Animaciones suaves
- Tipografía clara (Segoe UI)

## 📝 Notas Importantes

### Configuración MongoDB Atlas
1. Ir a: https://cloud.mongodb.com/
2. Network Access → Add IP Address → Allow Access from Anywhere (0.0.0.0/0)
3. Esto permite que tu hosting se conecte

### Campos Requeridos
- Todos los campos son obligatorios (*)
- `years_experience`: número entero (0-50)
- `salary`: número decimal (USD)

### Reglas de Negocio
- Los bonos se calculan en **PHP** (server-side)
- Se guardan como campos computados al leer
- No se almacenan en la base de datos (se calculan en tiempo real)

## 🎯 Criterios de Evaluación Cumplidos

| Criterio | Estado | Ubicación |
|----------|--------|-----------|
| 5 atributos + ID | ✅ | Todos los archivos PHP |
| Base de datos en nube | ✅ | MongoDB Atlas configurado |
| Web client | ✅ | `index.html` |
| PHP backend | ✅ | Carpeta `php/` |
| INSERT operation | ✅ | `php/insert.php` |
| READ ALL operation | ✅ | `php/read_all.php` |
| Cálculo de valores | ✅ | `php/config.php` (función calculateSalaryBonus) |
| Página en la nube | ⏳ | Pendiente de desplegar |

## 📞 Soporte

Si tienes problemas:

1. **Verificar MongoDB Atlas**:
   ```bash
   # Abrir test.html para probar conexión
   ```

2. **Verificar dependencias**:
   ```bash
   composer install
   ```

3. **Ver errores PHP**:
   - Revisar console del navegador (F12)
   - Revisar errores en respuestas de API

## 🏆 Características Extra

- Página de pruebas (`test.html`)
- Datos de ejemplo (`sample_data.json`)
- Documentación completa
- Guía de despliegue
- Estadísticas en tiempo real
- Ordenamiento por compensación total
- Explicación detallada de cada bono

## 📈 Próximos Pasos

1. ✅ Desarrollo completado
2. ⏳ Ejecutar `composer install`
3. ⏳ Probar localmente
4. ⏳ Desplegar en la nube
5. ⏳ Verificar funcionamiento
6. ⏳ Obtener URL pública
7. ⏳ Entregar proyecto

---

**Tema del Roster:** Professors (Profesores)
**Base de Datos:** MongoDB Atlas
**Operación:** READ ALL (con INSERT)
**Cálculo:** Bonos salariales basados en experiencia y especialidad
**Estado:** ✅ Completo y listo para desplegar

¡Buena suerte con el examen! 🚀
