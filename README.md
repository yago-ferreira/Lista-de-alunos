# Lista-de-alunos
O sistema de avaliação de uma determinada disciplina obedece aos seguintes critérios: durante todo o semestre são dadas três provas; A nota final é obtida pela soma das três notas. Utilizando PHP, crie uma classe model chamada “Aluno”, que implemente a interface “IAluno” (definida abaixo). Em seguida, crie uma classe controller chamada “AlunoController”, que recebe uma lista de alunos com suas respectivas notas (definida abaixo) e invoque os métodos da classe “Aluno”. O objetivo da classe “AlunoController” é printar em tela os dados abaixo:

- Nome, nota final e média de cada aluno.

- A média geral da turma.

- A quantidade de alunos que obtiveram nota abaixo da média geral da turma.

- A quantidade de alunos que obtiveram nota maior ou igual a média geral da turma.

interface IAluno {

/** Retorna uma lista com Nome, nota final e média de cada aluno */

public function listarResultado( array $alunos ) : array;

/** Calcula a média geral da turma */

public function calcularMediaGeral( array $alunos ) : float;

/** Retorna o número de alunos abaixo da média */

public function obterNumeroAlunosAbaixoMedia( array $alunos ) : int;

/** Retorna o número de alunos acima da média */

public function obterNumeroAlunosAcimaMedia( array $alunos ) : int;

}

/** lista de alunos e suas notas */

$alunos = [

[ ‘Ana’, 9, 7, 3 ],

[ ‘Pedro’, 4, 8, 7 ],

[ ‘João’, 6, 4, 5 ],

[ ‘Vitor’, 8, 7, 6 ],

[ ‘Beatriz’, 2, 4, 6 ],

[ ‘Camila’, 7, 0, 5 ],

];
