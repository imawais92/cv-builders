<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Resume</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            /* background-color: #EBECF0; */
            font-family: 'Raleway', sans-serif;
        }

        .main-section {
            width: 210mm;
            height: 297mm;
            background-color: white;
            margin: 0 auto;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            display: flex;
        }

        .main-section .left-part {
            width: 40%;
            height: 100%;
            background-color: #F4F4F4;
            padding: 2.8rem;
        }

        .left-part .photo-container {
            margin-bottom: 2.2rem;
        }

        .left-part .photo-container img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 1rem solid white;
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        }

        .title {
            font-family: 'Public Sans', sans-serif;
            font-size: 1.4rem;
            text-transform: uppercase;
            padding: 0.6rem;
            background-color: #444440;
            color: white;
            text-align: center;
            margin: 1.4rem 0;
        }

        .contact-container {
            margin-bottom: 2.2rem;
        }

        .contact-container .contact-list {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            font-family: 'Lato', sans-serif;
            color: #444440;
            font-size: 1rem;
        }

        .education-container {
            margin-bottom: 2.2rem;
            font-family: 'Lato', sans-serif;
        }

        .education-container .course {
            margin-bottom: 1rem;
            color: #414042;
        }

        .education-container .education-title {
            font-size: 1rem;
            font-weight: 800;
            margin-bottom: .3rem;
        }

        .education-container .college-name {
            margin-bottom: 0.3rem;
            font-weight: 600;

        }

        .education-container .education-date {
            font-size: 0.9rem;
        }

        .skills-container .skill {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 0.6rem;
            font-family: 'Lato', sans-serif;
        }

        .skills-container .skill .right-skill .outer-layer {
            background-color: #BBBBBB;
            height: 0.4rem;
            width: 5rem;
            border-radius: 0.4rem;
        }

        .skills-container .skill .right-skill .inner-layer {
            background-color: #3D3D3D;
            height: 100%;
            border-radius: inherit;
        }

        .right-part {
            padding: 1.3rem;
        }

        .right-part .banner {
            font-family: 'Open Sans', sans-serif;
            color: #4D4D4F;
            margin-bottom: 2.2rem;
        }

        .right-part .banner .firstname {
            font-size: 4rem;
        }

        .right-part .banner .lastname {
            font-size: 4rem;
            font-weight: 400;
            letter-spacing: 0.5rem;
            margin-top: -1rem;
        }

        .right-part .banner .position {
            letter-spacing: 0.3rem;
            margin-top: -0.5rem;
            font-size: 1.1rem;
        }

        .work-container {
            margin-top: 5rem;
            font-family: 'Lato', sans-serif;
        }

        .work-container .work:not(:last-child) {
            margin-bottom: 1.8rem;
        }

        .work-container .work .job-date {
            display: flex;
            justify-content: space-between;
            color: #4D4D4F;
            margin-bottom: 0.5rem;
            font-size: 0.7rem;
            font-weight: 500;
        }

        .work-container .work .company-name {
            font-size: 0.9rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #4D4D4F;

        }

        .work-container .work .work-text {
            color: #737373;
            font-size: 0.8rem;
            text-align: justify;
            line-height: 1rem;
        }

        .references-container .references {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
            font-family: 'Lato', sans-serif;
            color: #4D4D4F;
        }

        .references-container .references .name {
            font-weight: 800;
            font-size: 1.1rem;
        }

        .references-container .references .company-name {
            margin: 0.5rem 0;
            font-size: 0.9rem;
        }

        .references-container .references .phone {
            display: flex;
            justify-content: space-between;
            font-size: 0.7rem;
            color: #414042;
        }

        .references-container .references .phone p {
            margin: 0.4rem 0;
        }

        .references-container .references .phone .phone-text {
            font-weight: 600;
        }

        .text-left {
            text-align: left;
        }
    </style>
</head>

