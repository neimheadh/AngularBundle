# AngularBundle annotations

## `@AngularEntity`

This annotation tells the system the entity class has an associated managed
angular class.

* **target**: class
* **parameters**:
  * __*resource:string (optional)*__: The associated angular entity file
    resource. If not set, the system will evaluate the resource path according
    the symfony entity class name.

    Ex: An entity class `App\Entity\BookStore\Book` will have the resource file
    `app/shared/api_platform/entities/book_store/entities/book.entity.ts`.
