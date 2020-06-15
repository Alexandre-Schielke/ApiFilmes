<h2>Requisitos para rodar o projeto</h2>
<p>O projeto foi feito utilizando laravel 7, para que ele rode temos que seguir o seguintes requisitos segundo a documentação <a href="https://laravel.com/docs/7.x/installation#server-requirements"> CLIQE AQUI P IR A DOCUMENTAÇÃO</a></p>
<p>
	Apos clonar o projeto do github abra a pasta do projeto e rode os seguinte comando dentro do terminal:
	"composer install"
</p>
<p>
	Após concluir esta etapa copie o arquivo ".env.example" e cole como o nome ".env"
</p>

<p>
	Gere uma chave com o seguinte comando:  "php artisan key:generate"
</p>

<p>
	Agora vamos limpar o seu arquivo de configuração usando o comando:  "php artisan config:clear"
</p>

<p>
	Após estas etapas na pasta do projeto rode o comando: "php artisan serve", observe que a página inicial do Laravel vai ser exibida, mostrando assim que o projeto esta rodando
</p>

<h2>Configurando o banco de dados</h2>

<p>
	Crie um banco de dados Mysql no seu localhost - nome do banco de sua preferência
</p>

<p>
	no aquivo .env edite as seguinte configurações:<br/>
	DB_CONNECTION=mysql<br/>
	DB_HOST=127.0.0.1<br/>
	DB_PORT=3306<br/>
	DB_DATABASE={nome-do-banco}<br/>
	DB_USERNAME=root<br/>
	DB_PASSWORD={senha-se-necessario}<br/>
</p>
<p>
	Agora vamos limpar o seu arquivo de configuração usando o comando: "php artisan config:clear
</p>
<p>
	com o banco de dados criado e na paste do projeto: execute o comando: "php artisan migrate", observe que as suas tabelas vão ser criadas utilizando a função migrate do laravel
</p>

<h2>Importanto Postman</h2>
<p>
	para que possamos facilitar os teste da API basta importar o  collection atravês do link "https://www.getpostman.com/collections/d8718e0befd73bfdfef9" indo em "import>link", caso tenha dificuldade segue o tutorial de como importar https://www.youtube.com/watch?v=FzPBDU7cB74
</p>

<h2>Sobre o Projeto</h2>
O projeto possui api que possibilitam o CRUD  do atores e diretores (Usuarios), Filmes e classificações. O Atores e diretores estão na mesma tabela (users) no qual estão relacionados a um filme, assim como uma clssificação esta relacionada a um filme.<br/><br/>
##rotas<br/>
As rotas estão no seguinte diretório Route>api.php. Cada rota é nomeada e possui grupos<br/><br/>

##controllers<br/>
As controllers estão no seguinte diretório App>Http>Controllers>Api . Cada controllers possui um crud. <br/><br/>

##Resposta<br/>
Cada requisiçõas retorna error ou sucesso juntamente com o campo cahamdo "data" onde irar conter mais detalhes.  Tanto em caso de sucesso como em caso de falha um código de retorno foi definido conforme o resultado (404,200,201 etc)<br/><br/>

#Padrão de projeto<br/>
SOLID Principle  
