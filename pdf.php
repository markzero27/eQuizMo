<?php 

require('fpdf/fpdf.php');
include "crud-operation.php";

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        // Logo
        // $this->Image('img/qmark.jpg',10,6,30);
        // Arial bold 15
        // $this->SetFont('Arial','B',15);
        // // Move to the right
        // $this->Cell(80);
        // // Title
        // $this->Cell(30,10,'TRIMEX Colleges',0,1,'C');
        // $this->Cell(80);
        // $this->SetFont('Arial','',10);
        // $this->Cell(30,10,'Quiz Results',0,1,'C');

        // // Line break
        // $this->Ln(10);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();

$pdf->Image('img/anniv.png',53,-10,100);
$pdf->SetFont("Helvetica","B",12);
$pdf->SetTextColor(50,50,50);

$pdf->Cell(190,20,"",0,1,"C");
$pdf->Cell(190,10,"Quiz Bee 2019",0,1,"C");
$pdf->SetFont("Helvetica","B",10);
$pdf->SetTextColor(233,251,223);
$pdf->SetFillColor(20,31,53);
$pdf->Cell(0,10,"Results",1,1,"C",true);

$pdf->SetFont("Arial","B",10);
$pdf->SetFillColor(40,51,73);
$pdf->SetTextColor(233,251,223);
$pdf->Cell(15,10,"Rank",1,0,"C",true);
$pdf->Cell(60,10,"School Name",1,0,"C",true);
$pdf->Cell(23,10,"Easy",1,0,"C",true);
$pdf->Cell(23,10,"Average",1,0,"C",true);
$pdf->Cell(23,10,"Hard",1,0,"C",true);
$pdf->Cell(23,10,"Total Score",1,0,"C",true);
$pdf->Cell(23,10,"Tie-breaker",1,1,"C",true);

$pdf->SetFont("Arial","",10);
$pdf->SetTextColor(0,0,0);

if(isset($_GET['game_id'])){
    $game_id = $_GET['game_id'];
}else{

    $game_set= $obj->fetch_record('game_set');
    $last_id=end($game_set);
    $game_id=$last_id['game_id'];
}
$x=1;
$sql = "SELECT team, rank, SUM(score) as total FROM points_table WHERE game_id = '".$game_id."' AND type != 'Tie-breaker' GROUP BY team ORDER BY rank ASC";
$score = mysqli_query($obj->con,$sql);
$num = mysqli_num_rows($score);
$pageCounter = 0;
while($row = mysqli_fetch_assoc($score))
{   
   
    $easy_score = 0;
    $ave_score = 0;
    $hd_score = 0;
    $tb_score = 0;

    $e_query = $obj->select_record_not('points_table',array('game_id'=>$game_id,'difficulty'=>'Easy','team'=>$row['team']),array('type'=>'Tie-breaker'));
    foreach($e_query as $e_score){
        $easy_score += $e_score['score'];
    }
    
    $a_query = $obj->select_record_not('points_table',array('game_id'=>$game_id,'difficulty'=>'Average','team'=>$row['team']),array('type'=>'Tie-breaker'));
    foreach($a_query as $a_score){
        $ave_score += $a_score['score'];
    }
    
    $h_query = $obj->select_record_not('points_table',array('game_id'=>$game_id,'difficulty'=>'Hard','team'=>$row['team']),array('type'=>'Tie-breaker'));
    foreach($h_query as $h_score){
        $hd_score += $h_score['score'];
    }

    $tb_query = $obj->select_record('points_table',array('game_id'=>$game_id,'difficulty'=>'Hard','team'=>$row['team'],'type'=>'Tie-breaker'));
   if(count($tb_query)>0){
    foreach($tb_query as $t_score){
        $tb_score += $t_score['tbscore'];
    }
   }else{
       $tb_score = "-";
   }
    
    $stud_query = mysqli_query($obj->con,'SELECT * FROM account_table WHERE team_name = "'.$row['team'].'"');
    $studs = mysqli_fetch_assoc($stud_query);
    $pdf->SetAutoPageBreak('true');
    $pdf->SetFont("Arial","B",10);

    $pdf->Cell(15,10,'','LTR',0,"C");
    $pdf->Cell(60,10,$studs['school'],1,0,"C");
    $pdf->Cell(23,10,'','LTR',0,"C");
    $pdf->Cell(23,10,'','LTR',0,"C");
    $pdf->Cell(23,10,'','LTR',0,"C");
    $pdf->Cell(23,10,'','LTR',0,"C");
    $pdf->Cell(23,10,'','LTR',1,"C");

    $pdf->Cell(15,10,'','LR',0,"C");
    $pdf->SetFont("Arial","",10);
    $pdf->Cell(60,10,$studs['student_1'],'LR',0,"C");
    $pdf->SetFont("Arial","",15);
    $pdf->Cell(23,10,'','LR',0,"C");
    $pdf->Cell(23,10,'','LR',0,"C");
    $pdf->Cell(23,10,'','LR',0,"C");
    $pdf->Cell(23,10,'','LR',0,"C");
    $pdf->Cell(23,10,'','LR',1,"C");

    $pdf->Cell(15,10,$row['rank'],'LR',0,"C");
    $pdf->SetFont("Arial","",10);
    $pdf->Cell(60,10,$studs['student_2'],'LR',0,"C");
    $pdf->SetFont("Arial","",15);
    $pdf->Cell(23,10,$easy_score,'LR',0,"C");
    $pdf->Cell(23,10,$ave_score,'LR',0,"C");
    $pdf->Cell(23,10,$hd_score,'LR',0,"C");
    $pdf->Cell(23,10,$row['total'],'LR',0,"C");
    $pdf->Cell(23,10,$tb_score,'LR',1,"C");
    
    $pdf->Cell(15,10,'','LBR',0,"C");
    $pdf->SetFont("Arial","",10);
    $pdf->Cell(60,10,$studs['student_3'],'LBR',0,"C");
    $pdf->SetFont("Arial","",15);
    $pdf->Cell(23,10,'','LBR',0,"C");
    $pdf->Cell(23,10,'','LBR',0,"C");
    $pdf->Cell(23,10,'','LBR',0,"C");
    $pdf->Cell(23,10,'','LBR',0,"C");
    $pdf->Cell(23,10,'','LBR',1,"C");
    

    $pdf->SetFont("Arial","",10);
    if(($pageCounter-4)%6==0 && $pageCounter<5 ){
        $pdf->addPage();
    }$pageCounter++;
    

}

$pdf->output('I','Quiz-Bee Result.pdf');

?>
