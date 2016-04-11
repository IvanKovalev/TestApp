<?php

require_once 'layouts/headerLayout.php';


if(isset($_COOKIE['user'])){

    require_once 'mainPage.php';

}else{

    require_once 'layouts/authLayout/autorisationLayout.php';

}

require_once 'layouts/footerLayout.php';

