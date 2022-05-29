# Decorator pattern
Decorator, lets you
- attach new behaviors to objects
- by placing these objects inside special wrapper objects ( that contain the behaviors )

It is a **Structural Pattern**. 
### More Details: [Documentation](https://docs.google.com/document/d/1x1Xk_y7dESYsaxAOsIKWWmlclnJkxktMf32RwfFknNE/edit#heading=h.xuyopzrj3dgw)

## Structural pattern
It explains how to assemble objects and classes into larger structures while keeping these structures flexible and efficient.

## Problem Domain

- Provided an HTML text
- Applied different types of filtering

## File Breakdown

- `InputFormat`: Main Interface
- `TextInput`: **Concrete component** which implement the main interface directly
- `TextFormat`: **Base Decorator** which implement the main interface
- `PlainTextFilter`: **Concrete Decorator**, to filter all tags
- `MarkdownFormat`: **Concrete Decorator**, to add HTML markdown tag in text
- `DangerousHTMLTagsFilter`: **Concrete Decorator**, filter all dangerous (literally all) HTML tags


## Run / Test
To run:
```angular2html
- clone this repo
- Install dependencies: composer install
- Run command: php index.php
```
