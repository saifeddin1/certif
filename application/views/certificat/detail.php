<div class="cotainer p-2 card">


    <h2 class="text-capitalize text-center"><?php echo $certificat['title']; ?></h1>
    <div class="d-flex justify-content-between">
        <a href="<?php echo site_url('/'); ?>" class="btn btn-secondary">&larr; Retour</a>
    </div>


    <h4 class="text-end">Certificat effectuée  le <?php echo $certificat['dateeffectuee']; ?></h4>
    <div class="d-flex justify-content-start p-2">  
        <div class="mb-4 mx-2">
            <h4>Payeur</h4>
            <div class="card p-2" style="width:max-content;">

                <?php if(isset($user)){ ;?>
                    <h6><?php echo $user['nom'].' '.$user['prenom'].' ('.$user['usertype'].')'; ?> </h6>
                    <h6>Identifiant : <?php echo $user['cin']; ?></h6>
                <?php }else{ ;?>
                    <h6>Guest User (Freelancer)</h6>
                    <h6>Identifiant : 00000000</h6>
                <?php };?>
            </div>
        </div>

        <div class="mb-4">
            <h4>Benficiare</h4>
            <?php if(isset($benificiare)){; ?>
                <div class="card p-2" style="width:max-content;">

                    <h6><?php echo $benificiare['nom'].' '.$benificiare['prenom'].' ('.$benificiare['usertype'].')'; ?> </h6>
                    <h6>Identifiant : 
                    <?php 
                            echo (isset($benificiare['cin']) && $benificiare['cin'] !=0?
                                $benificiare['cin']
                                : $benificiare['matricule']); 
                    ?>
                    </h6>
                </div>
                <?php }else{; ?>
                       hhhhhhhhhhhhh
                <?php }; ?>
 
            
        </div>
    </div>
    <table class="table table-responsive">
        <th>RETENUE EFFECTUE SUR:</th>
        <th>Montant brut</th>
        <th>Retenue</th>
        <th>Montant net</th>
 

        <?php foreach($items as $item){ ?>
            <tr>
                <td class="d-flex justify-content-between pr-5">
                <?php echo $item['label_text'];?>
                    <div>
                        <a href="<?php echo site_url('label/edit/'.$item['id_label']); ?>" class="btn btn-warning">&#9998;</a> 
                        <a href="<?php echo site_url('label/remove/'.$item['id_label']); ?>" class="btn btn-danger">x</a>
                    </div>
                </td>
                <td>
                    <?php echo $item['montant_brut']; ?>  
                </td> 
                <td><?php echo $item['retenue'];?>
                </td> 
                <td><?php echo $item['montant_net'];?> 
                </td> 
                <td>
                <?php echo (isset($item['montant_brut']) ? 
                    "<a href='".site_url('montant_item/edit/'.$item['id_montant_items'])."'  class='btn btn-warning'>Modifier</a>" 
                    : '' );?> 
                    
                </td>
                
            </tr>
           
        <?php };?>
        <tr>
            <td>
                Total Général: 
            </td>
            <td>
                <?php echo $total_brut;?>
            </td>
            <td>
                <?php echo $total_retenue;?>
            </td>
            <td>
                <?php echo $total_net;?>
            </td>
        </tr>

    </table>
    <!-- <a href="<?php //echo site_url('label/add'); ?>" class="btn btn-outline w-25 btn-dark">Ajouter label</a> -->
             
</div>