<body>
    <?php
    $data = file_get_contents('res.txt');
    $data = json_decode($data);
    ?>
    <section class="main-section">
        <div class="left-part">
            <div class="photo-container">
                <img src="img/img-removebg-preview.png" alt="" width="20px">
            </div>
            <div>
                <div>
                    <h1 class="title text-left"> CONTACT</h1>
                </div>
                <div style="margin-top:10px">
                    <h2>Address</h2>
                </div>
                <h4>
                    <i class="fa fa-home fontfa"></i>
                    <?= $data->per_info->country ?>
                    <?= $data->per_info->city ?>
                    </p>
                </h4>
                <div style="margin-top:10px">
                    <h2>Phone</h2>
                </div>
                <h4>
                    <i class="fa fa-phone fontfa"></i>
                    <?= $data->per_info->per_no ?>
                    </p>
                </h4>
                <div style="margin-top:10px">
                    <h2>Email</h2>
                </div>
                <h4>
                    <i class="fa fa-envelope fontfa"></i>
                    <?= $data->per_info->email ?>
                    </p>
                </h4>
            </div>
            <!-- =====================education-container================= -->
            <div class="title text-left">
                <h3>EDUCATION</h3>
            </div>
            <div class="section">
                <div>
                    <?php
                    for ($i = 0; $i < count($data->education); $i++) {
                        # code... 
                        ?>
                        <div>
                            <strong>
                                <?= ucfirst($data->work_exp[$i]->company_name) ?> /
                                <?= ucfirst($data->work_exp[$i]->role) ?>

                            </strong>
                            <div>
                                <?= $data->work_exp[$i]->city_country ?>
                            </div>

                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <!-- =============skillllllllllll=================== -->
            <div class="title text-left">
                <h3>SKILLS</h3>
            </div>
            <div>
                <div class="content">
                    <div class="section">
                        <div style="padding-left:20px;margin-top:10px">
                            <?php
                            for ($i = 0; $i < count($data->skills); $i++) {
                                ?>
                                <ul>
                                    <li>
                                        <?= $data->skills[$i]->skill ?>
                                    </li>
                                </ul>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================hobbies=================== -->
            <div class="section">
                <div>
                    <h1>
                        <h1 class="title text-left">HOBBIES
                        </h1>

                    </h1>
                </div>
                <div style="padding-left:20px">
                    <?php
                    for ($i = 0; $i < count($data->hobbies); $i++) {
                        # code... 
                    
                        ?>
                        <ul>
                            <li>
                                <?= $data->hobbies[$i]->hobby ?>
                            </li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
            </div>

        </div>
        <div class="right-part">
            <div class="banner">
                <h1 style="font-size:80px">
                    <?= ucfirst($data->per_info->fname) ?>
                    <?= ucfirst($data->per_info->lname) ?>
                </h1>
                <div>
                    <p class="position">
                        <?= $data->per_info->profession ?>
                    </p>
                </div>
            </div>
            <div>
                <h1 class="title text-left">
                    ABOUT ME
                </h1>
                <p style=" text-align: justify;text-justify: inter-word;">
                    <?= ucfirst($data->per_info->about_us) ?>
                </p>
            </div>
            <div class="work-container ">
                <h2 class="title text-left">work experience</h2>
                <div class="work">
                    <div class="section">
                        <div>
                            <?php
                            for ($i = 0; $i < count($data->work_exp); $i++) {
                                # code... 
                                ?>
                                <div>
                                    <div>
                                        <strong>
                                            <p>
                                                <?= ucfirst($data->work_exp[$i]->company_name) ?> /
                                                <?= ucfirst($data->work_exp[$i]->role) ?>
                                            </p>
                                        </strong>
                                    </div>
                                    <div>
                                        <p style="font-size:12px">
                                            <strong>
                                                <?= $data->work_exp[$i]->work_st_data ?> /
                                                <?= $data->work_exp[$i]->work_end_date ?>
                                            </strong>
                                        </p>
                                    </div>
                                    <div style="margin-top:12px;">
                                        <?= $data->work_exp[$i]->city_country ?>
                                    </div>

                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="references-container">
                <h2 class="title text-left">References</h2>
                <div class="references">
                    <!-- Reference=============== -->
                    <div class="section">
                        <div>
                            <?php
                            for ($i = 0; $i < count($data->user_references); $i++) {
                                # code... 
                            
                                ?>
                                <h2>
                                    <?= $data->user_references[$i]->user_reference ?>
                                </h2>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>