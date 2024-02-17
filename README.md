# product-module-magento

Os arquivos que montam o respectivo módulo

->Block/CustomProduct.php

Este arquivo contém o código cria o bloco chamado Custom\Product\Block | CustomProduct que herda de Template. Esse bloco é utilizado para gerenciar informações relacionadas a produtos. Dentro deste bloco, temos uma variável $imageHelper que recebe a classe Image do Magento, responsável por lidar com imagens de produtos. Além disso, há outra variável $config que recebe a classe Config.

->Controller/Stock/Index.php

Código relacionado ao Stock no namespace Custom\Product\Controller. Usa classes default do Magento, como Action e Context.O construtor recebe o Context, uma classe de configuração, e a interface de repositório de produtos (ProductRepositoryInterface). 

->etc/admingtml/system.xml

Arquivo criado para possibilitar ações no painel admin do magento, nele estipulamos a seção, grupo e opções que serão disponibilizados em Lojas > Configurações > Catalogo

->etc/frontend/routes.xml

Aqui declaramos a url que será utilizada no front end, pelo route e seu frontName.

->i18n/pt_BR.csv

Neste podemos declarar um dicionario para tradução, neste caso para português.

->Model/Config.php

Aqui encontramos a classe Config é responsável por fornecer acesso às configurações do módulo como verificar se o bloco deve ser exibido com canShowBlock, obtendo o SKU configurado no admin e recuperando as informações do produto dessa SKU informada.

->view/frontend/layout/cms_index_index.xml

Xml responsável pela retorno do conteudo que se encontra no phtml criado e trazendo para o front da home page.

->vcustom_product.phtml

Neste arquivo nós criamos o html junto com php.

->/_module.less

Arquivo de estilo em less, como regras básicas de estilo.

->web/js/real_product_qty.js

Javascript criado para atualizar em tempo real.

->web/js/requirejs-config.js

Arquivo responsavél para garantir que tudo seja carregado de acordo.

->registration.php

Default do Magento
