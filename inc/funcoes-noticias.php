<?php
require "conecta.php";

/* Usada em noticia-insere.php */
function inserirNoticia(
    $conexao,
    $titulo,
    $texto,
    $resumo,
    $nomeImagem,
    $usuarioId
) {

    $sql = "INSERT INTO noticias(
                titulo, texto, resumo, imagem, usuario_id
            ) VALUES(
                '$titulo', '$texto', '$resumo', 
                '$nomeImagem', $usuarioId
            )";

    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // fim inserirNoticia


/* Usada em noticia-insere.php e noticia-atualiza.php */
function upload($arquivo)
{

    /* VALIDAÇÃO BACK-END */

    // Lista de formatos suportados pelo site
    // (precisa ser igual ao que está no HTML)
    $tiposValidos = [
        "image/png", "image/jpeg",
        "image/gif", "image/svg+xml"
    ];

    // Verificando se o tipo do arquivo NÃO É um dos suportados
    if (!in_array($arquivo['type'], $tiposValidos)) {
        echo "<script>
            alert('Formato inválido!'); history.back();
            </script>";
        exit;
    }

    // Obtendo apenas o nome/extensão do arquivo
    $nome = $arquivo['name'];

    // Obtendo informações de acesso temporário
    $temporario = $arquivo['tmp_name'];

    // Definindo para onde a imagem vai e com qual nome
    $destino = "../imagens/" . $nome;

    // Movendo o arquivo da área temporária para a pasta final
    move_uploaded_file($temporario, $destino);
} // fim upload



/* Usada em noticias.php */
function lerNoticias($conexao, $idUsuario, $tipoUsuario)
{
    //Verificando se o tipo de usuário é admin
    if ($tipoUsuario === 'admin') {
        $sql = "SELECT noticias.id,
                     noticias.titulo,
                     noticias.data,
                     usuario.nome AS autor
                      FROM noticias JOIN usuario 
                      ON noticias.usuario_id=usuario.id 
                      ";
    } else {
        //SQL editor:pode carregar /ver  tudo dele somente
        $sql = "SELECT id,titulo ,data FROM noticias WHERE usuario_id = $idUsuario ORDER BY data DESC";
    }


    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    //Ler vários arrays matriz
    return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
} // fim lerNoticias


/* Usada em noticias.php e páginas da área pública */
function formataData($data){
    $dataFormatada= date("d/m/Y H:i",strtotime($data));
    return $dataFormatada;


} // fim formataData


/* Usada em noticia-atualiza.php */
function lerUmaNoticia($conexao, $idNoticias, $idUsuario, $tipoUsuario)
{
    if ($tipoUsuario == "admin") {
        // ADMIN-pode carreagar dados de qualquer noticias.
        $sql = "SELECT * FROM noticias WHERE id=$idNoticias";
    } else {
        //EDITOR-Carrega só os dados dele mesmo.
        $sql = "SELECT * FROM noticias  WHERE id=$idNoticias AND usuario_id=$idUsuario";
    }

    $resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    //Ler uma noticias
    return mysqli_fetch_assoc($resultado);
} // fim lerUmaNoticia


/* Usada em noticia-atualiza.php */
function atualizarNoticia($conexao, $titulo, $texto, $resumo, $imagem, $idNoticias, $idUsuario, $tipoUsuario){
    if ($tipoUsuario == 'admin') {
        //Sql do admin:pode atualizar qualquer noticias
        $sql = "UPDATE noticias SET 
titulo='$titulo',texto='$texto',
resumo='$resumo',imagem='$imagem' WHERE id=$idNoticias";
    } else {
        //Sql do editor:pode atualizar somente as dele
        $sql = "UPDATE noticias SET 
titulo='$titulo',texto='$texto',
resumo='$resumo',imagem='$imagem' WHERE id= $idNoticias AND usuario_id = $idUsuario";
    }




    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // fim atualizarNoticia


/* Usada em noticia-exclui.php */
function excluirNoticia($conexao,$idNoticias,$idUsuario,$tipoUsuario){
if($tipoUsuario=='admin'){
    $sql="DELETE FROM noticias WHERE id=$idNoticias";
}else{
    $sql="DELETE FROM noticias WHERE id=$idNoticias AND usuario_id = $idUsuario";
}


     mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim excluirNoticia



/* ******************************************************* */


/* Funções usadas nas páginas da área pública */

/* Usada em index.php */
function lerTodasAsNoticias($conexao){
    $sql="SELECT titulo,resumo,imagem, id FROM noticias ORDER BY data DESC";



 $resultado= mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
 return mysqli_fetch_all($resultado, MYSQLI_ASSOC);

} // fim lerTodasAsNoticias


/* Usada em noticia.php */
function lerDetalhes($conexao,$id){
    
   $sql=" SELECT 
    noticias.data,
    noticias.titulo,
    noticias.imagem,
    noticias.texto,
    usuario.nome AS autor
    FROM noticias join usuario
    ON noticias.usuario_id= usuario.id
    WHERE noticias.id=$id
    ORDER BY data DESC"; 



    $resultado= mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
    return mysqli_fetch_assoc($resultado);

} // fim lerDetalhes


/* Usada em resultados.php */
function busca($conexao)
{

    // mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim busca
