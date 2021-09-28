<?php 




tcpdf();
$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$obj_pdf->SetCreator("DIGIXIS");
$title = "CERTIFICAT DE RETENUE D'IMPOT SUR LE REVENU OU D'IMPOT SUR LES SOCIETES";
$obj_pdf->SetTitle($title);
// remove default header/footer
$obj_pdf->setPrintHeader(false);
$obj_pdf->setPrintFooter(false);
 
$obj_pdf->SetDefaultMonospacedFont('helvetica');
$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_RIGHT);
$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$obj_pdf->SetFont('helvetica', '', 9);
$obj_pdf->setFontSubsetting(false);
$obj_pdf->AddPage();
$left = "REPUBLIQUE tUNISIENNE MINISTERE DU PLAN ET DES FINANCES DIRECTION GENERALE DU CONTROLE FISCAL";
$obj_pdf->MultiCell(55, 10, $left, 0, 'C', 0, 0, '', '', true);
$obj_pdf->MultiCell(55, 10, '', 0, 'C', 0, 0, '', '', true);
$obj_pdf->MultiCell(85, 10, $title, 0, 'C', 0,1, '', '', true);

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)


ob_start();
    // we can have any view part here like HTML, PHP etc
     

  
    $content = '
    <style>
      
    </style>
    <br> 
    <div style="text-align:right;"> 
        Retenue effectué '.($certificat['dateeffectuee'] != '0000-00-00' ? ' le '.$certificat['dateeffectuee']: 'pendant '.$certificat['periode']).'
    </div>
 
    <div>

    <h2>&nbsp;&nbsp;A- PERSONNE OU ORGNISME PAYEUR: </h2>

    <h4 style="text-align:center;">IDENTIFIANT</h4>

    <table align="center">
        <tr> 
            <td width="50"></td>
            <td width="60">
                <table border="1" style="width:90%;">

                    <tr>
                        <td width="110" height="15">
                            Matricule Fiscal (Ou CIN)
                        </td>
                        <td width="110" height="15">
                            Code T.V.A
                        </td>
                        <td width="110" height="15">
                            Code catégorie
                        </td>
                        <td width="110" height="15">
                            N°Etab Secondaire
                        </td>
                    </tr>
                    
                    <tr>
                        <td width="110" height="15">
                            '.$user[($user['cin']?'cin':'matricule')].'
                        </td>
                        <td width="110" height="15">
                            '.$user['cod_tva'].'
                        </td>
                        <td width="110" height="15">
                            '.$user['cod_category'].'
                        </td>
                        <td width="110" height="15">
                            '.$user['num_etab_sec'].'
                        </td>
                    </tr>

                </table>
            </td>
     
        </tr>
    </table>
    
    <br>
    <p>&nbsp;&nbsp;Denomination de la personne ou de l\'organisme payeur :
     <b>'.$user['nom'].' '.$user['prenom'].'</b>
     </p> 
     <p>&nbsp;&nbsp;Addresse:
     <b>'.$user['adress'].'</b>
     </p>
   <table border="1">
        <thead>
            <tr> 
                <th width="300" height="30"><h2>&nbsp;B- RETENUES EFFECTUEES SUR : </h2></th>
                <th width="70" align="center">Montant brut</th>
                <th width="70" align="center">Retenue</th>
                <th width="70" align="center">Montant net</th>
            </tr>
        </thead>
    
    <tbody>';
    
    foreach($items as $item){

        $content .= '<tr><td width="300" height="15">&nbsp;&nbsp;'.$item['label_text'].'</td>';
        $content .= '<td width="70" align="center">'.$item['montant_brut'].'</td>';
        $content .= '<td width="70" align="center">'.$item['retenue'].'</td>';
        $content .= '<td width="70" align="center">'.$item['montant_net'].'</td></tr>';
    };
 

    $content .= ' 
        <tr>
            <td height="15" align="right">
                Total Général: 
                &nbsp;&nbsp;
            </td>
            <td align="center">
                '.$total_brut.'
            </td>
            <td align="center">
                '.$total_retenue.'
            </td>
            <td align="center">
                '.$total_net.'
            </td>
        </tr> 
    </tbody>
    </table>

 

    <h2>&nbsp;C - BENIFICIARE</h2>

    
    <table> 
        <tr>
            <td height="15">
                N° CIN ( ou de séjour pour les etrangers ) : 
            </td>
            <td style="border:1px solid #000;height:10px;"><span>'.$benificiare['cin'].'</span> </td>
            <td> </td> 
        </tr>
    </table>
    <br> 
    <h4 style="text-align:center;">IDENTIFIANT</h4>
    
    <table align="center">
        <tr> 
            <td width="50"></td>
            <td width="60">
                <table border="1" style="width:90%;">

                    <tr>
                        <td width="110" height="15">
                            Matricule Fiscal 
                        </td>
                        <td width="110" height="15">
                            Code T.V.A
                        </td>
                        <td width="110" height="15">
                            Code catégorie
                        </td>
                        <td width="110" height="15">
                            N°Etab Secondaire
                        </td>
                    </tr>
                    
                    <tr>
                        <td width="110" height="15">
                            '.$benificiare['matricule'].'
                        </td>
                        <td width="110" height="15">
                            '.$benificiare['cod_tva'].'
                        </td>
                        <td width="110" height="15">
                            '.$benificiare['cod_category'].'
                        </td>
                        <td width="110" height="15">
                            '.$benificiare['num_etab_sec'].'
                        </td>
                    </tr>

                </table>
            </td>
     
        </tr>
    </table>
    
    <br>
    <p>&nbsp;&nbsp;Nom, prénom ou raison sociale :
        <b>'.$benificiare['nom'].' '.$benificiare['prenom'].'</b>
    </p>
 
    <p>&nbsp;&nbsp;Addresse professionelle:
        <b>'.$benificiare['adress'].'</b>
    </p>
  
    <p>&nbsp;&nbsp;Addresse de residence:
        <b>'.$benificiare['adress'].'</b>
    </p>
  <br>  <br>
    <div style="text-align:right"> 
        Je soussigné, certifie exacts les renseignements figurant sur le présent<br>
        certificat et m\'expose aux sanctions par la loi pour toute inexactude<br><br>
        &nbsp;&nbsp;&nbsp;&nbsp; A _____________________ le ______________________ <br><br>
        cachet et signature du payeur
    </div>
    
 
    </div>';



ob_end_clean();
$obj_pdf->writeHTML($content, true, false, true, false, '');
$obj_pdf->Output('retenue.pdf', 'I');