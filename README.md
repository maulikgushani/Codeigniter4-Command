# Codeigniter4-Command
Create controller, model, view using spark command in codeigniter 4.

# How to use?
Step-1: Download or clone this repo.<br/>
Step-2 : Open Download codeigniter4 project.<br/>
Step-3 : Copy library <b>app/Commands</b> folder and paste into your codeigniter project <b>app</b> directory.<br/>
Step-4 : Copy library <b>writable/mgdemofiles</b> folder and paste into your codeigniter project <b>writable</b> directory.<br/>
Step-5 : Now you can used command and generate Controllers and Models in codeigniter4.<br/>

# How to create controller?
Open terminal or cmd promt and fire below command.<br/>
`php spark make:controller ControllerName`

*php spark make:controller ProductController*

for more help fire
`php spark help make:controller`

# How to create model?
Open terminal or cmd promt and fire below command.<br/>
`php spark make:model Modelname`

*php spark make:model ProductModel*
When fire this command the table name is my default taken as product_model.

If you want pass table name then fire below command:
*php spark make:model ProductModel table=products*
