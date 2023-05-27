<?php

interface IAluno {
    /** Retorna uma lista com Nome, nota final e média de cada aluno */
    public function listarResultado(array $alunos): array;
    
    /** Calcula a média geral da turma */
    public function calcularMediaGeral(array $alunos): float;
    
    /** Retorna o número de alunos abaixo da média */
    public function obterNumeroAlunosAbaixoMedia(array $alunos): int;
    
    /** Retorna o número de alunos acima da média */
    public function obterNumeroAlunosAcimaMedia(array $alunos): int;
}

class Aluno implements IAluno {
    public function listarResultado(array $alunos): array {
        $resultados = [];
        
        foreach ($alunos as $aluno) {
            $nome = $aluno[0];
            $notaFinal = array_sum(array_slice($aluno, 1));
            $media = $notaFinal / count($aluno) - 1;
            
            $resultados[] = [
                'Nome' => $nome,
                'Nota Final' => $notaFinal,
                'Média' => $media
            ];
        }
        
        return $resultados;
    }
    
    public function calcularMediaGeral(array $alunos): float {
        $notasFinais = [];
        
        foreach ($alunos as $aluno) {
            $notaFinal = array_sum(array_slice($aluno, 1));
            $notasFinais[] = $notaFinal;
        }
        
        $mediaGeral = array_sum($notasFinais) / count($notasFinais);
        return $mediaGeral;
    }
    
    public function obterNumeroAlunosAbaixoMedia(array $alunos): int {
        $mediaGeral = $this->calcularMediaGeral($alunos);
        $numAlunosAbaixoMedia = 0;
        
        foreach ($alunos as $aluno) {
            $notaFinal = array_sum(array_slice($aluno, 1));
            
            if ($notaFinal < $mediaGeral) {
                $numAlunosAbaixoMedia++;
            }
        }
        
        return $numAlunosAbaixoMedia;
    }
    
    public function obterNumeroAlunosAcimaMedia(array $alunos): int {
        $mediaGeral = $this->calcularMediaGeral($alunos);
        $numAlunosAcimaMedia = 0;
        
        foreach ($alunos as $aluno) {
            $notaFinal = array_sum(array_slice($aluno, 1));
            
            if ($notaFinal >= $mediaGeral) {
                $numAlunosAcimaMedia++;
            }
        }
        
        return $numAlunosAcimaMedia;
    }
}

class AlunoController {
  public function printarDadosAlunos(array $alunos) {
      $aluno = new Aluno();
      $resultados = $aluno->listarResultado($alunos);
      $mediaGeral = $aluno->calcularMediaGeral($alunos);
      $numAlunosAbaixoMedia = $aluno->obterNumeroAlunosAbaixoMedia($alunos);
      $numAlunosAcimaMedia = $aluno->obterNumeroAlunosAcimaMedia($alunos);
      
      foreach ($resultados as $resultado) {
          echo "Nome: " . $resultado['Nome'] . ", Nota Final: " . $resultado['Nota Final'] . ", Média: " . $resultado['Média'] . "<br>";
      }
      
      echo "<br>Média Geral da Turma: " . $mediaGeral . "<br>";
      echo "Alunos abaixo da média geral: " . $numAlunosAbaixoMedia . "<br>";
      echo "Alunos igual ou acima da média geral: " . $numAlunosAcimaMedia . "<br>";
  }
}

$alunos = [
  ['Ana', 9, 7, 3],
  ['Pedro', 4, 8, 7],
  ['João', 6, 4, 5],
  ['Vitor', 8, 7, 6],
  ['Beatriz', 2, 4, 6],
  ['Camila', 7, 0, 5]
];

$alunoController = new AlunoController();
$alunoController->printarDadosAlunos($alunos);
?>
