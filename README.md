[![Open in Visual Studio Code](https://classroom.github.com/assets/open-in-vscode-c66648af7eb3fe8bc4f294546bfd86ef473780cde1dea487d3c4ff354943c9ae.svg)](https://classroom.github.com/online_ide?assignment_repo_id=10325111&assignment_repo_type=AssignmentRepo)
# Proyecto CGIS

Esta es la segunda versión del documento de requisitos correspondiente con el  **Entregable 2**. 

## Índice
1. Dominio del problema
2. Objetivos
3. Roles 
4. Requisitos de información
5. Requisitos funcionales
6. Requisitos no funcionales
7. Diagrama UML

## 1. Dominio del problema
Las cifras de trabajadores que se ausentan de sus puestos de trabajo debido a periodos de incapacidad temporal en nuestra comunidad son muy altas. Según la página del SAS: **La baja laboral debe entenderse como una decisión clínica, siendo por tanto el médico de familia el responsable directo de su gestión**, tanto si la baja se debe a contingencias comunes (enfermedad común y accidente no laboral) o contingencias profesionales (enfermedad profesional y accidente de trabajo).
Estas son las estadísticas de Andalucía:
![imagen1!](C:\Users\egoma\OneDrive\Escritorio\img1.jpg)
Debido a que estas bajas de trabajadores deben ser gestionadas por los médicos de cabecera y esto conlleva revisiones semanales o mensuales (normalmente semanales) acompañadas de un informe que el paciente debe entregar posteriormente en la empresa en la que se esta ausentando, un proceso que se repite hasta el fin de la incapacidad y mientras que esta sea menor de 12 meses (cuando supera esta fecha pasa a manos de la INSS). 
## 2. Objetivos
Esta situación lleva a plantear una posible solución al mantenimiento, creación y distribución de los informes mencionados, recogiendo todas las características necesarias, aligerando los tiempos, aumentando la efectividad, y por consiguiente informatizando procesos que todavía se llevan a cabo manualmente por personales del sector sanitario que ya están suficientemente abrumados y saturados por la situación de la sanidad pública. Este sistema que se plantea a continuación recoge ciertas características que beneficiaría a todos los usuarios de este, incluidas las empresas, ya que llevarían un control más exhaustivo de los trabajadores incapacitados temporalmente facilitando también las inspecciones que intentan evitar el abuso de los tiempos de baja que ocurren con mucha frecuencia.
## 3. Roles
- Administrador del sistema
- Médico de familia
- Paciente/Trabajador
- Empresa o entidad a la que pertenece el trabajador
## 4. Requisitos de información
IRQ-001 -> Información sobre el paciente
IRQ-002 -> Información sobre la baja (incapacidad laboral)
IRQ-003 -> Información sobre el médico
IRQ-004 -> Información sobre la empresa o la entidad
## 5. Requisitos funcionales
FRQ-001 -> Crear pacientes
FRQ-002 -> Modificar pacientes
FRQ-003 -> Listar pacientes
FRQ-004 -> Borrar pacientes
FRQ-005 -> Crear médicos
FRQ-006 -> Modificar médicos
FRQ-007 -> Listar médicos
FRQ-008 -> Borrar médicos
FRQ-009 -> Crear informes
FRQ-010 -> Modificar informes
FRQ-011 -> Listar informes
FRQ-012 -> Borrar informes
## 6. Requisitos no funcionales 
NFR-001 -> Política de privacidad
NFR-002 -> Usabilidad
## 7.UML
![imagen1!](C:\Users\egoma\OneDrive\Escritorio\UML.jpeg)
## Herramienta para escribir lenguaje de marcado
https://www.markdownguide.org/basic-syntax/ describe cómo se utiliza el markdown.

[StackEdit](https://stackedit.io/app#) puede ayudaros a trabajar con lenguajes de marca (markdown) para escribir este README.md
> Prueba las posibilidades antes de **Subir** cambios al repositorio.




