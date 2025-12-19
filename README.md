# Tarea – Desarrollo en Plataformas

**Estudiante:** Matheo Iza Proaño  
**Fecha:** 2025/12/19  
**Paralelo:** #2

---

## Mis Decisiones de Diseño

### 1. Tabla

**Nombre de la tabla:** `vehiculo`

#### Campos

| Campo             | Tipo                     | ¿Obligatorio? |
|------------------|--------------------------|---------------|
| id               | pk bigint                | Sí            |
| disfraz          | character varying (50)   | Sí            |
| talla            | character varying (20)   | Sí            |
| cliente          | character varying (50)   | Sí            |
| teléfono         | character varying (20)   | Sí            |
| fecha_alquiler   | timestamp                | Sí            |
| fecha_devolucion | date                     | Sí            |
| estado           | character varying (255)  | Sí            |
