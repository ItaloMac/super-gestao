Super Gestão
Super Gestão é um sistema web completo para gerenciamento empresarial, desenvolvido com o framework Laravel. O sistema inclui funcionalidades robustas para controle de clientes, fornecedores, produtos e muito mais.

Funcionalidades
Cadastro de Clientes: Gestão completa de informações de clientes.
Cadastro de Fornecedores: Controle detalhado de fornecedores.
Gestão de Produtos: Registro e gerenciamento de produtos e serviços.
Pedidos: Controle de pedidos realizados por clientes.
Autenticação: Sistema de login seguro para usuários.
Dashboard: Painel de controle com visão geral dos dados.
Controllers
ClienteController: Gerencia operações de CRUD para clientes.
FornecedorController: Responsável pelo CRUD de fornecedores.
ProdutoController: Controla as funcionalidades relacionadas a produtos.
PedidoController: Gere pedidos e associações entre clientes e produtos.
HomeController: Gerencia a exibição do dashboard e página inicial.
Rotas
/clientes: Rota para exibição e gerenciamento de clientes.
/fornecedores: Rota para acesso ao módulo de fornecedores.
/produtos: Rota para cadastro e visualização de produtos.
/pedidos: Gerencia os pedidos realizados no sistema.
/dashboard: Acesso ao painel de controle do sistema.
Páginas
Página Inicial: Oferece uma visão geral e acesso rápido às principais funcionalidades.
Cadastro de Clientes/Fornecedores: Interface intuitiva para inserção de dados.
Detalhes de Produtos: Tela com informações detalhadas sobre cada produto.
Pedidos: Página dedicada à gestão e visualização dos pedidos.
Configuração
Clone o repositório: git clone https://github.com/ItaloMac/super-gestao.git
Instale as dependências com composer install.
Configure o arquivo .env com as informações do seu banco de dados.
Execute as migrações para criar as tabelas: php artisan migrate.
Inicie o servidor de desenvolvimento: php artisan serve.
Tecnologias Utilizadas
PHP (Laravel): Framework principal do sistema.
MySQL: Banco de dados utilizado.
Blade: Motor de templates para as views.
Considerações Finais
O sistema foi desenvolvido com foco em escalabilidade e manutenibilidade, aproveitando as melhores práticas do Laravel para oferecer uma experiência de usuário eficiente e confiável.
