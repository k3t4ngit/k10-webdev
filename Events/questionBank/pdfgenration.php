<?php
require_once('eng.php');
require_once('tcpdf.php');
        // $connection=mysql_connect("69.167.138.87","appbinde_kec","password@1984");
         //  mysql_select_db("appbinde_kec",$connection);
            include("../config.php") ;
        $description=$_POST['myrichtext'] ;
        $output ;
        $random_hashcode=$_GET['random_Code'] ;
        $download=$_GET['action'] ;
                 if( $download=="downloadAgain"){
                       //same problem download
                        $query=mysql_query("select * from tbl_candidate tc where TIMEDIFF(current_timestamp,tc.create_date) <= '48:00:00' and tc.hash_code='".$random_hashcode."' ") ;
                             if(mysql_num_rows($query)==1) {
			                         $data=mysql_query("select * from tbl_tracking where hash_code='".$random_hashcode."'") ;
                                                 while($problem=mysql_fetch_array($data)){
                                                          $problemId= $problem['problem_id'] ;
                                                           $problemstate=mysql_query("select * from tbl_problem where problem_id='".$problemId."'") ;
                                                      while($description=mysql_fetch_array($problemstate)){
                                                              $output=$description['description'] ;
														  }
                                                              // create new PDF document
										$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
										// set document information
										$pdf->SetCreator(PDF_CREATOR);
										$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
										// set default header data
										//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
										$pdf->setFooterData($tc=array(0,64,0), $lc=array(0,64,128));
										// set header and footer fonts
										$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
										$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
										// set default monospaced font
										$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
										//set margins
										$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
										$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
										$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
										//set auto page breaks
										$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
										//set image scale factor
										$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
										//set some language-dependent strings
										$pdf->setLanguageArray($l);
										// set default font subsetting mode
										$pdf->setFontSubsetting(true);
										// Set font
										// dejavusans is a UTF-8 Unicode font, if you only need to
										// helvetica or times to reduce file size.
										$pdf->SetFont('dejavusans', '', 10, '', true);
										// Add a page
										// This method has several options, check the source code documentation for more information.
										$pdf->AddPage();
										// set text shadow effect
										//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196),  'blend_mode'=>'Normal'));
										// Set some content to print
								$title ="<h2>AppBinder Software Private Limited</h2><br/>" ;
										// Print text using writeHTMLCell()
                                       $html="<b>Note: This file contains privileged information or information belonging to AppBinder Software Private Limited and is intended solely for registered candidate of e-recruitment process. Access to this file by anyone else is unauthorized. Any copying (whole or partial) or further distribution beyond the original candidate is not intended, and may be unlawful. If you have received this file in error, please delete the material from your computer.</b><br/><br/><b>Important instructions</b><ol><li> Please read and comprehend problem statement completely before starting working on it.
                                       </li><li>Design/Implement solution in any language (whatever you prefer), however we are more concern with solution rather completely compilable code.</li></ol><br/>" ;
                                        $problemStatment="<strong>Problem Statment</strong><br/>" ;
                                        $problem= $problemStatment;
                                      $output=$output ;
                                      $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $title, $border=0, $ln=1, $fill=0, $reseth=true, $align='C', $autopadding=true);
									  $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
                                      $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $problem, $border=0, $ln=1, $fill=0, $reseth=true, $align='C', $autopadding=false);
									  $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $output, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
										$pdf->Output("Problem_'".$random_hashcode."'.Pdf", "D");
									}
						} else{
			                header("location:../session_error.php?CURRENT_PAGE=session");
			             }

			} else{
						 //new problem download
                    $query=mysql_query("select * from tbl_candidate tc where TIMEDIFF(current_timestamp,tc.create_date) <= '48:00:00' and tc.hash_code='".$random_hashcode."' ") ;
                      if(mysql_num_rows($query)==1) {
                               $permission=mysql_query("select * from tbl_tracking where  hash_code='".$random_hashcode."' and download='YES'");
                               $count = mysql_num_rows($permission) ;
                                 if($count==1){
                                                      //show error page
										    header("location:../download_error.php?random_Code=".$random_hashcode."&CURRENT_PAGE=session");
                                   } else{
												        //insert into database and permit to download problem
                                                          while($candidateInfo=mysql_fetch_array($query)){
                                                          $tracking=mysql_query("insert into tbl_tracking(email_id,hash_code,download,submit,download_date) values('".$candidateInfo['email_id']."','".$candidateInfo['hash_code']."','YES','NO',current_timestamp)");
                                                           }
                                                          $data=mysql_query("SELECT * FROM tbl_problem ORDER BY RAND() LIMIT 0,1") ;
                                                         while($problem=mysql_fetch_array($data)){
                                                               $output= $problem['description'] ;
                                                                $problemstate=mysql_query("update tbl_tracking set problem_id='".$problem['problem_id']."' where hash_code='".$random_hashcode."'") ;
                                                          }
                                                              // create new PDF document
															$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
															// set document information
															$pdf->SetCreator(PDF_CREATOR);
															$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
															// set default header data
															//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
															$pdf->setFooterData($tc=array(0,64,0), $lc=array(0,64,128));
															// set header and footer fonts
															$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
															$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
															// set default monospaced font
															$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
															//set margins
															$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
															$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
															$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
															//set auto page breaks
															$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
															//set image scale factor
															$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
															//set some language-dependent strings
															$pdf->setLanguageArray($l);
															// set default font subsetting mode
															$pdf->setFontSubsetting(true);
															// Set font
															// dejavusans is a UTF-8 Unicode font, if you only need to
															// helvetica or times to reduce file size.
															$pdf->SetFont('dejavusans', '', 10, '', true);
															// Add a page
															// This method has several options, check the source code documentation for more information.
															$pdf->AddPage();
															// set text shadow effect
															//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196),  'blend_mode'=>'Normal'));
															// Set some content to print
														$title ="<h2>AppBinder Software Private Limited</h2><br/>" ;
										// Print text using writeHTMLCell()
                                       $html="<b>Note: This file contains privileged information or information belonging to AppBinder Software Private Limited and is intended solely for registered candidate of e-recruitment process. Access to this file by anyone else is unauthorized. Any copying (whole or partial) or further distribution beyond the original candidate is not intended, and may be unlawful. If you have received this file in error, please delete the material from your computer.</b><br/><br/><b>Important instructions</b><ol><li> Please read and comprehend problem statement completely before starting working on it.
                                       </li><li>Design/Implement solution in any language (whatever you prefer), however we are more concern with solution rather completely compilable code.</li></ol><br/>" ;
                                        $problemStatment="<strong>Problem Statment</strong><br/>" ;
                                        $problem= $problemStatment;
                                      $output=$output ;
                                      $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $title, $border=0, $ln=1, $fill=0, $reseth=true, $align='C', $autopadding=true);
									  $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
                                      $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $problem, $border=0, $ln=1, $fill=0, $reseth=true, $align='C', $autopadding=false);
									  $pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $output, $border=0, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);
									$pdf->Output("Problem_'".$random_hashcode."'.Pdf", "D");
									}	                                        
             }else{
			header("location:../session_error.php?CURRENT_PAGE=session");
			}
			  }
?>
