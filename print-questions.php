<?php 

require('fpdf/fpdf.php');
require('fpdf/wordwrap/wordwrap.php');
//require('fpdf/html2pdf/html2pdf.php');
include "crud-operation.php";


$pdf = new PDF();

$pdf->AddPage();
$pageCounter = 0;

$pdf->Image('img/anniv.png',53,-10,100);
$pdf->SetFont("Helvetica","B",12);
$pdf->SetTextColor(50,50,50);

$pdf->Cell(190,20,"",0,1,"C");
$pdf->Cell(190,10,"Quiz Bee 2019",0,1,"C");
$pdf->SetFont("Helvetica","B",10);


for($i=0;$i<3;$i++){
    switch($i){
        case 0: $diff = 'Easy';
                $difficulty = 'Easy';
                
        break;
        case 1: $diff = 'Average';
                $difficulty = 'Average';
        break;
        case 2: $diff = 'Hard';
                $difficulty = 'Difficult';
        break;
    }
    
    
    $pdf->Cell(0,10,$difficulty." Questions",0,1,"C");

    $categoryQuery = $obj->fetch_record('category_table');
    foreach($categoryQuery as $row){
        $pdf->WriteHTML("<br><b>".$row['category']."</b>");
        $questionQuery = $obj->select_record('question_table',array('difficulty'=>$diff,'category'=>$row['category']));
        if(count($questionQuery)==0)$pdf->WriteHTML("<br>No Questions in this catergory for ".$difficulty." quesions");
        foreach($questionQuery as $print){
            
            $question = $print['question'];
            $pdf->WordWrap($question,180);
    
            $pdf->SetFont("Arial","",10);
            $pdf->WriteHTML("<br>".$print['q_sequence'].". ".$question."<br>");
            $pdf->WriteHTML("A. ".$print['option1']."<br>");
            $pdf->WriteHTML("B. ".$print['option2']."<br>");
            $pdf->WriteHTML("C. ".$print['option3']."<br>");
            $pdf->WriteHTML("D. ".$print['option4']."<br>");
            $pdf->SetFont("Arial","i",10);
            $pdf->WriteHTML("Answer: ".$print['answer']."<br>");
    
          
        }
    }
    $pdf->SetFont("Arial","B",10);
    $pdf->addPage();
}


$pdf->WriteHTML("<br><br><b>Sample Questions</b> <br>");
$questionQuery = $obj->select_record('question_table',array('difficulty'=>'Easy','category'=>'Sample Questions'));

foreach($questionQuery as $print){
    
    $question = $print['question'];
    $pdf->WordWrap($question,180);

    $pdf->SetFont("Arial","",10);
    $pdf->WriteHTML("<br>".$question."<br>");
    $pdf->WriteHTML("A. ".$print['option1']."<br>");
    $pdf->WriteHTML("B. ".$print['option2']."<br>");
    $pdf->WriteHTML("C. ".$print['option3']."<br>");
    $pdf->WriteHTML("D. ".$print['option4']."<br>");
    $pdf->SetFont("Arial","i",10);
    $pdf->WriteHTML("Answer: ".$print['answer']."<br>");
    
}



$pdf->output('I','Quiz-Bee Questionaires.pdf');
?>
