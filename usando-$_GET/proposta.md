# Carregando páginas dinâmicas com $_GET

A variável superglobal $_GET recebe o conteúdo enviado pela URL, ou seja, o conteúdo digitado na barra de endereços do navegador.

Podemos usar a variável $_GET para carregar páginas dinamicamente. 

Primeiramente vamos dividir a página em partes:

1. Crie uma página chamada header.php e nela adicione apenas o conteúdo do cabeçalho de sua página, isto é, a abertura da tag html, a tag head, o início do body e o header. Não se preocupe em fechar todas as tags (elas serão fechadas em outro arquivo);
2. Crie uma página chamada "home.php". Nela coloque o conteúdo principal;
3. Crie uma página chamada "equipe.php" (ou qualquer outro nome);
4. Crie um arquivo chamado "footer.php". Nele você deve fechar as tags abertas no arquivo "header.php";

Agora vamos criar a página "index.php". Ela será responsável por carregar dinamicamente todas as outras páginas.
Observe a seguir:

```php
<?php
//Define a página atual pela URL
$pagina = 'home';

if(isset($_GET['pagina'])){
    $pagina = $_GET['pagina'];
}

//Carrega o header.php
include 'header.php';

//Carrega a página escolhida pelo usuário
switch ($pagina) {
    case 'equipe':
        include 'equipe.php';
        break;

    default:
        include 'app/views/home.php';
        break;
}

//Carrega o footer.php
include 'footer.php';
```
Ao entrar na página principal do seu navegador, sua página dinâmica carregará automaticamente o arquivo "home.php" no centro da página, pois ele verificará se existe uma informação enviada pela URL: 
```php
if(isset($_GET['pagina'])){
```
Ou seja, se existir um valor enviado a variável superglobal $_GET, a variável $pagina recebe esse valor, senão ela carrega a página padrão: "home.php".

```php
switch ($pagina) {
    case 'equipe':
        include 'equipe.php';
        break;

    default:
        include 'app/views/home.php';
        break;
}
```

Como funciona na prática

Se você inserir o valor "pagina" na URL, ele carregará a página requisitada.  Por exemplo, veja como carregar a página "equipe.php" ao invés da página "home.php":

http://www.seu_site.com.br/?pagina=equipe