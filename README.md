# Codeigniter4-Command
Create controller, model, view using spark command in codeigniter 4.

# How to use?
Step-1: Download or clone this repo.<br/>
Step-2 : Open codeigniter4 project.<br/>
Step-3 : Copy library <b>app/Commands</b> folder and paste into your codeigniter project <b>app</b> directory.<br/>
Step-4 : Copy library <b>writable/mgdemofiles</b> folder and paste into your codeigniter project <b>writable</b> directory.<br/>
Step-5 : Now you can used command and generate Controllers and Models in codeigniter4.<br/>

# How to create controller?
Open terminal or cmd promt and fire below command.<br/>
`php spark make:controller ControllerName`

*php spark make:controller ProductController*

For more help fire<br/>
`php spark help make:controller`

# How to create model?
Open terminal or cmd promt and fire below command.<br/>
`php spark make:model Modelname`

*php spark make:model ProductModel*<br>
When fire this command the table name is by default taken as product_model.

If you want use custom table name then fire below command:<br/>
`php spark make:model ProductModel table=products`

By default primary key is <b>id</b> if you want use custom then use primary keyword like below:<br/>
`php spark make:model ProductModel primary=tid`

For more help fire<br/>
`php spark help make:model`

# How to get a list of registered route?
Open terminal or cmd promt and fire below command.<br/>
`php spark route:list`

For specific types of methods you can pass methods params as below:<br/>
`php spark route:list methods=get,post,put`
