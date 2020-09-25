<h3 align="center">GoFinances</h3>

## Tabela de Conteúdo

- [Tabela de Conteúdo](#tabela-de-conte%C3%BAdo)
- [Sobre o Projeto](#sobre-o-projeto)
- [Imagens](#imagens)
- [Feito Com](#feito-com)
- [Executando o projeto](#executando-o-projeto)
- [Contato](#contato)


## Sobre o Projeto
Sistema CRUD Financeiro para fazer lançamentos de entradas e saídas de movimentações, informando título, categoria, tipo de movimentação e quantidade.

## Imagens
<p display:flex> 
  <img src="https://github.com/lucasrocha20/GoFinancesWithZend/blob/master/printscheens/index.png" alt="web01"/>
  <img src="https://github.com/lucasrocha20/GoFinancesWithZend/blob/master/printscheens/add.png" alt="web02"/>
</p>

### Feito com
- [Zend Framework](https://framework.zend.com/) 

### Executando o projeto

1. Criar um Banco MySQL com o nome goFinances com os seguintes campos: 
    id (INT), 
    type (VARCHAR), 
    price (DECIMAL(10,2)), 
    category (VARCHAR), 
    date (DATETIME)
  Obs: As configurações do DB podem ser modificadas na tag 'db' do seguinte arquivo 

  ```bash
    goFinacesWithZend
    ├── module/
    │   ├── Finances/
    │   │   └── config/
    │   │       └── module.config.php
    
  ```
2. Na pasta do projeto execute ```composer update```
3. Em seguida execute ```composer serve```, o projeto abrirá no localhost:8080

## Contato

Lucas Rocha - [Github](https://github.com/lucasrocha20) - **lucas_rocha.14@outlook.com**

