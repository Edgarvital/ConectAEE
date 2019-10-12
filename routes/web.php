<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('layouts.principal');
});

Auth::routes();

Route::middleware('autorizacao')->group(function() {

  Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
  Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

  //Rotas para notificacao
  Route::get('/usuario/notificacao/listar', 'NotificacaoController@listar')->name('notificacao.listar');
  Route::get('/usuario/notificacao/{id_notificacao}/ler', 'NotificacaoController@ler')->name('notificacao.ler');

  //Rotas para usuario
  Route::get('/usuario/completarCadastro', 'UsuarioController@completarCadastro')->name('usuario.completarCadastro');
  Route::post('/usuario/completar', 'UsuarioController@completar')->name('usuario.completar');
  //novas
  Route::get('/usuario/editar', 'UsuarioController@editar')->name('usuario.editar');
  Route::post('/usuario/atualizar', 'UsuarioController@atualizar')->name('usuario.atualizar');
  Route::get('/usuario/editarSenha', 'UsuarioController@editarSenha')->name('usuario.editarSenha');
  Route::post('/usuario/atualizarSenha', 'UsuarioController@atualizarSenha')->name('usuario.atualizarSenha');

  //Rotas para alunos
  Route::get('/aluno/cadastrar', 'AlunoController@cadastrar')->name('aluno.cadastrar');
  Route::post('/aluno/criar', 'AlunoController@criar')->name('aluno.criar');
  Route::get('/aluno/listar', 'AlunoController@listar')->name('aluno.listar');
  Route::get('/aluno/buscar', 'AlunoController@buscar')->name('aluno.buscar');
  Route::get('/aluno/buscarMatricula', 'AlunoController@buscarMatricula')->name('aluno.buscarMatricula');
  Route::get('/aluno/buscarAluno', 'AlunoController@buscarAluno')->name('aluno.buscarAluno');
  Route::get('/aluno/{id_aluno}/gerenciar', 'AlunoController@gerenciar')->name('aluno.gerenciar');
  //novaa
  Route::get('/aluno/{id_aluno}/editar', 'AlunoController@editar')->name('aluno.editar');
  Route::get('/aluno/{id_aluno}/excluir', 'AlunoController@excluir')->name('aluno.excluir');
  Route::post('/aluno/atualizar', 'AlunoController@atualizar')->name('aluno.atualizar');

  //Permissões
  Route::get('/aluno/{id_aluno}/gerenciar/permissoes','AlunoController@gerenciarPermissoes')->name('aluno.permissoes');
  Route::get('/aluno/{id_aluno}/gerenciar/permissoes/cadastrar','AlunoController@cadastrarPermissao')->name('aluno.permissoes.cadastrar');
  Route::post('/aluno/gerenciar/permissoes/criar','AlunoController@criarPermissao')->name('aluno.permissoes.criar');
  Route::get('/aluno/gerenciar/permissoes/{id_permissao}/remover','AlunoController@removerPermissao')->name('aluno.permissoes.remover');
  Route::get('/aluno/{matricula}/gerenciar/permissoes/requisitar', 'AlunoController@requisitarPermissao')->name('aluno.permissoes.requisitar');
  Route::get('/aluno/{id_aluno}/gerenciar/permissoes/notificacao/{id_notificacao}/conceder', 'AlunoController@concederPermissao')->name('aluno.permissoes.conceder');
  Route::post('/aluno/gerenciar/permissoes/notificar','AlunoController@notificarPermissao')->name('aluno.permissoes.notificar');
  Route::get('/aluno/{id_aluno}/gerenciar/permissoes/{id_permissao}/editar','AlunoController@editarPermissao')->name('aluno.permissoes.editar');
  Route::post('/aluno/gerenciar/permissoes/atualizar','AlunoController@atualizarPermissao')->name('aluno.permissoes.atualizar');

  //Rotas para objetivos
  Route::get('/aluno/{id_aluno}/objetivos/cadastrar','ObjetivoController@cadastrar')->name('objetivo.cadastrar');
  Route::post('/aluno/objetivos/criar', 'ObjetivoController@criar')->name('objetivo.criar');
  Route::get('/aluno/{id_aluno}/objetivos/listar','ObjetivoController@listar')->name('objetivo.listar');
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar','ObjetivoController@gerenciar')->name('objetivo.gerenciar');
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar/finalizar','ObjetivoController@concluir')->name('objetivo.concluir');
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar/reabrir','ObjetivoController@desconcluir')->name('objetivo.desconcluir');
  //novas
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar/editar','ObjetivoController@editar')->name('objetivo.editar');
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar/excluir','ObjetivoController@excluir')->name('objetivo.excluir');
  Route::post('/aluno/objetivo/atualizar', 'ObjetivoController@atualizar')->name('objetivo.atualizar');
  Route::get('/aluno/objetivo/buscar', 'ObjetivoController@buscar')->name('objetivo.buscar');

  //Rotas para atividade
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar/atividades/listar','AtividadeController@listar')->name('atividades.listar');
  Route::post('/aluno/objetivos/gerenciar/atividades/criar', 'AtividadeController@criar')->name('atividades.criar');
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar/atividades/cadastrar','AtividadeController@cadastrar')->name('atividades.cadastrar');
  Route::get('/aluno/objetivo/gerenciar/atividade/{id_atividade}/finalizar','AtividadeController@concluir')->name('atividade.concluir');
  Route::get('/aluno/objetivo/gerenciar/atividade/{id_atividade}/reabrir','AtividadeController@desconcluir')->name('atividade.desconcluir');
  //novas
  Route::get('/aluno/objetivo/gerenciar/atividade/{id_atividade}/ver','AtividadeController@ver')->name('atividade.ver');
  Route::get('/aluno/objetivo/gerenciar/atividade/{id_atividade}/editar','AtividadeController@editar')->name('atividade.editar');
  Route::get('/aluno/objetivo/gerenciar/atividade/{id_atividade}/excluir','AtividadeController@excluir')->name('atividade.excluir');
  Route::post('/aluno/atividade/atualizar', 'AtividadeController@atualizar')->name('atividade.atualizar');
  // Route::get('/aluno/atividade/buscar', 'AtividadeController@buscar')->name('atividade.buscar');

  //Rotas para sugestão
  Route::post('/aluno/objetivo/gerenciar/sugestoes/criar', 'SugestaoController@criar')->name('sugestoes.criar');
  Route::get('/aluno/objetivo/{id_objetivo}/gerenciar/sugestoes/cadastrar','SugestaoController@cadastrar')->name('sugestoes.cadastrar');
  //novas
  Route::get('/aluno/objetivo/gerenciar/sugestao/{id_sugestao}/ver','SugestaoController@ver')->name('sugestao.ver');
  Route::get('/aluno/objetivo/gerenciar/sugestao/{id_sugestao}/editar','SugestaoController@editar')->name('sugestao.editar');
  Route::get('/aluno/objetivo/gerenciar/sugestao/{id_sugestao}/excluir','SugestaoController@excluir')->name('sugestao.excluir');
  Route::post('/aluno/sugestao/atualizar', 'SugestaoController@atualizar')->name('objetivo.sugestao.atualizar');

  //Rotas para feedback
  Route::post('/aluno/objetivo/gerenciar/sugestao/feedbacks/criar','FeedbackController@criar')->name('feedbacks.criar');
  //novas
  Route::get('/aluno/objetivo/gerenciar/sugestao/feedback/{id_feedback}/excluir','FeedbackController@excluir')->name('feedback.excluir');
  Route::post('/aluno/feedbacks/atualizar', 'FeedbackController@atualizar')->name('feedback.atualizar');

  //Rotas para foruns
  Route::post('/aluno/forum/mensagem/enviar','ForumController@enviarMensagemForumAluno')->name('aluno.forum.mensagem.enviar');
  Route::get('/aluno/{id_aluno}/forum','ForumController@abrirForumAluno')->name('aluno.forum');
  Route::post('/aluno/objetivo/forum/mensagem/enviar','ForumController@enviarMensagemForumObjetivo')->name('objetivo.forum.mensagem.enviar');
  Route::get('/aluno/objetivo/{id_objetivo}/forum','ForumController@abrirForumObjetivo')->name('objetivo.forum');

  //rotas para statuses
  Route::post('/aluno/objetivo/status/atualizar', 'StatusController@atualizar')->name('objetivo.status.atualizar');

  //Rotas para albuns //novas
  Route::get('/aluno/{id_aluno}/albuns/listar', 'AlbumController@listar')->name('album.listar');
  Route::get('/aluno/albuns/{id_album}/ver', 'AlbumController@ver')->name('album.ver');
  Route::get('/aluno/albuns/{id_album}/editar', 'AlbumController@editar')->name('album.editar');
  Route::get('/aluno/albuns/{id_album}/excluir', 'AlbumController@excluirAlbum')->name('album.excluir');
  Route::post('/aluno/albuns/fotos/excluir', 'AlbumController@excluirFotos')->name('album.fotos.excluir');
  Route::get('/aluno/{id_aluno}/albuns/cadastrar', 'AlbumController@cadastrar')->name('album.cadastrar');
  Route::post('/aluno/albuns/criar', 'AlbumController@criar')->name('album.criar');
  Route::post('/aluno/albuns/atualizar', 'AlbumController@atualizar')->name('album.atualizar');

  //Instituição
  Route::get('/instituicao/cadastrar', 'InstituicaoController@cadastrar')->name('instituicao.cadastrar');
  Route::post('/instituicao/criar', 'InstituicaoController@criar')->name('instituicao.criar');
  //novas
  Route::get('/instituicao/listar', 'InstituicaoController@listar')->name('instituicao.listar');
  Route::get('/instituicao/{id_instituicao}/ver', 'InstituicaoController@ver')->name('instituicao.ver');
  Route::get('/instituicao/{id_instituicao}/editar', 'InstituicaoController@editar')->name('instituicao.editar');
  Route::get('/instituicao/{id_instituicao}/excluir', 'InstituicaoController@excluir')->name('instituicao.excluir');
  Route::post('/instituicao/atualizar', 'InstituicaoController@atualizar')->name('instituicao.atualizar');
  Route::get('/instituicao/buscar', 'InstituicaoController@buscar')->name('instituicao.buscar');

});
