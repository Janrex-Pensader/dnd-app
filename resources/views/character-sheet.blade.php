<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Laravel</title>

         <!-- CDN -->
         <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-thin.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-solid.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-regular.css">
        <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-light.css" >

        <!-- Styles -->
        <style>
            #heal_btn, #damage_btn, #hp_input{
                width: -webkit-fill-available
            }
            .ml-10{
                margin-left: 10px !important;
            }
            .mr-10{
                margin-right: 10px !important;
            }

        </style>

    </head>
    <body class="antialiased">
        <!-- character details -->
        <div class="container mb-5">
            <!--  -->
            <div class="row mt-5">
                <!-- character information -->
                <div class="card col-8">
                    <div class="row p-0">
                        <div class="col m-2 p-0">
                            <div class="row">
                                <div class="col-1 col-md m-0 ">
                                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" width="150" class="" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-sm-6 col-md-3 m-2 my-auto">
                            <div class="row my-2">
                                <div class="col">
                                    Name: <?= $character[0]->Character_Name; ?>
                                </div>
                                <div class="col">
                                    Race: <?= $character[0]->race_text; ?>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    Level: <?= $level ?>
                                </div>
                                <div class="col">
                                    Class:
                                    <?php
                                        foreach($classes as $class){
                                            echo $class->Class.' ';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    Gender: <?= $character[0]->gender_text; ?>
                                </div>
                                <div class="col">
                                    Background: <?= $character[0]->background_text; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col m-0 px-0 ml-10">
                    <button id="long_rest" class="btn btn-info btn-sm p-2 w-100" type="button"><i class="fas fa-user-cog me-1"></i> Update</button><br>
                    <button id="short_rest" class="btn btn-success btn-sm p-2 my-1 w-100" type="button"><i class="fa-sharp fa-light fa-campfire me-1"></i> Short Rest</button> <br>
                    <button id="long_rest" class="btn btn-primary btn-sm p-2 w-100" type="button"><i class="fa-sharp fa-regular fa-campground me-1"></i> Long Rest</button><br>
                    <span class="p-2">Inspiration</span>
                </div>
                <!-- Health points -->
                <div class="card col ml-10">
                    <div class="row mt-2">
                        <span class="h1 text-center my-auto"><?= $character[0]->Current_HP; ?>/<?= $character[0]->Total_HP; ?></span>
                    </div>
                    <div class="row mt-2">
                        <button id="heal_btn" class="btn btn-success btn-sm" type="button"><i class="fa-sharp fa-solid fa-plus"></i> Heal</button>
                        <input id="hp_input" type="number" class="my-1"></input>
                        <button id="damage_btn" class="btn btn-danger btn-sm" type="button"><i class="fa-sharp fa-solid fa-minus"></i> Damage</button>
                    </div>
                </div>
            </div>
            <!-- row 2 -->
            <div class="row mt-2">
                <!-- modifier -->
                <div class="col-8">
                    <div class="row">
                        <?php 
                            foreach($mods as $index => $mod): ?>
                                <div class="col p-0 mr-10">
                                    <div class="card">
                                        <div class="card-header p-1 text-center">
                                            <?= $mod?>
                                        </div>
                                        <div class="card-body p-2 text-center">
                                            <h3>+<?=(int) floor(($ability_score[0]->$mod-10)/2)?></h3>
                                        </div>
                                        <div class="card-footer p-1 text-center">
                                            <?= $ability_score[0]-> $mod?>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- Passives -->
                <div class="col card py-1 px-auto">
                    <div class="row m-1">
                        <div class="col border text-center p-0">
                            <span class="h4 px-2"><?= $passive_perception?></span> 
                        </div>
                        <div class="col-10">
                            <span class="h4 px-2">Passive Perception</span>
                        </div>
                    </div>
                    <div class="row m-1">
                        <div class="col border text-center p-0">
                            <span class="h4 px-2"><?= $passive_investigation?></span> 
                        </div>
                        <div class="col-10">
                            <span class="h4 px-2">Passive Investigation</span>
                        </div>
                    </div>
                    <div class="row m-1">
                        <div class="col border text-center p-0">
                            <span class="h4 px-2"><?= $passive_insight?></span> 
                        </div>
                        <div class="col-10">
                            <span class="h4 px-2">Passive Insight</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 3rd row -->
            <div class="row mt-2">
                <!-- Skills -->
                <div class="col card">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">PROF</th>
                                <th class="">SKILLS</th>
                                <th class="text-center">BONUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($skills as $skill): ?>
                                <tr>
                                    <?php
                                        
                                        if($skill_prof[0]->$skill == 1){
                                            echo '<td class="text-center"><i class="fa-solid fa-circle"></i></td>';
                                            $prof = $proficiency;
                                        }
                                        else{
                                            echo '<td class="text-center"><i class="fa-regular fa-circle"></i></td>';
                                            $prof = 0;
                                        }
                                     
                                    ?>
                                    <?php
                                        if(in_array($skill, $str_skills)){
                                            $ability = $mods[0];
                                            echo '<td data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="'.$ability.'">'.$skill.'</td>';
                                        }
                                        else if(in_array($skill, $dex_skills)){
                                            $ability = $mods[1];
                                            echo '<td data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="'.$ability.'">'.$skill.'</td>';
                                        }
                                        else if(in_array($skill, $int_skills)){
                                            $ability = $mods[3];
                                            echo '<td data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="'.$ability.'">'.$skill.'</td>';
                                        }
                                        else if(in_array($skill, $wis_skills)){
                                            $ability = $mods[4];
                                            echo '<td data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="'.$ability.'">'.$skill.'</td>';
                                        }
                                        else if(in_array($skill, $cha_skills)){
                                            $ability = $mods[5];
                                            echo '<td data-bs-toggle="tooltip" data-bs-placement="left" data-bs-original-title="'.$ability.'">'.$skill.'</td>';
                                        }
                                    ?>
                                    <td class="text-center"><span name="<?= 'skill_'.$skill ?>" class="border p-1">
                                        <?php 
                                            if(in_array($skill, $str_skills)){
                                                $ability = $mods[0];
                                                $str = $ability;
                                                echo '+'.floor((($ability_score[0]->$ability)-10)/2+$prof);
                                            }
                                            else if(in_array($skill, $dex_skills)){
                                                $ability = $mods[1];
                                                $dex = $ability;
                                                echo '+'.floor((($ability_score[0]->$ability)-10)/2+$prof);

                                            }
                                            else if(in_array($skill, $int_skills)){
                                                $ability = $mods[3];
                                                $int = $ability;
                                                 echo '+'.floor((($ability_score[0]->$ability)-10)/2+$prof);
                                            }
                                            else if(in_array($skill, $wis_skills)){
                                                $ability = $mods[4];
                                                $wis = $ability;
                                                echo '+'.floor((($ability_score[0]->$ability)-10)/2+$prof);
                                            }
                                            else if(in_array($skill, $cha_skills)){
                                                $ability = $mods[5];
                                                $cha = $ability;
                                                echo '+'.floor((($ability_score[0]->$ability)-10)/2+$prof);
                                            }
                                        ?>
                                    </span></td>
                                </tr>
                                    
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col ml-10">
                    <div class="row ">
                        <div class="col card text-center m-0 p-0">
                            <div class="row"><p class="h6 my-auto mt-2">Initiative</p></div>
                            <div class="row"><p class="h1 my-auto mb-2"><i class="fa-sharp fa-regular fa-swords"></i>
                                <?= '+'.(int) floor(($ability_score[0]->$dex-10)/2);?>
                            </p></div>
                        </div>
                        <div class="col card text-center ml-10 p-0">
                        <div class="row"><p class="h6 my-auto mt-2">Armor Class</p></div>
                            <div class="row"><p class="h1 my-auto mb-2"><i class="fa-sharp fa-regular fa-shield"></i>+3</p></div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col card text-center m-0 p-0">
                            <div class="row"><p class="h6 my-auto mt-2">Proficiency</p></div>
                            <div class="row"><p class="h1 my-auto mb-2"><?= '+'.$proficiency?></p></div>
                        </div>
                        <div class="col card text-center ml-10 p-0">
                        <div class="row"><p class="h6 my-auto mt-2">Walking Speed</p></div>
                            <div class="row h-100"><p class="h1 my-auto mb-2">30 <small class="h3 muted">ft</small></p></div>
                        </div>
                    </div>
                    <!-- Saving Throws -->
                    <div class="row card mt-2 px-2">
                        <table class="table">
                            <thead>
                                <p class="h6 my-2 text-center">SAVING THROWS</p>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($mods as $index =>$mod): ?>
                                    <tr>
                                        <?php
                                            if($saving_throws[0]->$mod == 1){
                                                echo '<td class="text-center"><i class="fa-solid fa-circle"></i></td>';
                                                $prof = $proficiency;
                                            }
                                            else {
                                                echo '<td class="text-center"><i class="fa-regular fa-circle"></i></td>';
                                                $prof = 0;
                                            }
                                            
                                        ?>
                                        <td><?= $mod ?></td>
                                        <td class="text-center">
                                            <span class="border p-1">
                                                <?='+'.floor((($ability_score[0]->$mod)-10)/2+$prof); ?>
                                            </span>
                                        </td>
                                    </tr>
                                        
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row card mt-2 p-2">
                        <p>Conditions</p>
                    </div>
                </div>
                <!-- notes -->
                <div class="col-6 ml-10 card p-0">
                    <!-- tabs -->
                    @include('notes-tabs')
                </div>
            </div>
        </div> <!-- end container -->

        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script>
            
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
            })

        </script>
    </body>
</html>
