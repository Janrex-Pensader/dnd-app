<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Laravel</title>

        <!-- CDN -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
       
        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link
      rel="stylesheet"
      data-purpose="Layout StyleSheet"
      title="Web Awesome"
      href="/css/app-wa-462d1fe84b879d730fe2180b0e0354e0.css?vsn=d"
    >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-thin.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-solid.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-regular.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-light.css"
      >
        <!-- js -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        
        <!-- Styles -->
        <style>
            #heal_btn, #damage_btn, #hp_input{
                width: -webkit-fill-available
            }
            .ml-10{
                margin-left: 10px !important;
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
                        <div class="col-lg-9 col-sm-6 m-2 my-auto">
                            <div class="row my-2">
                                <div class="col">
                                    Name: 
                                </div>
                                <div class="col">
                                    Race:
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    Level:
                                </div>
                                <div class="col">
                                    Class:
                                </div>
                            </div>
                            <div class="row my-2">
                                <div class="col">
                                    Gender:
                                </div>
                                <div class="col">
                                    Background:
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col m-0 px-0 ml-10">
                    <button id="long_rest" class="btn btn-info btn-sm p-2 w-100" type="button"><i class="fas fa-user-cog"></i> Update</button><br>
                    <button id="short_rest" class="btn btn-success btn-sm p-2 my-1 w-100" type="button"><i class="fa-sharp fa-light fa-campfire"></i> Short Rest</button> <br>
                    <button id="long_rest" class="btn btn-primary btn-sm p-2 w-100" type="button"><i class="fa-sharp fa-regular fa-campground"></i> Long Rest</button><br>
                    <span class="p-2">Inspiration</span>
                </div>
                <!-- Health points -->
                <div class="card col ml-10">
                    <div class="row mt-2">
                        <span class="h1 text-center my-auto">100/100</span>
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
                <div class="col-8 card">
                    <div class="row">
                        <?php 
                            $mods = array("Strenght", "Dexterity", "Constitution", "Intelligence", "Wisdom", "Charisma"); 
                            $scores = array(20, 15, 18, 11, 16, 14); 
                            foreach($mods as $index => $mod): ?>
                                <div class="col p-0 m-2">
                                    <div class="card">
                                        <div class="card-header p-1 text-center">
                                            <?= $mod?>
                                        </div>
                                        <div class="card-body p-2 text-center">
                                            <h3>+<?=(int) floor(($scores[$index]-10)/2)?></h3>
                                        </div>
                                        <div class="card-footer p-1 text-center">
                                            <?= $scores[$index]?>
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <!-- saving throw -->
                <div class="col card ml-10">
                    Saving throws
                </div>
            </div>

            <div class="row mt-2">
                <div class="col card">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">PROF</th>
                                <th class="">SKILL</th>
                                <th class="text-center">BONUS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $skills = array("Acrobatics","Animal Handing","Arcana","Athletics","Deception","History","Insight","Intimidation","Investigation","Medicine","Nature","Perception","Persuasion","Religion","Sleight of Hand","Stealth","Survival"); 
                                $scores = array(20, 15, 18, 11, 16, 14);
                                
                                foreach($skills as $skill): ?>
                                <tr>
                                    <td class="text-center"><i class="fa-solid fa-circle"></i></td>
                                    
                                    <td><?= $skill ?></td>
                                    <td class="text-center"><span class="border p-1">+3</span></td>
                                </tr>
                                    
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col ml-10">
                    <div class="row ">
                        <div class="col card text-center m-0 p-0">
                            <div class="row"><p class="h6 my-auto mt-2">Initiative</p></div>
                            <div class="row"><p class="h1 my-auto mb-2"><i class="fa-sharp fa-regular fa-swords"></i>+3</p></div>
                        </div>
                        <div class="col card text-center ml-10 p-0">
                        <div class="row"><p class="h6 my-auto mt-2">Armor Class</p></div>
                            <div class="row"><p class="h1 my-auto mb-2"><i class="fa-sharp fa-regular fa-shield"></i>+3</p></div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col card text-center m-0 p-0">
                            <div class="row"><p class="h6 my-auto mt-2">Proficiency</p></div>
                            <div class="row"><p class="h1 my-auto mb-2">+3</p></div>
                        </div>
                        <div class="col card text-center ml-10 p-0">
                        <div class="row"><p class="h6 my-auto mt-2">Walking Speed</p></div>
                            <div class="row h-100"><p class="h1 my-auto mb-2">30 <small class="h3 muted">ft</small></p></div>
                        </div>
                    </div>
                    <div class="row card mt-2 py-3">
                        <p><span class="h4 border px-2">13</span> <span class="h4 px-2">Passive Perception</span></p>
                        <p><span class="h4 border px-2">15</span> <span class="h4 px-2">Passive Investigation</span></p>
                        <p><span class="h4 border px-2">12</span> <span class="h4 px-2">Passive Insight</span></p>
                    </div>
                    <div class="row card mt-2 p-2">
                        <p>Conditions</p>
                    </div>
                </div>
                <div class="col-6 ml-10 card p-0">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Actions</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Spells</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Notes</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </body>
</html>
