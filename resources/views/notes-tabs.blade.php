<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Weapons</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Spells</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Notes</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
    </div>
    <div class="tab-pane fade p-1" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <?php 
                    foreach($classes as $index => $class): ?>
                    <p><?= $class->Class ?> Spell Casting Modifier: 
                    <strong>
                    <?php
                        $mod = $class->spell_mod;
                        echo floor(($ability_score[0]->$mod-10)/2)+$proficiency;
                    ?></strong></p>
                        
                <?php endforeach; ?>

        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Name</th>
                    <th class="text-center">Time</th>
                    <th class="text-center">Range</th>
                    <th class="text-center">Hit/DC</th>
                    <th class="text-center">Base Effect</th>
                    <th class="text-center" data-bs-toggle="tooltip" data-bs-placement="top" title="Increment per Level">Increment</th>
                    <th class="text-center">Notes</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($character_spells as $index =>$character_spell): ?>
                    <tr>
                        <td class="text-center" ><?= $character_spell->Name ?></td>
                        <td class="text-center"><?= $character_spell->Time ?></td>
                        <td class="text-center"><?= $character_spell->Range ?></td>
                        <td class="text-center"><?php
                        
                        $mod = $character_spell->Hit_DC_mod;
                        if($mod == "--" || $mod == ""){
                          echo "--";
                        }
                        else{
                          echo substr($mod,0,3).' '.floor(($ability_score[0]->$mod-10)/2)+$proficiency+8;
                        }
                        

                        ?></td>
                        <td class="text-center"><?php
                        $mod = $character_spell->spell_mod;
                            if($character_spell->has_dice == 1){
                                echo $character_spell->Effect."+".floor(($ability_score[0]->$mod-10)/2)+$proficiency;
                            }else{
                                echo $character_spell->Effect;
                            }
                        ?></td>
                        <td class="text-center"><?= $character_spell->increment ?></td>
                        <td class="text-center"><?= $character_spell->Notes ?></td>
                    </tr>
                        
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>