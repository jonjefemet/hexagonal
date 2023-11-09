# Arquitectura Hexagonal

![PHP](https://img.shields.io/badge/-PHP-777BB4?style=flat-square&logo=php&logoColor=white)
![TypeScript](https://img.shields.io/badge/-TypeScript-007ACC?style=flat-square&logo=typescript&logoColor=white)
![Python](https://img.shields.io/badge/-Python-3776AB?style=flat-square&logo=python&logoColor=white)

La arquitectura hexagonal, también conocida como puertos y adaptadores, es un patrón de diseño de software que permite a una aplicación ser indiferente a la naturaleza de los dispositivos de entrada y salida. Proporciona la capacidad de cambiar las capas de la aplicación sin afectar la lógica de negocio.

La principal ventaja de la arquitectura hexagonal es que permite cambiar las capas de la aplicación sin afectar la lógica de negocio. Por ejemplo, podrías cambiar una base de datos MySQL por una MongoDB sin tener que modificar el código del dominio.

![Arquitectura Hexagonal](./resource/hexagonal.png)

En la imagen, puedes ver que la lógica de negocio central (dominio) está rodeada por puertos y adaptadores. Los adaptadores primarios (controladores) envían comandos al dominio, mientras que los adaptadores secundarios (repositorios) manejan la persistencia de datos y otras operaciones de salida.

## Estructura de carpetas y principios de diseño

Por favor, ten en cuenta que esta es una estructura de carpetas sugerida y que la implementación real puede variar dependiendo de las necesidades específicas de tu proyecto.
```
project-root
│
├── src
│   ├── Domain
│   │   ├── Model
│   │   ├── Repository
│   │   └── Service
│   ├── Application
│   │   ├── Service
│   │   ├── Command
│   │   └── Query
│   └── Infrastructure
│       ├── Persistence
│       └── Service
│
├── tests
│   ├── DomainTests
│   ├── ApplicationTests
│   └── InfrastructureTests
│
├── config
│
├── public
│
└── vendor

```

La estructura de carpetas propuesta sigue los principios del Diseño Guiado por el Dominio (DDD), SOLID y Value Objects. Estos principios ayudan a crear un código más limpio, modular y fácil de mantener.

- `Domain`: Esta carpeta contiene la lógica de negocio y las entidades del dominio. Aquí es donde se implementan los Value Objects y las entidades de DDD.

- `Application`: Esta carpeta contiene los servicios de aplicación, que orquestan el uso de los objetos de dominio y las operaciones de infraestructura.

- `Infrastructure`: Esta carpeta contiene todo el código que interactúa con sistemas externos, como bases de datos, servicios web, etc.

- `tests`: Esta carpeta contiene todas las pruebas unitarias y de integración para el código de la aplicación.

Esta estructura de carpetas puede implementarse en cualquier lenguaje de programación, incluyendo TypeScript, PHP y Python. Cada uno de estos lenguajes tiene sus propias convenciones y características que pueden aprovecharse al implementar DDD, SOLID y Value Objects.

## Principios SOLID

Los principios SOLID son un conjunto de cinco principios de diseño orientado a objetos que ayudan a crear sistemas de software más comprensibles, flexibles y mantenibles. Aquí está una breve descripción de cada uno:

- **S**ingle Responsibility Principle (SRP): Un clase debe tener solo una razón para cambiar. Esto significa que una clase debe tener solo una tarea o responsabilidad.

- **O**pen/Closed Principle (OCP): Las entidades de software (clases, módulos, funciones, etc.) deben estar abiertas para su extensión, pero cerradas para su modificación.

- **L**iskov Substitution Principle (LSP): Las subclases deben ser sustituibles por sus clases base. Es decir, un objeto de una clase derivada debe poder reemplazar un objeto de la clase base sin afectar la corrección del programa.

- **I**nterface Segregation Principle (ISP): Los clientes no deben ser forzados a depender de interfaces que no utilizan. Esto significa que una clase no debe implementar métodos que no necesita.

- **D**ependency Inversion Principle (DIP): Depender de abstracciones, no de concreciones. Es decir, las clases de alto nivel no deben depender de las clases de bajo nivel. Ambas deben depender de abstracciones.

## Diseño Guiado por el Dominio (DDD)

El Diseño Guiado por el Dominio (DDD) es un enfoque para el desarrollo de software que se centra en la creación de un modelo de dominio, que es una abstracción del problema que el software está diseñado para resolver.

Aquí están algunos de los conceptos clave de DDD:

- **Entidades**: Son objetos que tienen una identidad que no cambia a lo largo del tiempo (por ejemplo, un usuario o una cuenta bancaria).

- **Value Objects**: Son objetos que no tienen identidad y son inmutables. Se definen solo por sus atributos (por ejemplo, una dirección de correo electrónico o una fecha).

- **Agregados**: Son grupos de entidades y objetos de valor que se tratan como una unidad para la persistencia de datos.

- **Servicios de Dominio**: Son operaciones que no pertenecen a ninguna entidad o valor objeto. Por ejemplo, una operación que requiere interactuar con múltiples agregados.

- **Eventos de Dominio**: Son eventos significativos que ocurren en el dominio. Por ejemplo, cuando se crea una nueva cuenta bancaria, podría emitirse un evento de dominio "CuentaCreada".

- **Repositorios**: Son interfaces que permiten a las entidades y los agregados persistir y recuperar de la persistencia.

Implementar DDD puede ser complejo, pero puede resultar en un código más limpio y mantenible que refleja mejor el problema de negocio que el software está tratando de resolver.

## Un poco sobre mis pensamientos

> A lo largo de mi experiencia, desde mi formación académica hasta mi carrera laboral, he recorrido un camino que me ha llevado a mejorar tanto como persona como desarrollador. Un aspecto crucial que he aprendido es la importancia de despojarnos de la mentalidad de ser el "súper programador" y de considerar que un lenguaje es superior a otro. Aunque soy un fanático de PHP y lo defendería a capa y espada, recordando las palabras de Fabien Potencier, sé que PHP no es el mejor lenguaje que existe y estoy dispuesto a reconocer sus peculiaridades. No obstante, para mí, sigue siendo la mejor plataforma jamás creada.
>
> Es fundamental dejar de ser cerrados, estar abiertos a la crítica y dispuestos a compartir conocimiento. Creo que estas son las bases para ser un mejor desarrollador; dejar de ser egoístas y comenzar a pensar en los demás. Sigamos cultivando esta cultura y disfrutemos del viaje, ya que aún nos queda mucho por aprender.
# hexagonal
